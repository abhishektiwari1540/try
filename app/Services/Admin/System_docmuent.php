<?php
namespace App\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\ImageUpload;
use App\Http\Requests\admin\System_documentRequest;
// use App\Http\Requests\admin\ClassUpdateRequest;
use App\Models\System_document;
// use App\Models\Country;
// use App\Models\Lookup;

use Redirect,Session,Config;

class System_docmuent
{
    use ImageUpload;
    public function index(Request $request){
     $result = [];
        $DB					=	System_document::query();
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



                    if ($fieldName == "name") {
                        $DB->where("name", 'like', '%' . $fieldValue . '%');
                    }


                    if ($fieldName == "created_at") {
                        $DB->where("created_at", 'like', '%' . $fieldValue . '%');
                    }

                    if ($fieldName == "is_active") {
                        $DB->where("is_active", 'like', '%' . $fieldValue . '%');
                    }
                }
                $searchVariable	=	array_merge($searchVariable, array($fieldName => $fieldValue));
            }
        }

        $DB->where("is_deleted", 0);
        // $DB->where("user_role_id", 1);
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

    public function store(System_documentRequest $request){
        // dd($result);
        $result = [];
        $thisData = $request->all();
        $System_document                               =   new System_document;
        $System_document->name                   =   $request->title;
        if ($request->hasFile('image')) {
            $path           = parse_url($System_document->image, PHP_URL_PATH);
            $oldPath        = Str::after($path, 'System_document');
            $System_document->image  = $this->upload($request,'image',Config('constants.SYSTEM_DOCUMENT_IMAGE_ROOT_PATH'),$oldPath);
       }
        // = $this->ImageUpload($request->file('image'), 'image');?
        $SavedResponse = $System_document->save();
        if (!$SavedResponse) {
            $result = ['status' => false, 'message' => 'Somethis Is worng'];

        } else {
            $result = ['status' => true, 'message' => 'Information Was Save'];

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
        $Class = System_document::find($modelId);
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


    public function edit(Request $request,$enuserid){
        $result = [];

        $Class_id        =  base64_decode($enuserid);
        $classDetails    =  System_document::find($Class_id);
        $result = ['status' => true, 'userDetails' => $classDetails];

        return $result;
    }

    public function page_data(Request $request){


        // $Class_id        =  base64_decode($enuserid);
        $classDetails    =  System_document::first();


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
        $classDetails    =    System_document::where('id', $class)->first();
        $result = ['status' => true, 'eventsDetails' => $classDetails];
        return $result;
    }


    public function data(Request $request){
        $data = System_document::get();
        return $data;
    }

    public function update(System_documentRequest $request, $enuserid)
{
    $result = [];
    if ($request->isMethod('PUT')) {
        $thisData = $request->all();
        $Class_id = base64_decode($enuserid);
        $System_document = System_document::find($Class_id);

        if (!empty($System_document)) {
            $System_document->name                   =   $request->title;
            if ($request->hasFile('image')) {
                // Remove the old image if it exists
                if ($System_document->image) {
                    $path = parse_url($System_document->image, PHP_URL_PATH);
                    $oldPath = Str::after($path, 'system-document/');
                    if (file_exists(public_path($oldPath))) {
                        unlink(public_path($oldPath));
                    }
                }
                // Upload the new image
                $System_document->image = $this->upload($request, 'image', Config('constants.SYSTEM_DOCUMENT_IMAGE_ROOT_PATH'));
            }

            $SavedResponse = $System_document->save();
            if (!$SavedResponse) {
                $result = ['status' => false, 'message' => 'Something went wrong'];
            } else {
                $result = ['status' => true, 'message' => 'Information was updated'];
            }
        } else {
            $result = ['status' => false, 'message' => 'Information not found'];
        }
    } else {
        $result = ['status' => false, 'message' => 'Invalid request method'];
    }
    return $result;
}


}
