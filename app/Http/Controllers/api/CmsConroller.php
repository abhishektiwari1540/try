<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CmsService;

class CmsConroller extends Controller
{
    public $cms;
    public function __construct(Request $request){  
        parent::__construct();
        $this->cms  = new CmsService();
    }

    public function securityInfo() {
        $response                            =   array();
        $response["status"]                  =   "success";
        $response["msg"]                     =   "";
        $response["data"]                    =   $this->cms->security();
        $response["business_category"]       =   $this->cms->lookups('business-category');
        return json_encode($response, 200);
    }

    public function socialSetting() {
        $response                            =   array();
        $response["status"]                  =   "success";
        $response["msg"]                     =   "";
        $response['data']["youtube"]         =   config('Social.YouTube');
        $response['data']["instagram"]       =   config('Social.instagram');
        $response['data']["facebook"]        =   config('Social.facebook');
        $response['data']["linkedin"]        =   config('Social.linkedin');
        $response['data']["app_version"]     =   config('Social.appVersion');
        $response['data']["ios_version"]     =   config('Social.IosVersion');
        $response['data']["help_support"]    =   $this->cms->helpSupport();
        $response['data']["languages"]       =   $this->cms->languages();
        return json_encode($response, 200);
    }
}
