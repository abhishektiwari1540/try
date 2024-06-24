<?php
namespace App\Services\Admin;

use App\Models\Security;
use App\Models\Lookup;
use Illuminate\Http\Request;
use App\Http\Requests\admin\CmsPageRequest;
use Illuminate\Support\Facades\Validator;
use  App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\CmsDescription;
use App\Traits\ImageUpload;
use App\Models\Faq;
use App\Models\Language;

class SettingService
{

    public function index(Request $request){
        $result = [];
        $DB = Setting::query();
        $searchVariable  =  array();
        $inputGet    =  $request->all();
        if ($inputGet) {
            $searchData  =  $request->all();
            foreach ($searchData as $fieldName => $fieldValue) {
                if (!empty($fieldValue)) {
                    if ($fieldName == "title") {
                        $DB->where("settings.title", 'like', '%' . $fieldValue . '%');
                    }
                    $searchVariable  =  array_merge($searchVariable, array($fieldName => $fieldValue));
                }
            }
        }
        $sortBy = ($request->input('sortBy')) ? $request->input('sortBy') : 'id';
        $order  = ($request->input('order')) ? $request->input('order')   : 'ASC';
        $result = $DB->orderBy($sortBy, $order)->paginate(Config("Reading.records_per_page"));
           $result = ['status' => true,  'results' => $results, 'searchVariable' => $searchVariable, 'sortBy' => $sortBy, 'order' => $order];
           return $result;
       }

       public function store(Request $request){
           $result = [];

        $validated = $request->validate([
            'title' => 'required',
            'key' => 'required',
            'key'  => 'required',
            'input_type' => 'required',
        ]);
        $obj              = new Setting;
        $obj->title       = $request->title;
        $obj->key         = $request->key;
        $obj->value       = $request->value;
        $obj->input_type  = $request->input_type;
        // $obj->editable    = 1;
        $savedata = $obj->save();
        if ($savedata) {
            $result = ['status' => true,'message' => 'Setting added successfully.'];
        }else{
            $result = ['status' => false,'message' => 'Plerse Try After Sometime .'];
        }
            return $result;
       }


       public function changeStatus($modelId , $status){
           $result = [];
           if ($status == 0) {
               $statusMessage   =   trans(Config('constants.CLASS.CLASS_TITLE'). " has been deactivated successfully");
           } else {
               $statusMessage   =   trans(Config('constants.CLASS.CLASS_TITLE'). " has been activated successfully");
           }
           $Class = Classes::find($modelId);
           if ($Class) {
               $currentStatus = $Class->is_active;
               if (isset($currentStatus) && $currentStatus == 0) {
                   $NewStatus = 1;
               } else {
                   $NewStatus = 0;
               }
               $Class->is_active = $NewStatus;
               $ResponseStatus = $Class->save();
               if($ResponseStatus){
                   $result = ['status' => true, 'message' => $statusMessage];
               }else{
                   $result = ['status' => false, 'message' => $statusMessage];
               }
           }

           return $result;
       }


       public function edit(Request $request,$ensetid){
           $result = [];
           $Set_id = '';
           $setdetails =    array();
           if (!empty($ensetid)) {
               $Set_id = base64_decode($ensetid);
               $setdetails   =   Setting::find($Set_id);
               $data = compact('setdetails');
               $result = ['status' => true, 'data' => $data];

            //    return  View("admin.$this->model.edit", $data);
           } else {
            $result = ['status' => false, 'data' => 'Please Try After Some Thime'];
           }
           return $result;
       }

       public function page_data(Request $request){


           // $Class_id        =  base64_decode($enuserid);
           $classDetails    =  Classes::first();


           return $classDetails;
       }


       public function show($enuserid){
           $result = [];
           $class = '';
           if (!empty($enuserid)) {
               $class = base64_decode($enuserid);
           } else {
               return redirect()->route($this->model . ".index");
           }
           $classDetails    =    Classes::where('id', $class)->first();
           $result = ['status' => true, 'eventsDetails' => $classDetails];
           return $result;
       }

       public function update(Request $request, $ensetid)
   {
    $result = [];
    $Set_id = '';
        $setdetails =    array();
        if (!empty($ensetid)) {
            $Set_id = base64_decode($ensetid);
        } else {
            $result = ['status' => false, 'message' => 'Id Was Not Found'];
        }

       $validated = $request->validate([
        'title' => 'required',
        'key' => 'required',
        'key'  => 'required',
        'input_type' => 'required',
    ]);
    $obj   = Setting::find($Set_id);
    $obj->title        = $request->title;
    $obj->key         = $request->key;
    $obj->value       = $request->value;
    $obj->input_type       = $request->input_type;
    $obj->editable      = 1;
    $savedata = $obj->save();
    if ($savedata) {
        $result = ['status' => true, 'message' => 'Data Was Update successfully'];
    }
       return $result;
   }

   public function destroy($ensetid){
    $result = [];
    $id = '';
        if (!empty($ensetid)) {
            $id = base64_decode($ensetid);
        }
        $settingDetails   =  Setting::find($id);
        if ($settingDetails) {
            $settingDetails->delete();
            $result = ['status' => true, 'message' => ' Setting deleted successfully'];
        }
        return $result;

   }

   public function front_website(Request $request){
    $result = [];

$keys = [
    'Site.title',
    'Site.from_email',
    'Contact.email_address',
    'Contact.address',
    'Contact.phone',
    'Site.right',
];

$settings = Setting::whereIn('key', $keys)->pluck('value', 'key');

$result = [
    'site_title' => $settings->get('Site.title'),
    'from_email' => $settings->get('Site.from_email'),
    'email_address' => $settings->get('Contact.email_address'),
    'address' => $settings->get('Contact.address'),
    'phone' => $settings->get('Contact.phone'),
    'site_right' => $settings->get('Site.right'),
];

// dd($result);
    return $result;
   }





}
