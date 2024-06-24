<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\System_docmuent;
use App\Http\Requests\admin\System_documentRequest;
use Redirect, Session, Config;

class SystemDocmentController extends Controller
{
    public $model = 'system_documents';
    public $sectionNameSingular = 'System Document';

    public function __construct(Request $request, System_docmuent $System_docmuent) {
        View()->share('model', $this->model);
        View()->share('sectionNameSingular', $this->sectionNameSingular);
        $this->System_docmuent = $System_docmuent;
        $this->request = $request;
    }

    public function index(Request $request) {
        $result = $this->System_docmuent->index($request);
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

    public function store(System_documentRequest $request) {
        $result = $this->System_docmuent->store($request);
        if ($result['status'] == true) {
            return Redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return Redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function edit(Request $request, $enuserid = null) {
        $result = $this->System_docmuent->edit($request, $enuserid);
        if ($result['status'] == true) {
            return View("admin.$this->model.edit")->with(['userDetails' => $result['userDetails']]);
        } else {
            return redirect()->back()->with(['error' => 'Something went wrong, document not found']);
        }
    }

    public function update(System_documentRequest $request, $enuserid = null) {
        $result = $this->System_docmuent->update($request, $enuserid);
        if ($result['status'] == true) {
            return redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function destroy($enuserid) {
        $result = $this->System_docmuent->destroy($enuserid);
        if ($result['status'] == true) {
            return redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return redirect()->back()->with(['error' => 'Something went wrong']);
        }
    }

    public function changeStatus($modelId = 0, $status = 0) {
        $result = $this->System_docmuent->changeStatus($modelId, $status);
        if ($result['status'] == true) {
            return redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function show($enuserid = null) {
        $result = $this->System_docmuent->show($enuserid);
        if ($result['status'] == true) {
            return View("admin.$this->model.view")->with(['eventDetails' => $result['eventsDetails']]);
        } else {
            return redirect()->back()->with(['error' => 'Something went wrong']);
        }
    }

    public function frontlist(Request $request) {
        $result = $this->System_docmuent->frontlist($request);
        return $result['result'];
    }
}
