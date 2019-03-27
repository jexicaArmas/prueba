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
                <h3 class="title-5 m-b-35">{{ __('Create Companies') }}</h3>
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
                <form  method="POST" action="{{route ('companies.store') }}" class="form-horizontal">
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
                      <label for="email" class=" form-control-label">{{ __('Email') }}</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="email" name="email" placeholder="Enter Email..." class="form-control">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col col-md-3">
                      <label for="logo" class=" form-control-label">{{ __('Logo') }}</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="logo" name="logo" placeholder="Enter Logo..." class="form-control">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col col-md-3">
                      <label for="website" class=" form-control-label">{{ __('Website') }}</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="website" name="phone" placeholder="Enter Website..." class="form-control">
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