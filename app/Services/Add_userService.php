<?php
namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\admin\Add_userRequest;
use App\Models\User;
use App\Models\Country;
use App\Models\Lookup;

use Redirect,Session,Config;

class Add_userService
{
    public function index(Request $request){
$result = [];
        $DB					=	User::query();
        $searchVariable		=	array();
        $inputGet			=	$request->all();
        if ($request->all()) {
            $searchData			=	$request->all();
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
                $dateS = date("Y-m-d",strtotime($searchData['date_from']));
                $dateE =  date("Y-m-d",strtotime($searchData['date_to']));
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
                    if ($fieldName == "first_name") {
                        $DB->where("first_name", 'like', '%' . $fieldValue . '%');
                    }
                    if ($fieldName == "address") {
                        $DB->where("address", 'like', '%' . $fieldValue . '%');
                    }
                    if ($fieldName == "last_name") {
                        $DB->where("last_name", 'like', '%' . $fieldValue . '%');
                    }
                    if ($fieldName == "name") {
                        $DB->where("name", 'like', '%' . $fieldValue . '%');
                    }
                    if ($fieldName == "email") {
                        $DB->where("email", 'like', '%' . $fieldValue . '%');
                    }
                    if ($fieldName == "is_active") {
                        $DB->where("is_active", 'like', '%' . $fieldValue . '%');
                    }
                }
                $searchVariable	=	array_merge($searchVariable, array($fieldName => $fieldValue));
            }
        }

        $DB->where("is_deleted", 0);
        $DB->where("user_role_id", 1);
        $sortBy = ($request->input('sortBy')) ? $request->input('sortBy') : 'created_at';
        $order  = ($request->input('order')) ? $request->input('order')   : 'DESC';
        $records_per_page	=	($request->input('per_page')) ? $request->input('per_page') : Config::get("Reading.records_per_page");
        $results = $DB->orderBy($sortBy, $order)->paginate($records_per_page);
        $complete_string		=	$request->query();
        unset($complete_string["sortBy"]);
        unset($complete_string["order"]);
        $query_string			=	http_build_query($complete_string);
        $results->appends($inputGet)->render();
        $resultcount = $results->count();

        $result = ['status' => true, 'resultcount' => $resultcount, 'results' => $results, 'searchVariable' => $searchVariable, 'sortBy' => $sortBy, 'order' => $order, 'query_string' => $query_string];
        return $result;
    }

    public function store(Add_userRequest $request){
        $result = [];
        $thisData = $request->all();
        $user                               =   new User;
        $user->user_role_id                 =   Config('constants.ROLE_ID.INDIVIDUAL_ROLE_ID');
        $user->first_name                   =   $request->first_name;
        $user->last_name                    =   $request->last_name;
        $user->username                     =   $request->username;
        $user->email                        =   $request->email;
        $user->phone_prefix                 =   $request->phone_prefix;
        $user->phone_code                   =   $request->phone_code;
        $user->phone_number                 =   $request->phone_number;
        $user->country                      =   $request->country;
        $user->age_id                          =   $request->age;

        $SavedResponse = $user->save();
        if (!$SavedResponse) {
            $result = ['status' => false];

        } else {
            $result = ['status' => true];

        }
         return $result;
    }



}
