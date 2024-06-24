<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Services\Add_userService;
use App\Http\Requests\admin\Add_userRequest;
use App\Models\User;
use App\Models\Country;
use App\Models\Lookup;

use Redirect,Session,Config;

class AddUserController extends Controller
{
    public $model                =   'Add_user';
    // public $sectionNameSingular  =   'users';
    public function __construct(Request $request, Add_userService $Add_userService) {
        parent::__construct();
        View()->share('model', $this->model);
        // View()->share('sectionNameSingular', $this->sectionNameSingular);
        // $this->request = $request;
        $this->Add_userService        = $Add_userService;
        $this->request = $request;
    }

    public function index(Request $request) {
        $result = $this->Add_userService->index($request);
if ($result['status'] == true) {
    return  View("admin.$this->model.index")->with(['resultcount' => $result['resultcount'], 'results' => $result['results'], 'searchVariable' => $result['searchVariable'], 'sortBy' => $result['sortBy'], 'order' => $result['order'], 'query_string' => $result['query_string']]);

}

    }

    public function create(Request $request) {
        $countries   =  Country::get();
        $ages        =  Lookup::where('lookup_type','age')->get();

        return  View("admin.$this->model.add",compact('countries','ages'));
    }

    public function store(Add_userRequest $request) {

        $result = $this->Add_userService->store($request);
        if($result['status'] == true){
            Session()->flash('success', ucfirst(Config('constants.INDIVIDUAL.INDIVIDUAL_TITLE')." has been added successfully"));
            return Redirect()->route($this->model . ".index");
        }else{
            Session()->flash('error', trans("Something went wrong."));
            return Redirect()->back()->withInput();
        }
    }

    public function edit(Request $request,  $enuserid = null) {
        $user_id        =  base64_decode($enuserid);
        $userDetails    =  User::find($user_id);
        $countries      =  Country::get();
        $ages           =  Lookup::where('lookup_type','age')->get();
        if (!empty($userDetails)) {
            return  View("admin.$this->model.edit", compact('ages','countries','userDetails'));
        }
        return back();
    }

    public function update(IndividualUpdateRequest $request,  $enuserid = null){
        if ($request->isMethod('PUT')) {
            $thisData = $request->all();
            $user_id = base64_decode($enuserid);
            $user                               =   User::where("id",$user_id)->first();
            if (!empty($user)) {
                $user->first_name                   =   $request->first_name;
                $user->last_name                    =   $request->last_name;
                $user->username                     =   $request->username;
                $user->email                        =   $request->email;
                $user->phone_prefix                 =   $request->phone_prefix;
                $user->phone_code                   =   $request->phone_code;
                $user->phone_number                 =   $request->phone_number;
                $user->country                      =   $request->country;
                $user->age_id                       =   $request->age;
                $SavedResponse = $user->save();
                if (!$SavedResponse) {
                    Session()->flash('error', trans("Something went wrong."));
                    return Redirect()->back()->withInput();
                }
                Session()->flash('success', ucfirst(Config('constants.CUSTOMER.CUSTOMERS_TITLE')." has been updated successfully"));
                return Redirect()->route($this->model . ".index");
            }
            return back();

        }
    }

    


}
