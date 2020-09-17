@extends('layouts.app')

@section('title', trans('backend.create_new_product'))



@section('content-container')
@include('layouts.errors')

{!! Form::open(['route'=>['integration_system.products.store'], 'method'=>'POST', 'class'=>'kt-form', 'novalidate' => 'novalidate', 'files' => 'true']) !!}

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.name') }}</label>
    <div class="col-10">
        {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter action name', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.description') }}</label>
    <div class="col-10">
        {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Enter action description', 'required'=>'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.url') }}</label>
    <div class="col-10">
        {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Enter URl of product', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.expiration_date') }}</label>
    <div class="col-10">
        {!! Form::date('expiration_date', null, ['class' => 'form-control', 'placeholder' => 'Enter expiration date', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label"><strong>{{ trans('validation.attributes.key') }}</strong>  <small> (prod-)</small></label>
    <div class="col-10">
        {!! Form::text('key', '', ['class' => 'form-control', 'placeholder' => 'Enter unique key', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.points') }}</label>
    <div class="col-10">
        {!! Form::number('points', null, ['class' => 'form-control', 'placeholder' => 'Enter points', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.type') }}</label>
    <div class="col-10">
        {!! Form::select('type', ['plus' => 'Plus Points', 'minus' => 'Minus Points'], null, ['class' => 'form-control', 'placeholder' => 'Enter points', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('validation.attributes.image') }}</label>
    <div class="col-10">
        {!! Form::file('image', ['class' => 'form-control', 'placeholder' => 'Enter points', 'required' => 'required']) !!}
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


