@extends('admin.layouts.layout')
@section('content')
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            {{ Config('constants.CMS_MANAGER.CMS_PAGE_TITLE') }} </h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route($modelName . '.index') }}" class="text-muted">
                                    {{ Config('constants.CMS_MANAGER.CMS_PAGES_TITLE') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @include('admin.elements.quick_links')
            </div>
        </div>
        <div class="d-flex flex-column-fluid">
            <div class=" container ">
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-bold nav-tabs-line-3x"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_apps_contacts_view_tab_1">
                                        <span class="nav-text">
                                            {{ Config('constants.CMS_MANAGER.CMS_PAGE_TITLE') }} Details
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="tab-content px-10">
                            <div class="tab-pane active" id="kt_apps_contacts_view_tab_1" role="tabpanel">
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">Page Name:</label>
                                    <div class="col-8">
                                        <span
                                            class="form-control-plaintext font-weight-bolder">{{ ucwords($CmsDetails->page_name ?? '') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">Page Title:</label>
                                    <div class="col-8">
                                        <span
                                            class="form-control-plaintext font-weight-bolder">{{ ucwords($CmsDetails->title ?? '') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">Page Description:</label>
                                    <div class="col-8">
                                        <span
                                            class="form-control-plaintext font-weight-bolder">{!! strip_tags($CmsDetails->body) !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
