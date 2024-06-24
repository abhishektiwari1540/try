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
                            Add New </h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route($model . '.index') }}" class="text-muted">
                                    {{ Config('constants.INDIVIDUAL.INDIVIDUAL_TITLES') }}</a>
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
                                        {{ Config('constants.INDIVIDUAL.INDIVIDUAL_TITLE') }} Information
                                    </h3>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label><span class="text-danger"> *
                                                </span>
                                                <input type="text" name="first_name"
                                                    class="form-control form-control-solid form-control-lg  @error('first_name') is-invalid @enderror"
                                                    value="{{ old('first_name') }}">
                                                @if ($errors->has('first_name'))
                                                    <div class=" invalid-feedback">
                                                        {{ $errors->first('first_name') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label><span class="text-danger"> * </span>
                                                <input type="text" name="last_name"
                                                    class="form-control form-control-solid form-control-lg  @error('last_name') is-invalid @enderror"
                                                    value="{{ old('last_name') }}">
                                                @if ($errors->has('last_name'))
                                                    <div class=" invalid-feedback">
                                                        {{ $errors->first('last_name') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="username">Username</label><span class="text-danger"> * </span>
                                                <input type="text" name="username"
                                                    class="form-control form-control-solid form-control-lg  @error('username') is-invalid @enderror"
                                                    value="{{ old('username') }}">
                                                @if ($errors->has('username'))
                                                    <div class=" invalid-feedback">
                                                        {{ $errors->first('username') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="email">Email</label><span class="text-danger"> * </span>
                                                <input type="text" name="email"
                                                    class="form-control form-control-solid form-control-lg  @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}">
                                                @if ($errors->has('email'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Phone no</label><span class="text-danger"> </span><br>
                                                <input type="hidden" value="{{ old('phone_prefix') ?? +971 }}"
                                                    name="phone_prefix" class="phone_prefix">
                                                <input type="hidden" value="{{ old('phone_code') ?? 'ae' }}"
                                                    name="phone_code" class="phone_code">
                                                <input type="text" min="0" name="phone_number"
                                                    onkeypress="return /[0-9]/i.test(event.key)"
                                                    class="form-control form-control-solid form-control-lg phone_numbers"
                                                    value="{{ old('phone_number') }}">

                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="country">Country of Residence</label><span class="text-danger">
                                                    * </span>
                                                <select name="country" id="country"
                                                    class=" form-control form-control-solid form-control-lg chosenselect_designation_id @error('designation_id') is-invalid @enderror">
                                                    <option value="">select country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                            {{ $country->id == old('country') ? 'selected' : '' }}>
                                                            {{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('country'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('country') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="age">Age</label><span class="text-danger"> * </span>
                                                <select name="age" id="age"
                                                    class=" form-control form-control-solid form-control-lg chosenselect_designation_id @error('designation_id') is-invalid @enderror">
                                                    <option value="">select age</option>
                                                    @foreach ($ages as $age)
                                                        <option value="{{ $age->id }}"
                                                            {{ $age->id == old('age') ? 'selected' : '' }}>
                                                            {{ $age->code }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('age'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('age') }}
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
