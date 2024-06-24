<?php
namespace App\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\ImageUpload;
use App\Http\Requests\admin\ClassRequest;
use App\Http\Requests\admin\ClassUpdateRequest;
use App\Models\Classes;
use Redirect, Session, Config;

class ClassService
{
    use ImageUpload;

    public function index(Request $request)
    {
        $result = [];
        $DB = Classes::query();
        $searchVariable = [];
        $inputGet = $request->all();

        if ($request->all()) {
            $searchData = $request->all();
            unset($searchData['display'], $searchData['_token'], $searchData['order'], $searchData['sortBy'], $searchData['page']);

            if (!empty($searchData['date_from']) && !empty($searchData['date_to'])) {
                $dateS = date("Y-m-d", strtotime($searchData['date_from']));
                $dateE = date("Y-m-d", strtotime($searchData['date_to']));
                $DB->whereBetween('created_at', ["$dateS 00:00:00", "$dateE 23:59:59"]);
            } elseif (!empty($searchData['date_from'])) {
                $dateS = $searchData['date_from'];
                $DB->where('created_at', '>=', "$dateS 00:00:00");
            } elseif (!empty($searchData['date_to'])) {
                $dateE = $searchData['date_to'];
                $DB->where('created_at', '<=', "$dateE 00:00:00");
            }

            foreach ($searchData as $fieldName => $fieldValue) {
                if ($fieldValue != "") {
                    if ($fieldName == "name") {
                        $DB->where("name", 'like', "%$fieldValue%");
                    }

                    if ($fieldName == "is_active") {
                        $DB->where("is_active", 'like', "%$fieldValue%");
                    }
                }
                $searchVariable = array_merge($searchVariable, [$fieldName => $fieldValue]);
            }
        }

        $DB->where("is_deleted", 0);
        $sortBy = $request->input('sortBy', 'created_at');
        $order = $request->input('order', 'DESC');
        $records_per_page = $request->input('per_page', Config::get("Reading.records_per_page"));
        $results = $DB->orderBy($sortBy, $order)->paginate($records_per_page);

        $complete_string = $request->query();
        unset($complete_string["sortBy"], $complete_string["order"]);
        $query_string = http_build_query($complete_string);
        $results->appends($inputGet)->render();
        $resultcount = $results->count();

        $result = [
            'status' => true,
            'resultcount' => $resultcount,
            'results' => $results,
            'searchVariable' => $searchVariable,
            'sortBy' => $sortBy,
            'order' => $order,
            'query_string' => $query_string
        ];

        return $result;
    }

    public function store(ClassRequest $request)
    {
        $result = [];
        $thisData = $request->all();
        $Classes = new Classes;
        $Classes->name = $request->title;
        $Classes->name_contact_us_first = $request->contact_us_one_title;
        $Classes->name_contact_us_second = $request->contact_us_two_title;
        $Classes->descriptions = $request->description;

        if ($request->hasFile('image')) {
            $path = parse_url($Classes->image, PHP_URL_PATH);
            $oldPath = Str::after($path, 'Class');
            $Classes->image = $this->upload($request, 'image', Config('constants.CLASS_ROOT_PATH'), $oldPath);
        }

        $SavedResponse = $Classes->save();
        $result = $SavedResponse
            ? ['status' => true, 'message' => 'Class was saved']
            : ['status' => false, 'message' => 'Something went wrong'];

        return $result;
    }

    public function changeStatus($modelId, $status)
    {
        $result = [];
        $statusMessage = $status == 0
            ? trans(Config('constants.CLASS.CLASS_TITLE') . " has been deactivated successfully")
            : trans(Config('constants.CLASS.CLASS_TITLE') . " has been activated successfully");

        $Class = Classes::find($modelId);
        if ($Class) {
            $currentStatus = $Class->is_active;
            $NewStatus = $currentStatus == 0 ? 1 : 0;
            $Class->is_active = $NewStatus;
            $ResponseStatus = $Class->save();

            $result = $ResponseStatus
                ? ['status' => true, 'message' => $statusMessage]
                : ['status' => false, 'message' => $statusMessage];
        }

        return $result;
    }

    public function edit(Request $request, $enuserid)
    {
        $result = [];
        $Class_id = base64_decode($enuserid);
        $classDetails = Classes::find($Class_id);
        $result = ['status' => true, 'userDetails' => $classDetails];

        return $result;
    }

    public function page_data(Request $request)
    {
        $classDetails = Classes::first();
        return $classDetails;
    }

    public function show($enuserid)
    {
        $result = [];
        $class = !empty($enuserid) ? base64_decode($enuserid) : redirect()->route($this->model . ".index");
        $classDetails = Classes::where('id', $class)->first();
        $result = ['status' => true, 'eventsDetails' => $classDetails];

        return $result;
    }

    public function update(ClassUpdateRequest $request, $enuserid)
    {
        $result = [];
        if ($request->isMethod('PUT')) {
            $thisData = $request->all();
            $Class_id = base64_decode($enuserid);
            $Classes = Classes::find($Class_id);

            if (!empty($Classes)) {
                $Classes->name = $request->title;
                $Classes->name_contact_us_frist = $request->contact_us_one_title;
                $Classes->name_contact_us_second = $request->contact_us_two_title;
                $Classes->short_description = $request->short_description;
                $Classes->descriptions = $request->description;

                if ($request->hasFile('image')) {
                    if ($Classes->image) {
                        $path = parse_url($Classes->image, PHP_URL_PATH);
                        $oldPath = Str::after($path, 'Class/');
                        if (file_exists(public_path($oldPath))) {
                            unlink(public_path($oldPath));
                        }
                    }
                    $Classes->image = $this->upload($request, 'image', Config('constants.CLASS_ROOT_PATH'));
                }

                $SavedResponse = $Classes->save();
                $result = $SavedResponse
                    ? ['status' => true, 'message' => 'Class was updated']
                    : ['status' => false, 'message' => 'Something went wrong'];
            } else {
                $result = ['status' => false, 'message' => 'Class not found'];
            }
        } else {
            $result = ['status' => false, 'message' => 'Invalid request method'];
        }

        return $result;
    }
}
