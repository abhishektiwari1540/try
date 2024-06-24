<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\TestimonialsService;
use App\Http\Requests\admin\TestimonialsRequest;
use Redirect, Session, Config;

class TestimonialsController extends Controller
{
    public $model = 'testimonials';
    public $sectionNameSingular = 'testimonials';

    public function __construct(Request $request, TestimonialsService $TestimonialsService) {
        View()->share('model', $this->model);
        View()->share('sectionNameSingular', $this->sectionNameSingular);
        $this->TestimonialsService = $TestimonialsService;
        $this->request = $request;
    }

    public function index(Request $request) {
        $result = $this->TestimonialsService->index($request);
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

    public function store(TestimonialsRequest $request) {
        $result = $this->TestimonialsService->store($request);
        if ($result['status'] == true) {
            return Redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return Redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function edit(Request $request, $enuserid = null) {
        $result = $this->TestimonialsService->edit($request, $enuserid);
        if ($result['status'] == true) {
            return View("admin.$this->model.edit")->with(['userDetails' => $result['userDetails']]);
        } else {
            return redirect()->back()->with(['error' => 'Something went wrong, testimonial not found']);
        }
    }

    public function update(TestimonialsRequest $request, $enuserid = null) {
        $result = $this->TestimonialsService->update($request, $enuserid);
        if ($result['status'] == true) {
            return redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function destroy($enuserid) {
        $result = $this->TestimonialsService->destroy($enuserid);
        if ($result['status'] == true) {
            return redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return redirect()->back()->with(['error' => 'Something went wrong']);
        }
    }

    public function changeStatus($modelId = 0, $status = 0) {
        $result = $this->TestimonialsService->changeStatus($modelId, $status);
        if ($result['status'] == true) {
            return redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        } else {
            return redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function show($enuserid = null) {
        $result = $this->TestimonialsService->show($enuserid);
        if ($result['status'] == true) {
            return View("admin.$this->model.view")->with(['eventDetails' => $result['eventsDetails']]);
        } else {
            return redirect()->back()->with(['error' => 'Something went wrong']);
        }
    }

    public function frontlist(Request $request) {
        $result = $this->TestimonialsService->frontlist($request);
        return $result['result'];
    }
}
