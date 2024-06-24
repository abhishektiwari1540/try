<?php

namespace App\Services\Admin;

use App\Models\Security;
use App\Models\Lookup;
use Illuminate\Http\Request;
use App\Http\Requests\admin\CmsPageRequest;
use App\Models\Setting;
use App\Models\Cms;
use App\Models\language;
use Illuminate\Support\Str;
use App\Models\CmsDescription;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use App\Traits\ImageUpload;
use App\Models\Faq;
// use App\Models\Language;
use Redirect, Session, Config;

class CmsService
{
    public $sectionNamePlural = 'Cms Pages';
    public $sectionNameSingular = 'Cms Page';

    public function __construct(Request $request)
    {
        View()->share('sectionNamePlural', $this->sectionNamePlural);
        View()->share('sectionNameSingular', $this->sectionNameSingular);
        $this->request = $request;
    }

    use ImageUpload;

    public function security()
    {
        return Security::leftJoin('security_description', 'security.id', '=', 'security_description.parent_id')
            ->where('security_description.language_id', currentLanguageId())
            ->select('security_description.title', 'security_description.description', 'security.image')
            ->get();
    }

    public function lookups($name = '')
    {
        return Lookup::leftJoin('lookup_discriptions', 'lookups.id', '=', 'lookup_discriptions.parent_id')
            ->where('lookup_discriptions.language_id', currentLanguageId())
            ->where('lookups.lookup_type', $name)
            ->where('lookups.is_active', 1)
            ->select('lookup_discriptions.code', 'lookups.id')
            ->get();
    }

    public function helpSupport()
    {
        return Faq::leftJoin('faq_descriptions', 'faqs.id', '=', 'faq_descriptions.parent_id')
            ->where('faq_descriptions.language_id', currentLanguageId())
            ->select('faq_descriptions.question', 'faq_descriptions.answer')
            ->get();
    }

    public function languages()
    {
        return Language::where('is_active', 1)->get();
    }

    public function store(CmsPageRequest $request)
    {
        try {
            $obj = new Cms;
            $obj->page_name = $request->input('page_name');
            $obj->title = $request->input('title');
            $obj->sub_title = $request->input('sub_title');
            $obj->slug = Str::slug($request->input('page_name'), "-");
            $obj->body = $request->input('body');
            $obj->image = $this->upload($request, 'image', config('constants.CMS_PAGE_IMAGE_ROOT_PATH'));
            $obj->save();

            return ['status' => true, 'message' => $this->sectionNameSingular . ' has been added successfully'];
        } catch (\Throwable $th) {
            \Log::error('Error occurred while storing user: ' . $th->getMessage());

            return ['status' => false, 'message' => 'Something went wrong. Please try again. ' . $th->getMessage()];
        }
    }

    public function update(CmsPageRequest $request, $enuserid)
    {
        $modelId = base64_decode($enuserid);

        try {
            $obj = Cms::findOrFail($modelId);
            $obj->page_name = $request->input('page_name');
            $obj->title = $request->input('title');
            $obj->sub_title = $request->input('sub_title') ?? '';
            $obj->slug = Str::slug($request->input('page_name'), "-");
            $obj->body = $request->input('body');
            $obj->short_description = $request->input('short_description');
            $obj->button_title = $request->input('button_title') ?? '';
            $obj->button_link = $request->input('button_link') ?? '';

            if ($request->hasFile('image')) {
                if ($obj->image) {
                    $path = parse_url($obj->image, PHP_URL_PATH);
                    $oldPath = Str::after($path, 'cms-page');
                    $obj->image = $this->upload($request, 'image', Config('constants.CMS_PAGE_IMAGE_ROOT_PATH'), $oldPath);
                } else {
                    $obj->image = $this->upload($request, 'image', Config('constants.CMS_PAGE_IMAGE_ROOT_PATH'));
                }
            }

            if ($request->hasFile('bg_image')) {
                if ($obj->bg_image) {
                    $path2 = parse_url($obj->bg_image, PHP_URL_PATH);
                    $oldPath2 = Str::after($path2, 'cms-page');
                    $obj->bg_image = $this->upload($request, 'bg_image', Config('constants.CMS_PAGE_IMAGE_ROOT_PATH'), $oldPath2);
                } else {
                    $obj->bg_image = $this->upload($request, 'bg_image', Config('constants.CMS_PAGE_IMAGE_ROOT_PATH'));
                }
            }

            $obj->save();

            return ['status' => true, 'message' => $this->sectionNameSingular . ' has been updated successfully'];
        } catch (\Throwable $th) {
            \Log::error('Error occurred while updating user: ' . $th->getMessage());

            return ['status' => false, 'message' => 'Something went wrong. Please try again. ' . $th->getMessage()];
        }
    }

    public function edit(Request $request, $encmsid = null)
    {
        if ($encmsid === null) {
            return ['status' => false, 'message' => 'User ID is empty. Please provide a valid user ID.'];
        }

        $modelId = base64_decode($encmsid);

        try {
            $modelDetails = Cms::findOrFail($modelId);
            $languages = Language::where('is_active', 1)->get();
            $language_code = Config('constants.DEFAULT_LANGUAGE.LANGUAGE_CODE');

            $data = [
                'languages' => $languages,
                'language_code' => $language_code,
                'modelDetails' => $modelDetails
            ];

            return ['status' => true, 'data' => $data];
        } catch (\Throwable $th) {
            \Log::error('Error occurred while retrieving user details: ' . $th->getMessage());

            return ['status' => false, 'message' => 'Something went wrong. Please try again. ' . $th->getMessage()];
        }
    }

    public function banner_data(Request $request)
    {
        $query = Cms::where('slug', 'banner')->where('laguage_id', GetLanguageId());
        $data = $query->first();
        // dd($data);
        return $data;

    }

    public function welcome_page(Request $request)
    {
        $data = Cms::where('slug', 'welcome')->where('laguage_id',GetLanguageId())->first();
        return ['data' => $data];
    }

    public function Philosophy_home(Request $request)
    {
        // $data_language = Session::get('lang_id');
        $data = Cms::where('slug', 'our-philosophy')->where('laguage_id',GetLanguageId())->first();
        return ['data' => $data];
    }

    public function contact(Request $request)
    {
        $data = Cms::where('id', 15)->first();
        return $data;
    }

    public function Events_page(Request $request)
    {
        $data = Cms::where('id', 14)->first();
        return $data;
    }

    public function privacy_policy(Request $request)
    {
        $data = Cms::where('id', 16)->first();
        return $data;
    }

    public function Term_Conditions(Request $request)
    {
        $data = Cms::where('id', 4)->first();
        return $data;
    }

    public function about_page(Request $request)
    {
        $data = Cms::where('id', 11)->first();
        return $data;
    }

    public function Testimonials(Request $request)
    {
        // $data_language = Session::get('lang_id');
        $data = Cms::where('slug', 'testimonials')->where('laguage_id',GetLanguageId())->first();
        return $data;
    }

    public function welcome_page_title(Request $request)
    {
        // $data_language = Session::get('lang_id');
        $data = Cms::where('slug', 'welcome-title')->where('laguage_id',GetLanguageId())->first();
        return $data;
    }
    public function about_author(Request $request){
        $data = Cms::where('id',21)->first();
        return $data;
    }

    public function lagauage_data(Request $request){
        $data = language::all();
        return $data;
    }
}
