@extends('layouts.app')

@section('title', 'User Dashboard')

@section('style')
<link href="{{ asset('admin/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <!--begin:: Widgets/Stats-->
    <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3 kt-bg-danger">

                    <!--begin::User Info-->
                    <div class="kt-widget7 kt-widget7--skin-light">
                        <div class="kt-widget7__content">
                            <div class="kt-widget7__userpic">
                                <img src="https://cdn-images-1.medium.com/fit/c/200/200/2*aRIt5980KXAOV8Kfug-rdg.jpeg" alt="">
                            </div>
                            <div class="kt-widget7__info">
                                <h3 class="kt-widget7__username">
                                    {{ substr($user->first_name . ' ' . $user->last_name, 0, 20) }}
                                </h3>
                                <span class="kt-widget7__time">
                                    {{ $user->email }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!--end::User Info-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">

                    <!--begin::New Feedbacks-->
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Total Earned Points
                                </h4>
                                <span class="kt-widget24__desc">
                                    All points he gets
                                </span>
                            </div>
                            <span class="kt-widget24__stats kt-font-warning">
                                {{ $userEarnedPoints }}
                            </span>
                        </div>

                    </div>

                    <!--end::New Feedbacks-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">

                    <!--begin::New Orders-->
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Current Points
                                </h4>
                                <span class="kt-widget24__desc">
                                    The Remaining Points
                                </span>
                            </div>
                            <span class="kt-widget24__stats kt-font-success">
                                {{ $userCurrentPoints }}
                            </span>
                        </div>

                    </div>

                    <!--end::New Orders-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">

                    <!--begin::New Users-->
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Withdrawn Points
                                </h4>
                                <span class="kt-widget24__desc">
                                    All points he withdrawn
                                </span>
                            </div>
                            <span class="kt-widget24__stats kt-font-danger">
                                    {{ $userWithdrawnPoints }}
                            </span>
                        </div>

                    </div>

                    <!--end::New Users-->
                </div>
            </div>
        </div>
    </div>
    <!--end:: Widgets/Stats-->

    <div class="row">
        <div class="col-12">
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--head-sm" data-ktportlet="true" id="kt_portlet_tools_2">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            User Details
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-group">
                            <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-default btn-icon-md"><i class="la la-angle-down"></i></a>
                            <a href="#" data-ktportlet-tool="remove" class="btn btn-sm btn-icon btn-default btn-icon-md"><i class="la la-close"></i></a>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <!--begin::Section-->
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th width="25%">First Name</th>
                            <th width="25%">Last Name</th>
                            <th width="25%">Email</th>
                            <th width="25%">Referral Key</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td scope="col">{{ $user->referral_key }}</td>

                          </tr>
                        </tbody>
                        <thead>
                            <tr>
                              <th width="25%">phone</th>
                              <th width="25%">country</th>
                              <th width="25%">city</th>
                              <th width="25%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>{{ $user->phone }}</td>
                              <td>{{ $user->country }}</td>
                              <td>{{ $user->city }}</td>
                              <td></td>
                            </tr>
                          </tbody>

                      </table>
                    <!--end::Section-->
                </div>
            </div>
            <!--end::Portlet-->


        </div>
    </div>

    <div class="row">
        <div class="col-xl-7">
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--head-sm" data-ktportlet="true" id="kt_portlet_tools_6">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Recent Activities
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-group">
                            <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-default btn-icon-md"><i class="la la-angle-down"></i></a>
                            <a href="#" data-ktportlet-tool="remove" class="btn btn-sm btn-icon btn-default btn-icon-md"><i class="la la-close"></i></a>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__head">
                    <div class="form-group row" style="margin-top: 20px;width:100%">
                        <label class="col-form-label col-lg-1 col-md-1 col-sm-12">From</label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="input-group date">
                                @php
                                    $lastWeek = date("Y-m-d H:i", strtotime("-30 days"));
                                    $today = date("Y-m-d H:i");
                                @endphp
                                <input type="text" class="form-control" name="from" readonly value="{{ $lastWeek }}" id="kt_datetimepicker_2" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar glyphicon-th"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <label class="col-form-label col-lg-1 col-md-1 col-sm-12">To</label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="input-group date">
                                <input type="text" class="form-control" name="to" readonly value="{{ $today }}" id="kt_datetimepicker_3" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar glyphicon-th"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <a href="#" class="btn btn-primary btn-pill" id="onPressBtn" data-target="#kt_datetimepicker_modal">Fillter</a>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-scroll" data-scroll="true" id="activities_list" data-height="400" style="height: 400px;">
                    </div>
                </div>

            </div>
            <!--end::Portlet-->
        </div>
        <div class="col-xl-5">

            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--head-sm" data-ktportlet="true" id="kt_portlet_tools_1">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            All Brands He Joined
                        </h3>
                        <span class="kt-widget24__stats kt-font-success">
                            {{ $user->brands->count() }}
                        </span>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-group">
                            <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-default btn-icon-md"><i class="la la-angle-down"></i></a>
                            <a href="#" data-ktportlet-tool="remove" class="btn btn-sm btn-icon btn-default btn-icon-md"><i class="la la-close"></i></a>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <div class="kt-scroll" data-scroll="true" data-height="400" style="height: 400px;">
                        <div class="kt-widget4">
                            @foreach ($user->brands as $brand)
                            <div class="kt-widget4__item">
                                <div class="kt-widget4__pic kt-widget4__pic--logo">
                                    <img src="https://b.thumbs.redditmedia.com/OIDktcKCqI8n4CnTj2SNZAQtXjBWxo9Qah6ku96YsME.png" alt="">
                                </div>
                                <div class="kt-widget4__info">
                                    <a href="#" class="kt-widget4__title">
                                        <a href="{{ $brand->url }}" class="kt-link kt-link--brand kt-font-bolder">{{ $brand->name }}</a>

                                    </a>
                                    <p class="kt-widget4__text">
                                        {{ $brand->description }}
                                    </p>
                                </div>
                                <span class="kt-widget4__number kt-font-brand">
                                    <h6>All Earned Points</h6>
                                    {{App\Models\IntegrationSystem\IntegBrandActionUserRel::where('brand_id', $brand->id)->where('user_id', $user->id)->where('type', 'plus')->get()->sum('current_points')}}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->


        </div>
    </div>


</div>
@endsection


@section('javascript')
<script src="{{ asset('admin/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/app/custom/general/crud/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<script>
    $('.kt-portlet__head').on('click', '#onPressBtn', function() {
        getAllActivities(null, "{{ $user->id }}", "{{ substr($user->first_name . ' ' . $user->last_name, 0, 20) }}", "{{ csrf_token() }}", "{{ url('admin/integration_system/users/get_ajax_all_users_activities') }}", '#activities_list')
    });

    $( document ).ready(function() {
        getAllActivities(100, "{{ $user->id }}", "{{ substr($user->first_name . ' ' . $user->last_name, 0, 20) }}", "{{ csrf_token() }}", "{{ url('admin/integration_system/users/get_ajax_all_users_activities') }}", '#activities_list')
    });

    function getAllActivities(limit, userId, userName, token, url, container) {
        var from = $('input[name=from]').val();
        var to = $('input[name=to]').val();
        $(container).empty();
        $(container).append('<span class="kt-widget24__stats kt-font-brand" style="font-size: 20px;padding-top: 30px;"><strong>Loading ...</strong></span>');

        $.ajax({
            method: "POST",
            url: url,
            data: { from: from, to: to, limit: limit, user_id: userId, _token: token }
        })
        .done(function( msg ) {
            var counter = 0;
            var cssClass = '';
            $(container).empty();
            Object.keys(msg).forEach(function (item, index) {
                if(counter != 0) {
                    cssClass = "font-size: 20px;padding-top: 30px;";
                }
                else{
                    cssClass = "font-size: 20px;";
                }
                counter++;

                var dayTitle = item
                var dayItem = msg[item]

                $(container).append(
                    '<span class="kt-widget24__stats kt-font-brand" style="'+cssClass+'"><strong>'+dayTitle+'</strong> <small>('+dayItem.length+')</small></span>'+
                    '<div class="kt-timeline-v2" style="margin-left: 18px;    margin-bottom: 30px;margin-top: 12px;">'+
                        '<div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30" id="actions_list_'+dayTitle+'">'+
                        '</div>'+
                    '</div>'
                );

                dayItem.forEach(function (newItem, newIndex) {
                    console.log('++++++++++++++')
                    console.log(newItem)
                    var actionName = newItem['action']['name'];
                    var actionId = newItem['action']['_id'];
                    var activityType = newItem.type == 'plus' ? 'got' : 'withdrawn';

                    var time = new Date(newItem.created_at).getHours() + ':' + new Date(newItem.created_at).getMinutes()

                    $('#actions_list_' + dayTitle).append(
                        '<div class="kt-timeline-v2__item">'+
                            '<span class="kt-timeline-v2__item-time">'+time+'</span>'+
                            '<div class="kt-timeline-v2__item-cricle">'+
                                '<i class="fa fa-genderless kt-font-'+(newItem.type == 'plus' ? 'success' : 'danger')+'"></i>'+
                            '</div>'+
                            '<div class="kt-timeline-v2__item-text kt-padding-top-5">'+
                                '<a href="#" class="btn btn-sm btn-label-brand btn-bold">'+userName+'</a> '+activityType+' '+newItem.current_points+' points by  <a href="#" class="kt-link kt-link--brand kt-font-bolder">'+actionName+'</a> action.'+
                            '</div>'+
                        '</div>'
                    );
                    console.log('++++++++++++++')
                });

            });
            KTApp.unblock(container);
        });
    }

</script>
@endsection
