<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Services\ContactUsService;
use App\Models\EmailTemplate;
use App\Models\EmailAction;
use App\Models\ContactUs;
use Redirect, Session, Config;

class ContactUsController extends Controller
{
    public $model = 'Contact_us';
    public $sectionNameSingular = 'Contact';

    public function __construct(Request $request, ContactUsService $ContactUsService) {
        parent::__construct();
        View()->share('model', $this->model);
        View()->share('sectionNameSingular', $this->sectionNameSingular);
        $this->request = $request;
        $this->ContactUsService = $ContactUsService;
    }

    public function index(Request $request) {
        $result = $this->ContactUsService->index($request);
        if ($result['status'] == true) {
            return view('admin.Contact_us.index')->with([
                'results' => $result['results'],
                'searchVariable' => $result['searchVariable'],
                'sortBy' => $result['sortBy'],
                'order' => $result['order'],
                'query_string' => $result['query_string']
            ]);
        }
    }

    public function destroy($enuserid = null) {
        $result = $this->ContactUsService->destroy($enuserid);
        if ($result['status'] == true) {
            return redirect()->route('Contact_us.index')->with(['success' => $result['message']]);
        } else {
            return redirect()->back()->with(['error' => 'Something Is Wrong']);
        }
    }

    public function view($enuserid = null) {
        $result = $this->ContactUsService->view($enuserid);
        if ($result['status'] == true) {
            return view("admin.Contact_us.view")->with(['userDetails' => $result['userDetails']]);
        } else {
            return redirect()->back()->with(['error' => 'Something Is Wrong']);
        }
    }
}
