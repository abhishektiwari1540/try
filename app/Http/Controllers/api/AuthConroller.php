<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\OtpVerifyRequest;
use App\Http\Requests\SocialloginRequest;
use App\Http\Requests\BusinessSignupRequest;
use App\Models\ReceiverBusinessDetail;
use App\Models\UserOtp;
use App\Models\User;
use Session,Auth,Storage,Config;

class AuthConroller extends Controller
{
    public function login(LoginRequest $request) {
        $users          =   User::where("user_role_id",$request->user_role_id)->where('email',$request->email)->first();
        $response       =   array();
        if($users != null){
            
            $response   = array();
            $response["status"]         =   "success";
            $response["msg"]            =   trans("messages.OTP_sent_to_your_mobile_no");
            $response["otp"]            =   $userOtp->otp;
            $response["otp_expired"]    =   date("Y-m-d H:i:s",strtotime("+ 1 min"));

        }else{
            $response["status"]                =   "success";
            $response["msg"]                   =   "";
            $response["data"]                  =   $request->all();
            $response["user_role_type"]        =   $this->userRoleType($request->user_role_id);
        }
        return json_encode($response, 200);
    }


    public function otpVerify(OtpVerifyRequest $request){
        $response   = array();
        if(isset($request->otp_expired) && strtotime($request->otp_expired) > strtotime(date('Y-m-d H:i:s'))){
            $users   = User::where("id",$request->user_id)->where('otp',$request->otp)->first();
            if($users != null){
                dd($users);
                if($request->otp == $otpVerify->otp){
                    $users = User::where("phone_prefix",$request->phone_prefix)->where("phone_number",$request->phone_number)->where("phone_code",$request->phone_code)->first();
                    
                    if($users == null){
                        $users                  =   new User;
                        $users->user_role_id    =   $request->user_role_id;
                        $users->name            =   $request->full_name;
                        $users->phone_prefix    =   $request->phone_prefix;
                        $users->phone_code      =   $request->phone_code;
                        $users->phone_number    =   $request->phone_number;
                        $users->social_type     =   $request->social_type ?? null;
                        $users->social_id       =   $request->social_id ?? null;
                        if(isset($request->image) && $request->image != ''){
                            $users->image       =   $request->image;
                        }
                        $users->save();

                        if($users->user_role_id == 3){
                            $receiverBusinessDetails                          =       new ReceiverBusinessDetail;
                            $receiverBusinessDetails->user_id                 =       $users->id;
                            $receiverBusinessDetails->business_category_id    =       $request->business_category;
                            $receiverBusinessDetails->business_location       =       $request->location;
                            $receiverBusinessDetails->number_of_workers       =       $request->number_of_workers;
                            $receiverBusinessDetails->save();
                        }
                    }

                    UserOtp::where("phone_prefix",$request->phone_prefix)->where("phone_number",$request->phone_number)->where("phone_code",$request->phone_code)->delete();

                    Auth::loginUsingId($users->id);

                    $response["status"]       = "success";
                    $response["msg"]          = trans("messages.You_are_now_logged_in");
                    $user                     = Auth::guard('api')->user();
                    $response['token']        = $users->createToken('Utip app Personal Access Client')->accessToken;
                    $response["data"]         = $users->makeHidden(['created_at', 'updated_at','is_deleted', 'is_active']);
                }else{
                    $response["status"]                =   "error";
                    $response["msg"]                   =   trans("messages.The_OTP_entered_is_incorrect");                        
                }
            }else{
                $response["status"]                =   "error";
                $response["msg"]                   =   "OTP did not match. Please double-check and try again.";
            }
        }else{
            $response["status"]                =   "error";
            $response["msg"]                   =    "OTP expired. Please request a new one.";
        }
        return json_encode($response, 200);
    }

    public function resendOtp(LoginRequest $request) {
        
        $userOtp                 =    new UserOtp;
        $userOtp->phone_prefix   =    $request->phone_prefix;
        $userOtp->phone_code     =    $request->phone_code;
        $userOtp->phone_number   =    $request->phone_number;
        $userOtp->otp            =    $this->getVerificationCode();
        $userOtp->save();

        $response   = array();
        $response["status"]         =   "success";
        $response["msg"]            =   trans("messages.resend_otp_has_been_send_successfully");
        $response["otp"]            =   $userOtp->otp;
        $response["otp_expired"]    =   date("Y-m-d H:i:s",strtotime("+ 1 min"));
        return json_encode($response, 200);
    }

    public function businessSignup(BusinessSignupRequest $request) {
        $users = User::where("user_role_id",$request->user_role_id)->where("phone_prefix",$request->phone_prefix)->where("phone_number",$request->phone_number)->where("phone_code",$request->phone_code)->first();
        $response                          =   array();
        
        if($users != null){
            $response["status"]                =   "error";
            $response["msg"]                   =   trans("messages.the_enter_your_phone_number_already_registered");
        }else{
            $userOtp                 =    new UserOtp;
            $userOtp->phone_prefix   =    $request->phone_prefix;
            $userOtp->phone_code     =    $request->phone_code;
            $userOtp->phone_number   =    $request->phone_number;
            $userOtp->otp            =    $this->getVerificationCode();
            $userOtp->save();

            $formData                = $request->all();
            $businessLogo            = '';
            if($request->hasFile('image')) {
                $photo      = $request->file('image');
                $extension  = $photo->getClientOriginalExtension();
                $fileName   = time() . '-image.' . $extension;
                $folderName = strtoupper(date('M') . date('Y')) . "/";
                $folderPath = Config('constants.USER_IMAGE_ROOT_PATH') . $folderName;
                if (Storage::disk('public')->put($folderPath.$fileName,'public')) {
                    $businessLogo = $folderName.$fileName;
                }
            }
            $formData['otp_expired'] = date("Y-m-d H:i:s",strtotime("+ 1 min"));
            $formData['image']       = $businessLogo;

            $response["status"]                =   "success";
            $response["msg"]                   =   trans("messages.OTP_sent_to_your_mobile_no");
            $response["data"]                  =   $formData;
            $response["otp"]                   =   $userOtp->otp;
            $response["otp_expired"]           =   $formData['otp_expired'];
        }

        return json_encode($response, 200);
    }

    public function socialLoginRequest(SocialloginRequest $request) {  
        $social_user   = $request->all();
        $response      = array();

        $users = User::where(function ($query) use ($social_user) {
            $query->where('social_id', $social_user['social_id']);
            $query->where('social_type', $social_user['social_type']);
        })->where('is_deleted', 0)->first();
        if($users != null){
            Auth::loginUsingId($users->id);

            $response["status"]       = "success";
            $response["msg"]          = trans("messages.You_are_now_logged_in");
            $user                     = Auth::guard('api')->user();
            $response['token']        = $users->createToken('Utip app Personal Access Client')->accessToken;
            $response["data"]         = $users->makeHidden(['created_at', 'updated_at','is_deleted', 'is_active']);
        }else{
            $response["status"]                =   "success";
            $response["msg"]                   =   '';
            $response["user_role_type"]        =   $this->userRoleType($request->user_role_id);
            $response["data"]['social_type']   =   $request->social_type ?? '';
            $response["data"]['social_id']     =   $request->social_id ?? '';
        }
        return response()->json($response, 200);
    }


}
