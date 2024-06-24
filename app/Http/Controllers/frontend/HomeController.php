<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Services\Admin\EventsService;
use App\Services\Admin\ClassService;
use Illuminate\Support\Facades\Auth;
use App\Services\ContactUsService;
use App\Services\Admin\CmsService;
use App\Services\Auth\AuthService;
use App\Services\Admin\TestimonialsService;
use App\Models\language;
use App\Services\Admin\System_docmuent;
use App\Services\Admin\SettingService;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Redirect, Session, Config;

class HomeController extends Controller
{
    public function __construct(Request $request, ContactUsService $ContactUsService, System_docmuent $System_docmuent, EventsService $EventsService, CmsService $CmsService, ClassService $ClassService, SettingService $SettingService, TestimonialsService $TestimonialsService, AuthService $AuthService) {
        parent::__construct();
        $this->request = $request;
        $this->ContactUsService = $ContactUsService;
        $this->EventsService = $EventsService;
        $this->CmsService = $CmsService;
        $this->ClassService = $ClassService;
        $this->SettingService = $SettingService;
        $this->TestimonialsService = $TestimonialsService;
        $this->System_docmuent = $System_docmuent;
        $this->AuthService = $AuthService;

    }

    public function lang_change(Request $request)
    {

        $language = language::where('id',intval($request->language))->first()->laguage_code;
        \App::setLocale($language);
        session()->put('locale', $language);

        return response()->json(['success' => 'Language was Changed !!']);;
    }

    public function index(Request $request) {
        $data_banner = $this->CmsService->banner_data($request);
        $welcome_page = $this->CmsService->welcome_page($request);
        $Philosophy_home = $this->CmsService->Philosophy_home($request);
        $contact_page = $this->CmsService->contact($request);
        $setting = $this->SettingService->front_website($request);
        $Testimonials = $this->CmsService->Testimonials($request);
        $Testimonials_data = $this->TestimonialsService->front_page_data($request);
        $welcome_page_title = $this->CmsService->welcome_page_title($request);
        $system_document = $this->System_docmuent->data($request);
        $lagaguage = $this->CmsService->lagauage_data($request);
        // dd(app()->getLocale());
        return view('frontend.index')->with([
            'data_banner' => $data_banner,
            'system_document' => $system_document,
            'welcome_page_data' => $welcome_page['data'],
            'welcome_page_Philosophy' => $Philosophy_home['data'],
            'contact_page' => $contact_page,
            'setting' => $setting,
            'Testimonials' => $Testimonials,
            'Testimonials_data' => $Testimonials_data['frontlist'],
            'welcome_page_title' => $welcome_page_title,
            'lagaguage'           => $lagaguage
        ]);
    }

    public function classes(Request $request) {
        $page_data = $this->ClassService->page_data($request);
        $setting = $this->SettingService->front_website($request);
        $system_document = $this->System_docmuent->data($request);

        return view('frontend.classes')->with([
            'page_data' => $page_data,
            'setting' => $setting,
            'system_document' => $system_document
        ]);
    }

    public function events(Request $request) {
        $data = $this->EventsService->frontlist($request);
        $Events_page = $this->CmsService->Events_page($request);
        $setting = $this->SettingService->front_website($request);
        $system_document = $this->System_docmuent->data($request);

        return view('frontend.events')->with([
            'frontlist' => $data['frontlist'],
            'Events_page' => $Events_page,
            'setting' => $setting,
            'system_document' => $system_document
        ]);
    }

    public function about(Request $request) {
        $about_page = $this->CmsService->about_page($request);
        $setting = $this->SettingService->front_website($request);
        $system_document = $this->System_docmuent->data($request);

        return view('frontend.about-us')->with([
            'about_page' => $about_page,
            'setting' => $setting,
            'system_document' => $system_document
        ]);
    }

    public function contact(Request $request) {
        $contact_page = $this->CmsService->contact($request);
        $setting = $this->SettingService->front_website($request);
        $system_document = $this->System_docmuent->data($request);

        return view('frontend.contact')->with([
            'contact_page' => $contact_page,
            'setting' => $setting,
            'system_document' => $system_document
        ]);
    }

    public function yoga_darshan(Request $request, $name = null) {
        $data = $this->EventsService->detail_yoga($request, $name);
        $setting = $this->SettingService->front_website($request);
        $system_document = $this->System_docmuent->data($request);

        return view('frontend.Events-details-page')->with([
            'details' => $data['frontlist'],
            'setting' => $setting,
            'system_document' => $system_document
        ]);
    }

    public function login(Request $request) {
        return view('frontend.Auth.login');
    }


    public function register(Request $request) {
        return view('frontend.Auth.register');
    }

    public function privacy_policy(Request $request) {
        $data = $this->CmsService->privacy_policy($request);
        $setting = $this->SettingService->front_website($request);
        $system_document = $this->System_docmuent->data($request);

        return view('frontend.privacy-policy')->with([
            'page_data' => $data,
            'system_document' => $system_document,
            'setting' => $setting
        ]);
    }

    public function Refund_policy(Request $request) {
        $data = $this->CmsService->Term_Conditions($request);
        $setting = $this->SettingService->front_website($request);
        $system_document = $this->System_docmuent->data($request);

        return view('frontend.refund-policy')->with([
            'data' => $data,
            'system_document' => $system_document,
            'setting' => $setting
        ]);
    }

    public function thank_you(Request $request) {
        return view('frontend.thank-you');
    }

    public function about_author(Request $request) {
        $about_author = $this->CmsService->about_author($request);
        $setting = $this->SettingService->front_website($request);
        $system_document = $this->System_docmuent->data($request);
        return view('frontend.about_author')->with(['about_author' => $about_author, 'setting' => $setting, 'system_document' => $system_document]);
    }

    public function invoice(Request $request) {
        return view('frontend.invoice');
    }

    public function checkout_classes(Request $request) {
        return view('frontend.checkout-classes');
    }

    public function elements(Request $request) {
        return view('frontend.elements');
    }

    public function contactus_store(ContactUsRequest $request) {

        $result = $this->ContactUsService->store_form($request);

        if ($result['status'] == true) {
            return response()->json(['success' => $result['message']]);
        } else {
            return response()->json(['error' => $result['message']]);
        }
    }

    public function login_page(Request $request){
        return view('frontend.Auth.login');
    }

    public function sign_up_page(Request $request){
        return view('frontend.Auth.register');
    }

    public function create_user(SignupRequest $request){

        $result = $this->AuthService->register_user($request);
        if ($result['status'] == true) {
            return response()->json(['success' => $result['message']]);
        } else {
            return response()->json(['error' => $result['message']]);
        }

    }

    public function login_user(LoginRequest $request){
        $result = $this->AuthService->login_user($request);
        if ($result['status'] == true) {
            Session::put('message_login',$result['message']);
            return response()->json(['success' => $result['message']]);
        } else {
            return response()->json(['error' => $result['message']]);
        }

    }

    public function verify_account_mail(Request $request) {
        $result = $this->AuthService->verify_account_mail($request);
        if($result['status'] == true){
            return view('frontend.Auth.register-thank')->with('success', $result['message']);
        } else {
            return redirect()->route('front.login_page')->with('error', $result['message']);
        }
    }

    public function logout(Request $request){
        Session::flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::put('success','You have Log Out Successfully');
        return redirect()->route('front.index')->with(['success' => 'You have Log Out Successfully']);

    }

}
