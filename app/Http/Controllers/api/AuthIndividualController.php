<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\IndividualSignupRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Traits\ImageUpload;
use Session,Auth,Config;

class AuthIndividualController extends Controller
{
	use ImageUpload;

	public function individualSignup(IndividualSignupRequest $request) {
		try {

			$users     					   =  		  new User;
			$users->user_role_id           =          $request->user_role_id;
			$users->first_name             =          $request->first_name;
			$users->last_name              =          $request->last_name;
			$users->username               =          $request->username;
			$users->email     		       =          $request->email;
			$users->phone_code     	       =          $request->phone_code ?? '';
			$users->phone_prefix           =          $request->phone_prefix ?? '';
			$users->phone_number           =          $request->phone_number ?? '';
			$users->country                =          $request->country;
			$users->age_id     		       =          $request->age;
			$users->password               =          Hash::make($request->password);
	        $users->image 				   = 		  $this->upload($request,'image',Config('constants.USER_IMAGE_ROOT_PATH'));
			$users->otp            		   = 	      $this->getVerificationCode();
			$users->save();

			if($users != null){
				$others  = [$request->first_name.$request->last_name,$users->otp,Config("Contact.CompanyName")];
				$this->setContent($request->email,$request->first_name.$request->last_name,"account_verification",$others);
				$response["status"]                =   "success";
            	$response["msg"]                   =   "The verification code has been successfully sent to your email address.";
            	$response["user_id"]          	   =   $users->id;
            	$response["otp_expired"]           =   date("Y-m-d H:i:s",strtotime('+ 1 min'));
			}

		}catch (\Exception $th) {
            $response["status"]                =   "error";
            $response["msg"]                   =   "Api has been not working please check it.";
        }
        return json_encode($response, 200);
	}

}