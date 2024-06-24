<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\CmsService;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\admin\CmsPageRequest;
use App\Models\Language;
use App\Models\Cms;
use App\Models\CmsDescription;
use Illuminate\Support\Str;

class CmspagesController extends Controller
{
    public $model = 'cms-manager';
    public $sectionNamePlural = 'Cms Pages';
    public $sectionNameSingular = 'Cms Page';

    public function __construct(Request $request, CmsService $CmsService) {
        parent::__construct();
        View()->share('modelName', $this->model);
        View()->share('sectionNamePlural', $this->sectionNamePlural);
        View()->share('sectionNameSingular', $this->sectionNameSingular);
        $this->CmsService = $CmsService;
        $this->request = $request;
    }

    public function index(Request $request) {
        $DB = Cms::query();
        $searchVariable = array();
        $inputGet = $request->all();

        if ($request->all()) {
            $searchData = $request->all();
            unset($searchData['display'], $searchData['_token'], $searchData['order'], $searchData['sortBy'], $searchData['page']);

            foreach ($searchData as $fieldName => $fieldValue) {
                if ($fieldValue != "") {
                    if ($fieldName == "page_name") {
                        $DB->where("cms.page_name", 'like', '%' . $fieldValue . '%');
                    }
                    if ($fieldName == "title") {
                        $DB->where("cms.title", 'like', '%' . $fieldValue . '%');
                    }
                }
                $searchVariable = array_merge($searchVariable, array($fieldName => $fieldValue));
            }
        }

        $sortBy = $request->input('sortBy') ? $request->input('sortBy') : 'created_at';
        $order = $request->input('order') ? $request->input('order') : 'DESC';
        $records_per_page = $request->input('per_page') ? $request->input('per_page') : Config("Reading.records_per_page");
        $results = $DB->orderBy($sortBy, $order)->paginate($records_per_page);

        $complete_string = $request->query();
        unset($complete_string["sortBy"], $complete_string["order"]);
        $query_string = http_build_query($complete_string);

        $results->appends($inputGet)->render();

        return View("admin.$this->model.index", compact('results', 'searchVariable', 'sortBy', 'order', 'query_string'));
    }

    public function create() {
        $languages = Language::where('is_active', 1)->get();
        $language_code = Config('constants.DEFAULT_LANGUAGE.LANGUAGE_CODE');
        return View("admin.$this->model.add", compact('languages', 'language_code'));
    }

    public function store(CmsPageRequest $request) {
        $result = $this->CmsService->store($request);
        if ($result['status']) {
            return Redirect()->route($this->model . ".index")->with('success', $result['message']);
        } else {
            return Redirect()->back()->with('error', $result['message']);
        }
    }

    public function show($encmsid = null) {
        $cms_id = '';
        if (!empty($encmsid)) {
            $cms_id = base64_decode($encmsid);
        } else {
            return Redirect()->route($this->model . ".index");
        }

        $CmsDetails = Cms::find($cms_id);
        $data = compact('CmsDetails');
        return view("admin.$this->model.view", $data);
    }

    public function edit(Request $request, $encmsid = null) {
        $result = $this->CmsService->edit($request, $encmsid);
        if ($result['status']) {
            $modelDetails = $result['data']['modelDetails'];
            $languages = $result['data']['languages'];
            $language_code = $result['data']['language_code'];
            return View("admin.$this->model.edit", compact('languages', 'language_code', 'modelDetails'));
        } else {
            return Redirect()->back()->with('error', $result['message']);
        }
    }

    public function update(CmsPageRequest $request, $enuserid = null) {
        $result = $this->CmsService->update($request, $enuserid);
        if ($result['status']) {
            return Redirect()->route($this->model . ".index")->with('success', $result['message']);
        } else {
            return Redirect()->back()->with('error', $result['message']);
        }
    }

    public function destroy($encmsid) {
        $cms_id = '';
        if (!empty($encmsid)) {
            $cms_id = base64_decode($encmsid);
        }

        $CmsDetails = Cms::find($cms_id);

        if ($CmsDetails) {
            $CmsDetails->delete();
            CmsDescription::where("parent_id", $cms_id)->delete();
            Session()->flash('flash_notice', trans(Config('constants.CMS_MANAGER.CMS_PAGE_TITLE') . " has been removed successfully"));
        }
        return back();
    }
}
