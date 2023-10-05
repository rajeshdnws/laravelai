
@extends('backend.layouts.master')

@section('title')
Company Create - Manage Account
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Company Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.company.index') }}">All Company</a></li>
                    <li><span>Create Company</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create New Company</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.company.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">Company Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Company Email">
                            </div>
                        </div>
						 <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Owner Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="business">Select Category</label>
								 <select name="business" id="business" class="form-control">
								       <option>Select with Possible Business Categories</option>
                                        <option value="Technology">Technology</option>
										<option value="Healthcare">Healthcare</option>
										<option value="Finance">Finance</option>
										<option value="Retail">Retail</option>
										<option value="Education">Education</option>
										<option value="Entertainment">Entertainment</option>										
										 <option value="Real Estate">Real Estate</option>
										<option value="Travel and Tourism">Travel and Tourism</option>
										<option value="Automotive">Automotive</option>
										<option value="Hospitality">Hospitality</option>
										<option value="Food and Beverage">Food and Beverage</option>
										<option value="Marketing and Advertising">Marketing and Advertising</option>									
										<option value="Manufacturing">Manufacturing</option>
										<option value="Legal">Legal</option>
										<option value="Non-Profit">Non-Profit</option>
										<option value="Sports and Fitness">Sports and Fitness</option>
										<option value="Government and Public Services">Government and Public Services</option>
										<option value="Fashion">Fashion</option>
										<option value="Beauty and Personal Care">Beauty and Personal Care</option>

                                </select>
                            </div>
                        </div>
						     <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="model_description">Model Description</label>
                                <input type="text" class="form-control" id="model_description" name="model_description" placeholder="Enter Model Description">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="project">Initial Project Based Information</label>
                                <input type="text" class="form-control" id="project" name="project" placeholder="Enter Project Information">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password">Assign Roles</label>
                                <select name="roles[]" id="roles" class="form-control select2" multiple>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save User</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection