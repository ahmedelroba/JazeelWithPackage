@extends('layouts.app')
@section('title', trans('backend.integration_system.update_user'))
@section('content-container')
@include('layouts.errors')

{!! Form::model($user, ['method' => 'PATCH','route' => ['integration_system.users.update', $user->id]]) !!}


<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.first_name') }}</label>
    <div class="col-10">
        {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Enter first name', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.last_name') }}</label>
    <div class="col-10">
        {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Enter last name', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.email') }}</label>
    <div class="col-10">
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.password') }}</label>
    <div class="col-10">
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter new password']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.country') }}</label>
    <div class="col-10">
        {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Enter country', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.city') }}</label>
    <div class="col-10">
        {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Enter city', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.phone') }}</label>
    <div class="col-10">
        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Enter phone', 'required' => 'required']) !!}
    </div>
</div>


<div class="form-group row">
    <div class="col-4">
        <div class="row alert alert-secondary">
            <label class="col-4 col-form-label">{{ trans('validation.attributes.active') }}</label>
            <div class="col-8">
                <span class="kt-switch kt-switch--primary">
                    <label>
                        {{ Form::checkbox('active') }}
                        <span></span>
                    </label>
                </span>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content-footer')
<div class="kt-form__actions">
    <button type="submit" class="btn btn-primary">{{ trans('backend.submit') }}</button>
    <a href="{{route('integration_system.users.index')}}"  class="btn btn-secondary">{{trans('backend.back')}}</a>
</div>
{!! Form::close() !!}
@endsection


