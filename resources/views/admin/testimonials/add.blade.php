@extends('admin.layouts.layout')
@section('content')
    <style>
        .invalid-feedback {
            display: inline;
        }
    </style>
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            Add New {{ Config('constants.TESTIMONIALS.TESTIMONIALS_TITLE') }}</h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route($model . '.index') }}" class="text-muted">
                                    {{ Config('constants.TESTIMONIALS.TESTIMONIALS_TITLE') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @include('admin.elements.quick_links')
            </div>
        </div>
        <div class="d-flex flex-column-fluid">
            <div class=" container ">
                <form action="{{ route($model . '.store') }}" method="post" class="mws-form" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-1"></div>
                                <div class="col-xl-10">
                                    <h3 class="mb-10 font-weight-bold text-dark">
                                        {{ Config('constants.TESTIMONIALS.TESTIMONIALS_TITLE') }} Information
                                    </h3>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="first_name">Name</label><span class="text-danger"> * </span>
                                                <input type="text" name="title"
                                                    class="form-control form-control-solid form-control-lg  @error('title') is-invalid @enderror"
                                                    value="{{ old('title') }}">
                                                @if ($errors->has('title'))
                                                    <div class=" invalid-feedback">
                                                        {{ $errors->first('title') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label for="email">Comment</label><span class="text-danger"> * </span>
                                                <textarea class="ckeditor form-control" name="description" value="{{ old('description') }}"></textarea>
                                                @if ($errors->has('description'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('description') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>



                                    </div>
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div>
                                            <button button type="submit"
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                Submit
                                            </button>
                                        </div>
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
