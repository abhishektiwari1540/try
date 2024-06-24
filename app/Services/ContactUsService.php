<?php

namespace App\Services;

use App\Http\Requests\ContactUsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Validators\ReCaptcha;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Models\EmailAction;
use App\Models\ContactUs;
use Redirect, Session, Config, DB;

class ContactUsService
{

    protected $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function index(Request $request)
    {
        $result = [];
        $DB = ContactUs::query();
        $searchVariable = array();
        $inputGet = $request->all();

        if ($request->all()) {
            $searchData = $request->all();
            unset($searchData['display']);
            unset($searchData['_token']);

            if (isset($searchData['order'])) {
                unset($searchData['order']);
            }
            if (isset($searchData['sortBy'])) {
                unset($searchData['sortBy']);
            }
            if (isset($searchData['page'])) {
                unset($searchData['page']);
            }

            if ((!empty($searchData['date_from'])) && (!empty($searchData['date_to']))) {
                $dateS = date("Y-m-d", strtotime($searchData['date_from']));
                $dateE = date("Y-m-d", strtotime($searchData['date_to']));
                $DB->whereBetween('created_at', [$dateS . " 00:00:00", $dateE . " 23:59:59"]);
            } elseif (!empty($searchData['date_from'])) {
                $dateS = $searchData['date_from'];
                $DB->where('created_at', '>=', [$dateS . " 00:00:00"]);
            } elseif (!empty($searchData['date_to'])) {
                $dateE = $searchData['date_to'];
                $DB->where('created_at', '<=', [$dateE . " 00:00:00"]);
            }

            foreach ($searchData as $fieldName => $fieldValue) {
                if ($fieldValue != "") {
                    if ($fieldName == "name") {
                        $DB->where("contact_us_inquiry.name", 'like', '%' . $fieldValue . '%');
                    }
                    if ($fieldName == "email") {
                        $DB->where("contact_us_inquiry.email", 'like', '%' . $fieldValue . '%');
                    }
                }

                $searchVariable = array_merge($searchVariable, array($fieldName => $fieldValue));
            }
        }

        $DB->where('is_deleted', 0);
        $sortBy = ($request->input('sortBy')) ? $request->input('sortBy') : 'created_at';
        $order = ($request->input('order')) ? $request->input('order') : 'DESC';
        $records_per_page = ($request->input('per_page')) ? $request->input('per_page') : Config::get("Reading.records_per_page");
        $results = $DB->orderBy($sortBy, $order)->paginate($records_per_page);
        $complete_string = $request->query();
        unset($complete_string["sortBy"]);
        unset($complete_string["order"]);
        $query_string = http_build_query($complete_string);
        $results->appends($inputGet)->render();

        $result = ['status' => true, 'results' => $results, 'searchVariable' => $searchVariable, 'sortBy' => $sortBy, 'order' => $order, 'query_string' => $query_string];
        return $result;
    }

    public function store_form(ContactUsRequest $request)
    {
        $result = [];
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $secretKey = env('GOOGLE_CAPTCHA_SECRET_KEY');

        if ($secretKey) {
            $validator = Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
        }


        $new_inquiry = new ContactUs;
        $new_inquiry->name = $request->input('name');
        $new_inquiry->email = $request->input('email');
        $new_inquiry->message = $request->input('message');
        $new_inquiry->phone_number = $request->input('phone_number');

        if ($new_inquiry->save()) {
            $settingsEmail = Config('Site.from_email');
            $emailActions = EmailAction::where('action', '=', 'contact_us')->get()->toArray();
            $language_id = GetLanguageId();
            $emailTemplates = EmailTemplate::where('action', '=', 'contact_us')->select("name", "action", DB::raw("(select subject from email_template_descriptions where parent_id=email_templates.id AND language_id=$language_id) as subject"), DB::raw("(select body from email_template_descriptions where parent_id=email_templates.id AND language_id=$language_id) as body"))->get()->toArray();
            $cons = explode(',', $emailActions[0]['options']);
            $constants = array();

            foreach ($cons as $key => $val) {
                $constants[] = '{' . $val . '}';
            }

            $email = $request->email;
            $user_name = $request->name;
            $subject = $emailTemplates[0]['subject'];
            $rep_Array = array($user_name);
            $messageBody = str_replace($constants, $rep_Array, $emailTemplates[0]['body']);
            $this->controller->sendMail($email, $user_name, $subject, $messageBody, $settingsEmail);

            $result = ['status' => true, 'message' => 'Your inquiry was submitted successfully'];
        } else {
            $result = ['status' => false, 'message' => 'Something went wrong while saving your inquiry'];
        }

        return $result;
    }

    public function View($enuserid)
    {
        $result = [];
        $user_id = '';

        if (!empty($enuserid)) {
            $user_id = base64_decode($enuserid);
        } else {
            return redirect()->route($this->model . ".index");
        }

        $userDetails = ContactUs::where('id', $user_id)->first();
        $result = ['status' => true, 'userDetails' => $userDetails];
        return $result;
    }

    public function destroy($enuserid)
    {
        $result = [];
        $user_id = '';

        if (!empty($enuserid)) {
            $user_id = base64_decode($enuserid);
        } else {
            return redirect()->route($this->model . ".index");
        }

        $ContactDetails = ContactUs::find($user_id);

        if (empty($ContactDetails)) {
            return Redirect()->route($this->model . '.index');
        }

        if ($user_id) {
            ContactUs::where('id', $user_id)->update(array(
                'is_deleted' => 1
            ));
            $result = ['status' => true, 'message' => 'Contact Has been Removed Successfully'];
            return $result;
        }
    }
}
