<?php

namespace App\Services\Auth;

use App\Http\Requests\Auth\SignupRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Validators\ReCaptcha;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Models\EmailAction;
use Illuminate\Support\Str;
use App\Models\User;
use Redirect, Session, Config, DB;

class AuthService
{

    protected $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function register_user(SignupRequest $request){
        // dd($request);
        $result = [];
        $user = new User;
        $user->name = $request->name;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->password  = Hash::make($request->password);
        $user->verifiey_url  = $token = Str::random(40);

        if ($user->save()) {
            $garnate_url = $user->verifiey_url;
            $settingsEmail = Config('Site.from_email');
            $emailActions = EmailAction::where('action', '=', 'user_verify')->first();
            $language_id = GetLanguageId();
            $emailTemplates = EmailTemplate::where('action', '=', 'user_verify')
                ->select(
                    "name",
                    "action",
                    DB::raw("(select subject from email_template_descriptions where parent_id=email_templates.id AND language_id=$language_id) as subject"),
                    DB::raw("(select body from email_template_descriptions where parent_id=email_templates.id AND language_id=$language_id) as body")
                )
                ->first();

            if ($emailActions && $emailTemplates) {

                $constants = explode(',', $emailActions->options);

                // Prepare replacement variables
                $user_name = $request->name;
                $email = $request->email;
                $verification_token = $user->verifiey_url;
                $verification_link = url("/verify-email?token=$verification_token");
                // dd($verification_link);


                $messageBody = str_replace('{USER_NAME}', $user_name, $emailTemplates->body);
                $messageBody = str_replace('{VERIFY_LINK}', $verification_link, $messageBody);


                $subject = $emailTemplates->subject;
                $this->controller->sendMail($email, $user_name, $subject, $messageBody, $settingsEmail);


                $user->verification_token = $verification_token;


                $result = ['status' => true, 'message' => 'Your account was created successfully. Please check your email to verify your account.'];
            } else {
                $result = ['status' => false, 'message' => 'Email action or template not found.'];
            }
        } else {
            $result = ['status' => false, 'message' => 'Something went wrong while saving your inquiry'];
        }
        return $result;
    }

    public function login_user(LoginRequest $request) {
        $user_name_or_email = $request->user_name;
        $password = $request->password;
        $user = User::where(function($query) use ($user_name_or_email) {
        $query->where('email', $user_name_or_email)->orWhere('user_name', $user_name_or_email); })->where('is_approved', 1)->first();
        $result = ['status' => false, 'message' => 'Invalid credentials.'];
        if ($user) {
            if (Auth::attempt(['email' => $user->email, 'password' => $password]) || Auth::attempt(['user_name' => $user->user_name, 'password' => $password])) {
                $result = ['status' => true, 'message' => 'You have logged in successfully.'];
            }
        }

        return $result;
    }

    public function verify_account_mail(Request $request)
    {
        $token = $request->query('token');
        $user = User::where('verifiey_url', $token)->first();
        if ($user) {
            $user->is_approved = 1;
            $user->verifiey_url = Null;
            $user->save();
            $result = ['status' => true, 'message' => 'User Account Is Verified ! Please Login Your Account'];
        } else {
            $result = ['status' => false, 'message' => 'Invalid token'];
        }
        return $result;
    }



}
