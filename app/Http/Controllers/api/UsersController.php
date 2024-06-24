<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\LanguageRequest;
use App\Models\User;
use Storage;

class UsersController extends Controller
{
    public function profile() {
        $users                               =   User::with('ReceiverBusinessDetail')->find(Login()->id);
        $response                            =   array();
        $response["status"]                  =   "success";
        $response["msg"]                     =   "";
        $response["data"]                    =   $users->makeHidden(['created_at', 'updated_at','is_deleted', 'is_active']);;
        return json_encode($response, 200);
    }

    public function profileRequest(ProfileRequest $request) {
        $users      =   User::find(Login()->id);
        if($users != null){
            $users->name  =  $request->full_name;  
            if($request->hasFile('image')) {
                $photo                  = $request->file('image');
                $extension              = $photo->getClientOriginalExtension();
                $fileName               = time() . '-image.' . $extension;
                $folderName             = strtoupper(date('M') . date('Y')) . "/";
                $folderPath             = Config('constants.USER_IMAGE_ROOT_PATH') . $folderName;
                $deleteFolderPath       = Config('constants.USER_IMAGE_ROOT_PATH').$users->image;
                if (!empty($users->image) && Storage::disk('public')->exists($deleteFolderPath)) {
                    Storage::disk('public')->delete($deleteFolderPath);
                }
                if (Storage::disk('public')->putFileAs($folderPath, $photo, $fileName, 'public')) {
                    $users->image = $folderName . $fileName;
                }
            }
            $users->save();  
        }
        $response                            =   array();
        $response["status"]                  =   "success";
        $response["msg"]                     =   trans("messages.profile_has_been_updated_succssfully");
        return json_encode($response, 200);
    }

    public function notifications(Request $request) {
        $users      =   User::find(Login()->id);
        if($users != null){
            $users->enable_notification  =  $request->enable_notification;  
            $users->save();  
        }
        $response                            =   array();
        $response["status"]                  =   "success";
        $response["msg"]                     =   trans("messages.notification_has_been_updated_succssfully");
        return json_encode($response, 200);
    }

    public function accountDelete() {
        $users      =   User::find(Login()->id);
        if($users != null){
            $users->is_deleted  =  1;  
            $users->save();  
        }
        $response                            =   array();
        $response["status"]                  =   "success";
        $response["msg"]                     =   trans("messages.Your_account_has_been_deleted_succssfully");
        return json_encode($response, 200);
    }

    public function languageUpdate(LanguageRequest $request) {
        $users      =   User::find(Login()->id);
        if($users != null){
            $users->current_lang  =  $request->lang_code;  
            $users->save();  
        }
        $response                            =   array();
        $response["status"]                  =   "success";
        $response["msg"]                     =   trans("messages.language_has_been_updated_succssfully");
        return json_encode($response, 200);
    }
}
