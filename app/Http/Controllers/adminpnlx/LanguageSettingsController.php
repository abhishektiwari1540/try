<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Config;

use App\Models\LanguageSetting;
use App\Models\Language;

class LanguageSettingsController extends Controller
{
	public $model	=	'language-settings';
	public function __construct(Request $request)
	{	
		parent::__construct();
		View()->share('model', $this->model);
		$this->request = $request;
	}

	public function index(Request $request)
	{
		$DB								=	LanguageSetting::query();
		$searchVariable					=	array();
		$inputGet						=	$request->all();
		if (!empty($inputGet)) {
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

			if (isset($searchData['per_page'])) {
				unset($searchData['per_page']);
			}
			if (isset($searchData['word'])) {
				unset($searchData['word']);
				unset($searchData['word']);
			}
			foreach ($searchData as $fieldName => $fieldValue) {
				if (!empty($fieldValue)) {
					$DB->where("$fieldName", 'like', '%' . $fieldValue . '%');
					$searchVariable		=	array_merge($searchVariable, array($fieldName => $fieldValue));
				}
			}
		}
		$sortBy 						=	($request->input('sortBy')) ? $request->input('sortBy') : 'updated_at';
		$order  						=	($request->input('order')) ? $request->input('order')   : 'DESC';
		$records_per_page	=	($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
		$activeLanguages = $languages = Language::where('is_active', 1)->pluck('lang_code', 'lang_code');
		$result 						=	$DB
			->whereIn('locale', $activeLanguages)
			->orderBy($sortBy, $order)
			->paginate($records_per_page);
		$complete_string				=	$request->query();
		unset($complete_string["sortBy"]);
		unset($complete_string["order"]);
		$query_string					=	http_build_query($complete_string);
		$result->appends($inputGet)->render();
		return  View("admin.$this->model.index", compact('result', 'searchVariable', 'sortBy', 'order', 'query_string'));
	}

	public function create()
	{
		$languages = Language::where('is_active', 1)->get();
		$language_code = Config('constants.DEFAULT_LANGUAGE.LANGUAGE_CODE');
		return  View("admin.$this->model.add", compact('languages', 'language_code'));
	}

	public function store(Request $request)
	{
		$thisData	=	$request->all();
		$validated  = $request->validate([
			'default' => 'required|unique:language_settings,msgid'
		]);
		$msgid					=	$request->input('default');
		foreach ($thisData['language'] as $key => $val) {
			$obj	 			= 	new LanguageSetting;
			$obj->msgid    		=  trim($msgid);
			$obj->locale   		=  trim($key);
			$obj->msgstr   		=  empty($val) ? "" : $val;
			$obj->save();
		}
		$this->settingFileWrite();
		Session()->flash('success',  " New word added successfully");
		return Redirect()->route($this->model . '.index');
	}

	public function edit($id)
	{  
		
		$result		=	LanguageSetting::find($id);
		return  View("admin.$this->model.edit", compact('id','result'));
	}

	public function update1(Request $request)
	{   
		$id				=	$request->input('id');	
		$msgstr			=   $request->input('msgstr');
		$obj	 	 	=	LanguageSetting::find($id);
		$obj->msgstr   	= 	!empty($msgstr) ? addslashes($msgstr):'';
		$local 			=   $obj->locale;
		$obj->save();
		$this->settingFileWrite();
		Session()->flash('success', "Language word updated successfully");
		return Redirect()->route($this->model . ".index");
		
	}

	public function settingFileWrite(){ 
		$languages	=	Language::where('is_active', '=', '1')->get(array('folder_code','lang_code'));
		foreach($languages as $key => $val){
			$currLangArray	=	'<?php return array(';
			$list			=	LanguageSetting::where('locale',$val->lang_code)->select("msgid","msgstr")->get()->toArray();
			if(!empty($list)){
				foreach($list as $listDetails){
					$currLangArray	.=  '"'.$listDetails['msgid'].'"=>"'.$listDetails['msgstr'].'",'."\n";
				}
			}
			$currLangArray	.=	');';
			
			$file 			= 	Config('constants.ROOT')."/".'lang'."/".$val->lang_code."/".'messages.php';
			File::put($file, $currLangArray);
		}
	}
}
