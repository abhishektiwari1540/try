@extends('admin.layouts.layout')

@section('content')
    <style>
        .invalid-feedback {
            display: inline;
        }
    </style>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5"> {{ Config('constants.CLASS.CLASS') }} Edit</h5>

                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route($model . '.index') }}"
                                    class="text-muted">{{ Config('constants.CLASS.CLASS') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @include('admin.elements.quick_links')
            </div>
        </div>
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <form action="{{ route($model . '.update', base64_encode($userDetails->id)) }}" method="post"
                    class="mws-form" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-1"></div>
                                <div class="col-xl-10">
                                    <h3 class="mb-10 font-weight-bold text-dark">
                                        {{ Config('constants.CLASS.CLASS') }} Information
                                    </h3>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="title">Title</label><span class="text-danger"> * </span>
                                                <input type="text" name="title" value="{{ $userDetails->name }}"
                                                    class="form-control form-control-solid form-control-lg @error('title') is-invalid @enderror">
                                                @error('title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="image">Image</label><span class="text-danger"> * </span>
                                                <input type="file" name="image"
                                                    class="form-control form-control-solid form-control-lg @error('image') is-invalid @enderror">
                                                @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                                <a class="fancybox-buttons" data-fancybox-group="button"
                                                    href="{{ $userDetails->image }}">
                                                    <img height="50" width="50"
                                                        src="{{ asset($userDetails->image) }}" />

                                                </a>
                                                {{-- <img src="{{ asset($userDetails->image) }}" width="100px" alt=""> --}}
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="last_name">Contact Us Section One Title</label><span
                                                    class="text-danger"> * </span>
                                                <input type="text" value="{{ $userDetails->name_contact_us_frist }}"
                                                    name="contact_us_one_title"
                                                    class="form-control form-control-solid form-control-lg  @error('contact_us_one_title') is-invalid @enderror"
                                                    value="{{ old('contact_us_one_title') }}">
                                                @if ($errors->has('contact_us_one_title'))
                                                    <div class=" invalid-feedback">
                                                        {{ $errors->first('contact_us_one_title') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="last_name">Contact Us Section Two Title</label><span
                                                    class="text-danger"> * </span>
                                                <input type="text" value="{{ $userDetails->name_contact_us_second }}"
                                                    name="contact_us_two_title"
                                                    class="form-control form-control-solid form-control-lg  @error('contact_us_two_title') is-invalid @enderror"
                                                    value="{{ old('contact_us_two_title') }}">
                                                @if ($errors->has('contact_us_two_title'))
                                                    <div class=" invalid-feedback">
                                                        {{ $errors->first('contact_us_two_title') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label for="description">Short Description</label>
                                                <textarea class="ckeditor form-control" name="short_description">{{ old('short_description', $userDetails->short_description) }}</textarea>
                                                @error('short_description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label for="description">Description</label><span class="text-danger"> *
                                                </span>
                                                <textarea class="ckeditor form-control" name="description">{{ old('description', $userDetails->descriptions) }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <button type="submit"
                                            class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                            UPDATE
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
