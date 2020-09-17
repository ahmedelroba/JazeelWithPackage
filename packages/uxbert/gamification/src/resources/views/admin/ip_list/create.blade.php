@extends('layouts.app')

@section('title', trans('backend.create_new_ip'))

@section('content-container')
@include('layouts.errors')

{!! Form::open(['route'=>['integration_system.ip_list.store'], 'method'=>'POST', 'class'=>'kt-form', 'novalidate' => 'novalidate']) !!}

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.name') }}</label>
    <div class="col-10">
        {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter server name', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.ip') }}</label>
    <div class="col-10">
        {!! Form::text('ip', '', ['class' => 'form-control', 'placeholder' => 'Enter IP', 'required' => 'required']) !!}
    </div>
</div>

@endsection

@section('content-footer')
<div class="kt-form__actions">
    <button type="submit" class="btn btn-primary">{{ trans('backend.submit') }}</button>
    <a href="{{route('integration_system.ip_list.index')}}"  class="btn btn-secondary">{{trans('backend.back')}}</a>
</div>
{!! Form::close() !!}
@endsection


