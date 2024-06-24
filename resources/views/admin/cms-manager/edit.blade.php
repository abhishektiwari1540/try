<?php $i = 1; ?>
@extends('admin.layouts.layout')
@section('content')
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            {{ Config('constants.CMS_MANAGER.CMS_PAGES_TITLE') }} Edit </h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route($modelName . '.index') }}" class="text-muted"> {{ $sectionNamePlural }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @include('admin.elements.quick_links')
            </div>
        </div>


        <div class="d-flex flex-column-fluid">
            <div class="container">
                <form action="{{ route($modelName . '.update', base64_encode($modelDetails->id)) }}" method="POST"
                    class="mws-form" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{ $modelDetails->slug }}">
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <h3 class="font-weight-bold text-dark">
                                        {{ $sectionNameSingular }} Information
                                    </h3>
                                    <div class="row mt-5">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label name="page_name">Page Name</label> <span class="text-danger"> *
                                                </span>
                                                <input type="text" name="page_name"
                                                    class="form-control form-control-solid form-control-lg  @error('page_name') is-invalid @enderror"
                                                    value="{{ old('page_name') ?? $modelDetails->page_name }}">
                                                @if ($errors->has('page_name'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('page_name') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mt-3">
                                            <div class="form-group">
                                                <label name="title">
                                                    @if ($modelDetails->slug == 'welcome-page')
                                                        First title
                                                    @elseif ($modelDetails->slug == 'about-author')
                                                        Author Name
                                                    @else
                                                        Title
                                                    @endif

                                                </label> <span class="text-danger"> * </span>
                                                <input type="text" name="title"
                                                    class="form-control form-control-solid form-control-lg  @error('title') is-invalid @enderror"
                                                    value="{{ old('title') ?? $modelDetails->title }}">
                                                @if ($errors->has('title'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('title') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        @if ($modelDetails->slug == 'about-author')
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="sub_title">Designation</label> <span class="text-danger"> *
                                                    </span>
                                                    <input type="text" name="sub_title"
                                                        class="form-control form-control-solid form-control-lg  @error('sub_title') is-invalid @enderror"
                                                        value="{{ old('sub_title') ?? $modelDetails->sub_title }}">
                                                    @if ($errors->has('sub_title'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('sub_title') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 col-xl-6">
                                                <div class="form-group">
                                                    <label name="short_description">Company Name</label> <span class="text-danger"> *
                                                    </span>
                                                    <input type="text" name="short_description"
                                                        class="form-control form-control-solid form-control-lg  @error('short_description') is-invalid @enderror"
                                                        value="{{ old('short_description') ?? $modelDetails->short_description }}">
                                                    @if ($errors->has('short_description'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('short_description') }}
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>

                                        @endif
                                        @if ($modelDetails->slug == 'events-page')
                                        @endif
                                        @if ($modelDetails->slug == 'banner')
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="sub_title">Sub Title</label> <span class="text-danger"> *
                                                    </span>
                                                    <input type="text" name="sub_title"
                                                        class="form-control form-control-solid form-control-lg  @error('sub_title') is-invalid @enderror"
                                                        value="{{ old('sub_title') ?? $modelDetails->sub_title }}">
                                                    @if ($errors->has('sub_title'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('sub_title') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif

                                        @if ($modelDetails->slug == 'our-philosophy')
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label name="image"> Image </label><span class="text-danger"> </span>
                                                    <input type="file" name="image"
                                                        class="form-control form-control-solid form-control-lg  @error('image') is-invalid @enderror"
                                                        accept="image/*">
                                                    @if ($errors->has('image'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('image') }}
                                                        </div>
                                                    @endif
                                                    @if ($errors->has('Frist_image'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('Frist_image') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                @if (!empty($modelDetails->image))
                                                    <a class="fancybox-buttons" data-fancybox-group="button"
                                                        href="{{ $modelDetails->image }}">
                                                        <img height="50" width="50"
                                                            src="{{ asset($modelDetails->image) }}" />

                                                    </a>
                                                @endif
                                            </div>
                                        @endif

                                        @if ($modelDetails->slug == 'term-conditions')
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label name="image"> Image </label><span class="text-danger"> </span>
                                                    <input type="file" name="image"
                                                        class="form-control form-control-solid form-control-lg  @error('image') is-invalid @enderror"
                                                        accept="image/*">
                                                    @if ($errors->has('image'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('image') }}
                                                        </div>
                                                    @endif
                                                    @if ($errors->has('Frist_image'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('Frist_image') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                @if (!empty($modelDetails->image))
                                                    <a class="fancybox-buttons" data-fancybox-group="button"
                                                        href="{{ $modelDetails->image }}">
                                                        <img height="50" width="50"
                                                            src="{{ asset($modelDetails->image) }}" />

                                                    </a>
                                                @endif
                                            </div>
                                        @endif

                                        @if ($modelDetails->slug == 'banner')
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label name="image"> Image </label><span class="text-danger">
                                                    </span>
                                                    <input type="file" name="image"
                                                        class="form-control form-control-solid form-control-lg  @error('image') is-invalid @enderror"
                                                        accept="image/*">
                                                    @if ($errors->has('image'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('image') }}
                                                        </div>
                                                    @endif
                                                    @if ($errors->has('Frist_image'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('Frist_image') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                @if (!empty($modelDetails->image))
                                                    <a class="fancybox-buttons" data-fancybox-group="button"
                                                        href="{{ $modelDetails->image }}">
                                                        <img height="50" width="50"
                                                            src="{{ asset($modelDetails->image) }}" />

                                                    </a>
                                                @endif
                                            </div>
                                        @endif


                                        @if ($modelDetails->slug == 'about-author')
                                            {{-- <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label name="image"> Image </label><span class="text-danger">
                                                    </span>
                                                    <input type="file" name="image"
                                                        class="form-control form-control-solid form-control-lg  @error('image') is-invalid @enderror"
                                                        accept="image/*">
                                                    @if ($errors->has('image'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('image') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                @if (!empty($modelDetails->image))
                                                    <a class="fancybox-buttons" data-fancybox-group="button"
                                                        href="{{ $modelDetails->image }}">
                                                        <img height="50" width="50"
                                                            src="{{ asset($modelDetails->image) }}" />

                                                    </a>
                                                @endif
                                            </div> --}}



                                        @endif

                                        @if ($modelDetails->slug == 'welcome')
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label name="image"> Image </label><span class="text-danger">
                                                    </span>
                                                    <input type="file" name="image"
                                                        class="form-control form-control-solid form-control-lg  @error('image') is-invalid @enderror"
                                                        accept="image/*">
                                                    @if ($errors->has('image'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('image') }}
                                                        </div>
                                                    @endif
                                                    @if ($errors->has('Frist_image'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('Frist_image') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                @if (!empty($modelDetails->image))
                                                    <a class="fancybox-buttons" data-fancybox-group="button"
                                                        href="{{ $modelDetails->image }}">
                                                        <img height="50" width="50"
                                                            src="{{ asset($modelDetails->image) }}" />

                                                    </a>
                                                @endif
                                            </div>
                                        @endif


                                        @if ($modelDetails->slug == 'welcome-page')
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="second_title">
                                                        @if ($modelDetails->slug == 'welcome-page')
                                                            Second title
                                                        @else
                                                            Title
                                                        @endif
                                                    </label> <span class="text-danger"> * </span>
                                                    <input type="text" name="second_title"
                                                        class="form-control form-control-solid form-control-lg  @error('second_title') is-invalid @enderror"
                                                        value="{{ old('second_title') ?? $modelDetails->title }}">
                                                    @if ($errors->has('second_title'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('second_title') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label name="image">
                                                        @if ($modelDetails->slug == 'welcome-page')
                                                            Second Image
                                                        @else
                                                            Image
                                                        @endif
                                                    </label><span class="text-danger"> </span>
                                                    <input type="file" name="second_image"
                                                        class="form-control form-control-solid form-control-lg  @error('second_image') is-invalid @enderror"
                                                        accept="image/*">
                                                    @if ($errors->has('second_image'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('second_image') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                @if (!empty($modelDetails->image))
                                                    <a class="fancybox-buttons" data-fancybox-group="button"
                                                        href="{{ $modelDetails->image }}">
                                                        <img height="50" width="50"
                                                            src="{{ asset($modelDetails->image) }}" />

                                                    </a>
                                                @endif
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="first_name">Second Description</label><span
                                                        class="text-danger"> * </span>
                                                    <textarea name="second_des"
                                                        class="form-control form-control-solid form-control-lg ckeditor @error('second_des') is-invalid @enderror"
                                                        value="{{ old('second_des') }}"></textarea>
                                                    @if ($errors->has('second_des'))
                                                        <div class=" invalid-feedback">
                                                            {{ $errors->first('second_des') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="first_name">Frist Description</label><span
                                                        class="text-danger"> * </span>
                                                    <textarea name="frist_des"
                                                        class="form-control form-control-solid form-control-lg ckeditor @error('frist_des') is-invalid @enderror"
                                                        value="{{ old('frist_des') }}"></textarea>
                                                    @if ($errors->has('frist_des'))
                                                        <div class=" invalid-feedback">
                                                            {{ $errors->first('frist_des') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif





                                        @if ($modelDetails->slug == 'banner')


                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="button_title">Button Text</label> <span
                                                        class="text-danger"> * </span>
                                                    <input type="text" name="button_title"
                                                        class="form-control form-control-solid form-control-lg  @error('button_title') is-invalid @enderror"
                                                        value="{{ old('button_title') ?? $modelDetails->button_title }}">
                                                    @if ($errors->has('button_title'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('button_title') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="button_link">Button Link</label> <span
                                                        class="text-danger"> * </span>
                                                    <input type="text" name="button_link"
                                                        class="form-control form-control-solid form-control-lg  @error('button_link') is-invalid @enderror"
                                                        value="{{ old('button_link') ?? $modelDetails->button_link }}">
                                                    @if ($errors->has('button_link'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('button_link') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                        @if ($modelDetails->slug == 'about-page')
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="button_title">Button Text</label> <span
                                                        class="text-danger"> * </span>
                                                    <input type="text" name="button_title"
                                                        class="form-control form-control-solid form-control-lg  @error('button_title') is-invalid @enderror"
                                                        value="{{ old('button_title') ?? $modelDetails->button_title }}">
                                                    @if ($errors->has('button_title'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('button_title') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="button_link">Button Link</label> <span
                                                        class="text-danger"> * </span>
                                                    <input type="text" name="button_link"
                                                        class="form-control form-control-solid form-control-lg  @error('button_link') is-invalid @enderror"
                                                        value="{{ old('button_link') ?? $modelDetails->button_link }}">
                                                    @if ($errors->has('button_link'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('button_link') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif

                                        @if ($modelDetails->slug == 'welcome-title')
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="button_title">Button Text</label> <span
                                                        class="text-danger"> * </span>
                                                    <input type="text" name="button_title"
                                                        class="form-control form-control-solid form-control-lg  @error('button_title') is-invalid @enderror"
                                                        value="{{ old('button_title') ?? $modelDetails->button_title }}">
                                                    @if ($errors->has('button_title'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('button_title') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mt-3">
                                                <div class="form-group">
                                                    <label name="button_link">Button Link</label> <span
                                                        class="text-danger"> * </span>
                                                    <input type="text" name="button_link"
                                                        class="form-control form-control-solid form-control-lg  @error('button_link') is-invalid @enderror"
                                                        value="{{ old('button_link') ?? $modelDetails->button_link }}">
                                                    @if ($errors->has('button_link'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('button_link') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-custom gutter-b">
                        @if ($modelDetails->slug != 'banner')
                            <div class="card-header card-header-tabs-line" style="">
                                <div class="card-toolbar border-top">
                                    <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                        @if (!empty($languages))
                                            <?php $i = 1; ?>
                                            @foreach ($languages as $language)
                                                <li class="nav-item">
                                                    <a class="nav-link {{ $i == $language_code ? 'active' : '' }}"
                                                        data-toggle="tab" href="#{{ $language->title }}">
                                                        <span class="symbol symbol-20 mr-3">
                                                            <img src="{{ url(Config::get('constants.LANGUAGE_IMAGE_PATH') . $language->image) }}"
                                                                alt="">
                                                        </span>
                                                        <span class="nav-text">{{ $language->title }}</span>
                                                    </a>
                                                </li>
                                                <?php $i++; ?>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="card-body">
                            @if ($modelDetails->slug != 'banner')
                                <div class="tab-content" style="">
                                    @if (!empty($languages))
                                        <?php $i = 1; ?>
                                        @foreach ($languages as $language)
                                            <div class="tab-pane fade {{ $i == $language_code ? 'show active' : '' }}"
                                                id="{{ $language->title }}" role="tabpanel"
                                                aria-labelledby="{{ $language->title }}">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="form-group">
                                                                    @if ($i == 1)
                                                                        <label for="{{ $language->id }}.title">
                                                                            @if ($modelDetails->slug == 'about-author')
                                                                                Author Name
                                                                            @else
                                                                                Page Title
                                                                            @endif

                                                                        </label><span class="text-danger"> *
                                                                        </span>
                                                                        <input type="text" name="title"
                                                                            class="form-control form-control-solid form-control-lg @error('title') is-invalid @enderror"
                                                                            value="{{ old('title') ?? $modelDetails->title }}">
                                                                        @if ($errors->has('title'))
                                                                            <div class="invalid-feedback">
                                                                                {{ $errors->first('title') }}
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        <label for="{{ $language->id }}.title">Page
                                                                            Title</label><span class="text-danger"> </span>
                                                                        <input type="text"
                                                                            name="data[{{ $language->id }}][title]"
                                                                            class="form-control form-control-solid form-control-lg"
                                                                            value="{{ $multiLanguage[$language->id]['title'] ?? old('title') }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @if ($modelDetails->slug == 'term-conditions')
                                                                <div class="col-xl-12">
                                                                    <div class="form-group">
                                                                        <div
                                                                            id="kt-ckeditor-1-toolbar{{ $language->id }}">
                                                                        </div>
                                                                        @if ($i == 1)
                                                                            <label>Short Description </label><span
                                                                                class="text-danger"> * </span>
                                                                            <textarea id="short_description_{{ $language->id }}" name="short_description"
                                                                                class="form-control form-control-solid form-control-lg  @error('short_description') is-invalid @enderror">
                                                                       {{ old('short_description') ?? $modelDetails->short_description }} </textarea>
                                                                            @if ($errors->has('short_description'))
                                                                                <div
                                                                                    class="alert invalid-feedback admin_login_alert">
                                                                                    {{ $errors->first('short_description') }}
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                            <label>Short Description </label>
                                                                            <textarea name="data[{{ $language->id }}][short_description]" id="short_description_{{ $language->id }}"
                                                                                class="form-control form-control-solid form-control-lg">{{ $multiLanguage[$language->id]['short_description'] ?? old('short_description') }}</textarea>
                                                                        @endif
                                                                    </div>
                                                                    <script src="{{ asset('/js/ckeditor/ckeditor.js') }}"></script>
                                                                    <script>
                                                                        CKEDITOR.replace(<?php echo 'short_description_' . $language->id; ?>, {
                                                                            filebrowserUploadUrl: '<?php echo URL()->to('base/uploder'); ?>',
                                                                            removeButtons: 'New Page,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteWord,Save,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Form,Checkbox,RadioButton,HiddenField,Strike,Subscript,Superscript,Language,Link,Unlink,Anchor,ShowBlocks',
                                                                            enterMode: CKEDITOR.ENTER_BR
                                                                        });
                                                                        CKEDITOR.config.allowedContent = true;
                                                                        CKEDITOR.config.removePlugins = 'scayt';
                                                                    </script>
                                                                </div>
                                                            @endif



                                                            <div class="col-xl-12">
                                                                <div class="form-group">
                                                                    <div id="kt-ckeditor-1-toolbar{{ $language->id }}">
                                                                    </div>
                                                                    @if ($i == 1)
                                                                        <label>Description </label><span
                                                                            class="text-danger"> * </span>
                                                                        <textarea id="body_{{ $language->id }}" name="body"
                                                                            class="form-control form-control-solid form-control-lg  @error('body') is-invalid @enderror">
                                                                       {{ old('body') ?? $modelDetails->body }} </textarea>
                                                                        @if ($errors->has('body'))
                                                                            <div
                                                                                class="alert invalid-feedback admin_login_alert">
                                                                                {{ $errors->first('body') }}
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        <label>Description </label>
                                                                        <textarea name="data[{{ $language->id }}][body]" id="body_{{ $language->id }}"
                                                                            class="form-control form-control-solid form-control-lg">{{ $multiLanguage[$language->id]['body'] ?? old('body') }}</textarea>
                                                                    @endif
                                                                </div>
                                                                <script src="{{ asset('/js/ckeditor/ckeditor.js') }}"></script>
                                                                <script>
                                                                    CKEDITOR.replace(<?php echo 'body_' . $language->id; ?>, {
                                                                        filebrowserUploadUrl: '<?php echo URL()->to('base/uploder'); ?>',
                                                                        removeButtons: 'New Page,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteWord,Save,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Form,Checkbox,RadioButton,HiddenField,Strike,Subscript,Superscript,Language,Link,Unlink,Anchor,ShowBlocks',
                                                                        enterMode: CKEDITOR.ENTER_BR
                                                                    });
                                                                    CKEDITOR.config.allowedContent = true;
                                                                    CKEDITOR.config.removePlugins = 'scayt';
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $i++; ?>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                            <div class="d-flex justify-content-between border-top mt-2 pt-5">
                                <button button type="submit"
                                    class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
