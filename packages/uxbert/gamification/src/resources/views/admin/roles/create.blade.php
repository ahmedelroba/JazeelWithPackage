@extends('layouts.app')
@section('title', trans('backend.create_new_role'))
@section('content-container')
{!! Form::open(['route'=>['roles.store'],'method'=>'POST','class'=>'kt-form', 'novalidate' => 'novalidate']) !!}

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">{{ trans('backend.name') }}</label>
    <div class="col-10">
        {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Role name', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group row">
    @foreach($permissions as $value)
    <div class="col-4">
        <div class="row alert alert-secondary">
            <label class="col-4 col-form-label">{{ $value->name }}</label>
            <div class="col-8">
                <span class="kt-switch kt-switch--primary">
                    <label>
                        {{ Form::checkbox('permission[]', $value->name, false, array('class' => ' ')) }}
                        <span></span>
                    </label>
                </span>
            </div>
        </div>
    </div>
    @endforeach

</div>



@endsection

@section('content-footer')
<div class="kt-form__actions">
    <button type="submit" class="btn btn-primary">{{ trans('backend.submit') }}</button>
    <a href="{{route('roles.index')}}"  class="btn btn-secondary">{{trans('backend.back')}}</a>
</div>
{!! Form::close() !!}
@endsection


