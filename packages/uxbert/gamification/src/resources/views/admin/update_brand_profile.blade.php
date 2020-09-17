@extends('layouts.app')
@section('title', trans('backend.integration_system.update_brand_profile'))
@section('content-container')


@include('layouts.errors')

{!! Form::model($brand, ['method' => 'PATCH','route' => ['integration_system.update_brand_profile']]) !!}

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.name') }}</label>
    <div class="col-10">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter brand name', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.description') }}</label>
    <div class="col-10">
        {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Enter brand description', 'required'=>'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.url') }}</label>
    <div class="col-10">
        {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Enter brand url', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.username') }}</label>
    <div class="col-10">
        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Enter Fullname of brand\'s administrator', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.job_title') }}</label>
    <div class="col-10">
        {!! Form::text('job_title', null, ['class' => 'form-control', 'placeholder' => 'Enter Job title of brand\'s administrator.', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.phone') }}</label>
    <div class="col-10">
        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Enter Brand\'s offical phone but must be starting by 05.', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.email') }}</label>
    <div class="col-10">
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Brand\'s email address for login by it in jazeel admin panel.', 'required' => 'required', 'disabled' => 'disabled']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.password') }}</label>
    <div class="col-10">
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter password']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.confirm_password') }}</label>
    <div class="col-10">
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Enter confirm password']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.industry') }}</label>
    <div class="col-10">
        {!! Form::text('industry', null, ['class' => 'form-control', 'placeholder' => 'Enter Brand\'s industry.', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('backend.country') }}</label>
    <div class="col-10">
        {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Enter Brand\'s country.', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('backend.city') }}</label>
    <div class="col-10">
        {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Enter Brand\'s city', 'required' => 'required']) !!}
    </div>
</div>


@endsection

@section('content-footer')
<div class="kt-form__actions">
    <button type="submit" class="btn btn-primary">{{ trans('backend.submit') }}</button>
    <a href="{{redirect()->back()}}"  class="btn btn-secondary">{{trans('backend.back')}}</a>
</div>
{!! Form::close() !!}
@endsection


