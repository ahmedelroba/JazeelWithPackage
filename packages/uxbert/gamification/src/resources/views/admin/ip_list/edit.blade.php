@extends('layouts.app')
@section('title', trans('backend.update_ip'))
@section('content-container')

@include('layouts.errors')


{!! Form::model($action, ['method' => 'PATCH','route' => ['integration_system.ip_list.update', $action->id]]) !!}

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.name') }}</label>
    <div class="col-10">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter server name', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.ip') }}</label>
    <div class="col-10">
        {!! Form::text('ip', null, ['class' => 'form-control', 'placeholder' => 'Enter server ip', 'required' => 'required']) !!}
    </div>
</div>
@endsection

@section('content-footer')
<div class="kt-form__actions">
    <button type="submit" class="btn btn-primary">{{ trans('backend.submit') }}</button>
    <a href="{{route('integration_system.actions.index')}}"  class="btn btn-secondary">{{trans('backend.back')}}</a>
</div>
{!! Form::close() !!}
@endsection


