<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\EventsService;
use App\Http\Requests\admin\EventsRequest;
use App\Http\Requests\admin\EventsRequestUpdate;
use Redirect, Session, Config;

class EventsAdminController extends Controller
{
    public $model = 'Events';
    public $sectionNameSingular = 'Events';

    public function __construct(Request $request, EventsService $EventsService) {
        View()->share('model', $this->model);
        View()->share('sectionNameSingular', $this->sectionNameSingular);
        $this->EventsService = $EventsService;
        $this->request = $request;
    }

    public function index(Request $request) {
        $result = $this->EventsService->index($request);
        if ($result['status'] == true) {
            return View("admin.$this->model.index")->with([
                'resultcount' => $result['resultcount'],
                'results' => $result['results'],
                'searchVariable' => $result['searchVariable'],
                'sortBy' => $result['sortBy'],
                'order' => $result['order'],
                'query_string' => $result['query_string']
            ]);
        }
    }

    public function create(Request $request) {
        return View("admin.$this->model.add");
    }

    public function store(EventsRequest $request) {
        $result = $this->EventsService->store($request);
        if ($result['status'] == true) {
            return Redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return Redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function edit(Request $request, $enuserid = null) {
        $result = $this->EventsService->edit($request, $enuserid);
        if ($result['status'] == true) {
            return View("admin.$this->model.edit")->with(['userDetails' => $result['userDetails']]);
        } else {
            return redirect()->back()->with(['error' => 'Something went wrong, event not found']);
        }
    }

    public function update(EventsRequestUpdate $request, $enuserid = null) {
        $result = $this->EventsService->update($request, $enuserid);
        if ($result['status'] == true) {
            return redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function destroy($enuserid) {
        $result = $this->EventsService->destroy($enuserid);
        if ($result['status'] == true) {
            return redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return redirect()->back()->with(['error' => 'Something went wrong']);
        }
    }

    public function changeStatus($modelId = 0, $status = 0) {
        $result = $this->EventsService->changeStatus($modelId, $status);
        if ($result['status'] == true) {
            return redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function show($enuserid = null) {
        $result = $this->EventsService->show($enuserid);
        if ($result['status'] == true) {
            return View("admin.$this->model.view")->with(['eventDetails' => $result['eventsDetails']]);
        } else {
            return redirect()->back()->with(['error' => 'Something went wrong']);
        }
    }

    public function frontlist(Request $request) {
        $result = $this->EventsService->frontlist($request);
        return $result['result'];
    }
}
