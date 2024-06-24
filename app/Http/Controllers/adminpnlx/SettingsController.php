<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use  App\Models\Setting;
use App\Services\Admin\SettingService;
use Redirect;

class SettingsController extends Controller
{
    public $model      =   'settings';
    public function __construct(Request $request,SettingService $SettingService)
    {
        parent::__construct();
        View()->share('model', $this->model);
        $this->request = $request;
        $this->SettingService = $SettingService;
    }

    public function index(Request $request)
    {
        $result = $this->SettingService->index($request);
        if ($result['status'] == true) {
            return  view("admin.$this->model.index")->with(['results' => $result['results'], 'searchVariable' => $result['searchVariable'], 'sortBy' => $result['sortBy'], 'order' => $result['order']]);
                }
    }

    public function create()
    {
        return  View("admin.$this->model.add");
    }


    public function store(Request $request)
    {
        $result = $this->SettingService->store($request);
        if($result['status'] == true){

            return Redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        }else{
            return Redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function edit($ensetid)
    {
        $result = $this->SettingService->edit($request,$ensetid);
        if ($result['status'] == true) {
            return  View("admin.$this->model.edit")->with(['data' => $result['data']]);
        }else {
            return redirect()->back()->with(['error' => 'Somethig Was Worange Events Not Found']);
        }

    }

    public function update(Request $request, $ensetid)
    {

        $result = $this->SettingService->update($request,$ensetid);
        if($result['status'] == true){
            return redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        }else{
             return redirect()->back()->with(['error' => $result['message']]);
        }
    }

    public function destroy($ensetid)
    {
        $result = $this->SettingService->destroy($ensetid);
        if ($result['status'] == true) {
            return redirect()->route($this->model . ".index")->with(['success' => $result['message']]);
        }else{
            return redirect()->back()->with(['error' => 'Data Not Found']);
        }
    }

    public function prefix(Request $request, $enslug = null)
    {
        $prefix = $enslug;
        if ($request->isMethod('POST')) {
            $allData        =  $request->all();
            if (!empty($allData)) {
                if (!empty($allData['Setting'])) {
                    foreach ($allData['Setting'] as $key => $value) {
                        if (!empty($value["'id'"]) && !empty($value["'key'"])) {
                            if ($value["'type'"] == 'checkbox') {
                                $val  =  (isset($value["'value'"])) ? 1 : 0;
                            } else {
                                $val  =  (isset($value["'value'"])) ? $value["'value'"] : '';
                            }
                            Setting::where('id', $value["'id'"])->update(array(
                                'key'          =>  $value["'key'"],
                                'value'       =>  $val
                            ));
                        }
                    }
                }
            }
            $this->settingFileWrite();
            Session()->flash('flash_notice', 'Settings updated successfully.');
            return  Redirect()->back();
        }
        $result = Setting::where('key', 'like', $prefix . '%')->orderBy('id', 'ASC')->get()->toArray();
        return  View('admin.settings.prefix', compact('result', 'prefix'));
    }

    public function settingFileWrite()
    {
        $DB    =  Setting::query();
        $list  =  $DB->orderBy('key', 'ASC')->get(array('key', 'value'))->toArray();
        $file = Config('constants.SETTING_FILE_PATH');
        $settingfile = '<?php ' . "\n";
        $append_string    =  "";
        foreach ($list as $value) {
            $val      =   str_replace('"', "'", $value['value']);
            $settingfile .=  'config(["' . $value['key'] . '"=>"' . $val . '"]);' . "\n";
        }
        $bytes_written = File::put($file, $settingfile);
        if ($bytes_written === false) {
            die("Error writing to file");
        }
    }
}
