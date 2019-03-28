@extends('layouts.master')
@extends('layouts.menu')

@section('content')
<!-- PAGE CONTAINER-->
<div class="main-content">
    <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="row"> 
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="title-5 m-b-35">{{ __('Create Employees') }}</h3>
              </div>           
              <div class="card-body card-block">
                @if (count($errors) > 0)
                  <div class="alert alert-danger" role="alert">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <form  method="POST" action="{{route ('employees.store') }}" class="form-horizontal" enctype="multipart/form-data">
                  {!! csrf_field() !!}  
                  <div class="row form-group">
                    <div class="col col-md-3">
                      <label for="name" class=" form-control-label">{{ __('Name') }}</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="name" name="name" placeholder="Enter Name..." class="form-control">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col col-md-3">
                      <label for="lastname" class=" form-control-label">{{ __('Lastname') }}</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="lastname" name="lastname" placeholder="Enter Lastname..." class="form-control">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col col-md-3">
                      <label for="email" class=" form-control-label">{{ __('Email') }}</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="email" name="email" placeholder="Enter Email..." class="form-control">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col col-md-3">
                      <label for="phone" class=" form-control-label">{{ __('Phone') }}</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="phone" name="phone" placeholder="Enter Phone..." class="form-control">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">{{__('Company')}}</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <select name="company" id="company" class="form-control">
                        @foreach($companies as $company)
                          <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>            
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm form-control">
                      {{ __('Save') }}
                    </button>
                  </div>
                </form>
              </div>
          </div>      
        </div>
      </div>
    </div>
  </div>
@endsection