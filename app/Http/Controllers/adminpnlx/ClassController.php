<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\ClassService;
use App\Http\Requests\admin\ClassRequest;
use App\Http\Requests\admin\ClassUpdateRequest;
use Redirect, Session, Config;

class ClassController extends Controller
{
    public $model                = 'Class';
    public $sectionNameSingular  = 'Class';

    public function __construct(Request $request, ClassService $ClassService) {
        View()->share('model', $this->model);
        View()->share('sectionNameSingular', $this->sectionNameSingular);
        $this->ClassService = $ClassService;
        $this->request = $request;
    }

    public function index(Request $request) {
        $result = $this->ClassService->index($request);
        if ($result['status'] == true) {
            return View("admin.$this->model.index")->with([
                'resultcount'    => $result['resultcount'],
                'results'        => $result['results'],
                'searchVariable' => $result['searchVariable'],
                'sortBy'         => $result['sortBy'],
                'order'          => $result['order'],
                'query_string'   => $result['query_string']
            ]);
        }
    }

    public function create(Request $request) {
        return View("admin.$this->model.add");
    }

    public function store(ClassRequest $request) {
        $result = $this->ClassService->store($request);
        if ($result['status'] == true) {
            return Redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return Redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function edit(Request $request, $enuserid = null) {
        $result = $this->ClassService->edit($request, $enuserid);
        if ($result['status'] == true) {
            return View("admin.$this->model.edit")->with(['userDetails' => $result['userDetails']]);
        } else {
            return redirect()->back()->with(['error' => 'Something went wrong, Event Not Found']);
        }
    }

    public function update(ClassUpdateRequest $request, $enuserid = null) {
        $result = $this->ClassService->update($request, $enuserid);
        if ($result['status'] == true) {
            return redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function changeStatus($modelId = 0, $status = 0) {
        $result = $this->ClassService->changeStatus($modelId, $status);
        if ($result['status'] == true) {
            return redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function show($enuserid = null) {
        $result = $this->ClassService->show($enuserid);
        if ($result['status'] == true) {
            return View("admin.$this->model.view")->with(['eventDetails' => $result['eventsDetails']]);
        } else {
            return redirect()->back()->with(['error' => 'Something went wrong']);
        }
    }
}
