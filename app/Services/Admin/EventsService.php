<?php
namespace App\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\ImageUpload;
use App\Http\Requests\admin\EventsRequest;
use App\Http\Requests\admin\EventsRequestUpdate;
use App\Models\Events;
use Redirect, Session, Config;

class EventsService
{
    use ImageUpload;

    public function index(Request $request)
    {
        $result = [];
        $DB = Events::query();
        $searchVariable = [];
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
                        $DB->where("name", 'like', '%' . $fieldValue . '%');
                    }
                    if ($fieldName == "is_active") {
                        $DB->where("is_active", 'like', '%' . $fieldValue . '%');
                    }
                }
                $searchVariable = array_merge($searchVariable, array($fieldName => $fieldValue));
            }
        }

        $DB->where("is_deleted", 0);
        $sortBy = ($request->input('sortBy')) ? $request->input('sortBy') : 'created_at';
        $order = ($request->input('order')) ? $request->input('order') : 'DESC';
        $records_per_page = ($request->input('per_page')) ? $request->input('per_page') : Config::get("Reading.records_per_page");
        $results = $DB->orderBy($sortBy, $order)->paginate($records_per_page);
        $complete_string = $request->query();
        unset($complete_string["sortBy"]);
        unset($complete_string["order"]);
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

    public function store(EventsRequest $request)
    {
        $result = [];
        $thisData = $request->all();
        $Events = new Events;
        $Events->name = $request->title;
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
        while (Events::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        $Events->slug = $slug;
        $Events->short_description = $request->short_des;
        $Events->description = $request->description;

        if ($request->hasFile('image')) {
            $path = parse_url($Events->image, PHP_URL_PATH);
            $oldPath = Str::after($path, 'Events');
            $Events->image = $this->upload($request, 'image', Config('constants.EVENTS_ROOT_PATH'), $oldPath);
        }

        $SavedResponse = $Events->save();

        if (!$SavedResponse) {
            $result = ['status' => false, 'message' => 'Something Is wrong'];
        } else {
            $result = ['status' => true, 'message' => 'Event Was Saved'];
        }

        return $result;
    }

    public function changeStatus($modelId, $status)
    {
        $result = [];
        if ($status == 0) {
            $statusMessage = trans(Config('constants.EVENTS.EVENTS_TITLE') . " has been deactivated successfully");
        } else {
            $statusMessage = trans(Config('constants.EVENTS.EVENTS_TITLE') . " has been activated successfully");
        }
        $Events = Events::find($modelId);
        if ($Events) {
            $currentStatus = $Events->is_active;
            if (isset($currentStatus) && $currentStatus == 0) {
                $NewStatus = 1;
            } else {
                $NewStatus = 0;
            }
            $Events->is_active = $NewStatus;
            $ResponseStatus = $Events->save();
            if ($ResponseStatus) {
                $result = ['status' => true, 'message' => $statusMessage];
            } else {
                $result = ['status' => false, 'message' => $statusMessage];
            }
        }

        return $result;
    }
    public function edit(Request $request, $enuserid)
    {
        $result = [];
        $Events_id = base64_decode($enuserid);
        $userDetails = Events::find($Events_id);
        $result = ['status' => true, 'userDetails' => $userDetails];
        return $result;
    }

    public function show($enuserid)
    {
        $result = [];
        $events = '';
        if (!empty($enuserid)) {
            $events = base64_decode($enuserid);
        } else {
            return redirect()->route($this->model . ".index");
        }
        $eventsDetails = Events::where('id', $events)->first();
        $result = ['status' => true, 'eventsDetails' => $eventsDetails];
        return $result;
    }

    public function destroy($enuserid)
    {
        $result = [];
        $Events_id = '';
        if (!empty($enuserid)) {
            $Events_id = base64_decode($enuserid);
        }
        $EventsDetails = Events::find($Events_id);
        if (empty($EventsDetails)) {
            return Redirect()->route($this->model . '.index');
        }
        if ($Events_id) {
            Events::where('id', $Events_id)->update([
                'is_deleted' => 1
            ]);
            $result = ['status' => true, 'message' => 'Events Has Been Removed Successfully'];
        }
        return $result;
    }

    public function detail_yoga(Request $request, $name)
    {
        $frond_event_list = Events::where('slug', $name)->first();
        $result = ['frontlist' => $frond_event_list];
        return $result;
    }

    public function frontlist(Request $request)
    {
        $frond_event_list = Events::where('is_deleted', 0)->where('is_active', 1)->get();
        $result = ['frontlist' => $frond_event_list];
        return $result;
    }

    public function update(EventsRequestUpdate $request, $enuserid)
    {
        $result = [];
        if ($request->isMethod('PUT')) {
            $thisData = $request->all();
            $Events_id = base64_decode($enuserid);
            $Events = Events::find($Events_id);

            if (!empty($Events)) {
                $Events->name = $request->title;
                $Events->slug = Str::slug($request->title);
                $Events->short_description = $request->short_des;
                $Events->description = $request->description;

                if ($request->hasFile('image')) {
                    if ($Events->image) {
                        $path = parse_url($Events->image, PHP_URL_PATH);
                        $oldPath = Str::after($path, 'Events/');
                        if (file_exists(public_path($oldPath))) {
                            unlink(public_path($oldPath));
                        }
                    }
                    $Events->image = $this->upload($request, 'image', Config('constants.EVENTS_ROOT_PATH'));
                }

                $SavedResponse = $Events->save();
                if (!$SavedResponse) {
                    $result = ['status' => false, 'message' => 'Something went wrong'];
                } else {
                    $result = ['status' => true, 'message' => 'Event was updated'];
                }
            } else {
                $result = ['status' => false, 'message' => 'Event not found'];
            }
        } else {
            $result = ['status' => false, 'message' => 'Invalid request method'];
        }
        return $result;
    }
}
