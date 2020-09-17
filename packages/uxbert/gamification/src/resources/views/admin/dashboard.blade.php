@extends('layouts.app')

@section('title', 'Dashboard')

@section('style')
@endsection


@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <!--begin:: Widgets/Stats-->
    <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3">

                    <!--begin::Total Profit-->
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    {{ isset($topUser->first_name) ? $topUser->first_name . ' ' . $topUser->last_name : '-' }}
                                </h4>
                                <span class="kt-widget24__desc">
                                    Top User Gets Points
                                </span>
                            </div>
                            <span class="kt-widget24__stats kt-font-brand">
                                {{ $topUserEarned }}
                            </span>
                        </div>
                        <div class="progress progress--sm">
                            <div class="progress-bar kt-bg-brand" role="progressbar" style="width: {{ \App\Helpers\Helper::get_percentage($topUserEarned, $topUserCurrentPoints) }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="kt-widget24__action">
                            <span class="kt-widget24__change">
                                <span class="btn btn-sm btn-label-brand btn-bold">Current Points: <strong>{{ $topUserCurrentPoints }}</strong></span>
                            </span>
                            <span class="kt-widget24__number">
                                <span class="btn btn-sm btn-label-brand btn-bold"><strong>{{ \App\Helpers\Helper::get_percentage($topUserEarned, $topUserCurrentPoints) }}%</strong></span>
                            </span>
                        </div>
                    </div>

                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">

                    <!--begin::New Feedbacks-->
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Total Users
                                </h4>
                                <span class="kt-widget24__desc">
                                    All users in Your Brand
                                </span>
                            </div>
                            <span id="totalUsersCounter" class="kt-widget24__stats kt-font-warning">
                                0
                            </span>
                        </div>
                        <div class="progress progress--sm">
                            <div class="progress-bar kt-bg-warning" role="progressbar" id="totalUsersProgressBar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="kt-widget24__action">
                            <span class="kt-widget24__change">

                            </span>
                            <span class="kt-widget24__number">
                                <span class="btn btn-sm btn-label-warning btn-bold"><strong id="totalUsersPercentage">0%</strong></span>
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
                            <span class="kt-widget24__stats kt-font-danger" id="currentPointsCounter">
                                0
                            </span>
                        </div>
                        <div class="progress progress--sm">
                            <div class="progress-bar kt-bg-danger" role="progressbar" id="currentPointsProgressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="kt-widget24__action">
                            <span class="kt-widget24__change">
                                <span class="btn btn-sm btn-label-danger btn-bold">Total Withdrawn points:  <strong id="withdrawnPointsPercentage">0</strong></span>
                            </span>
                            <span class="kt-widget24__number">
                                <span class="btn btn-sm btn-label-danger btn-bold"><strong id="currentPointsPercentage">0%</strong></span>
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
                                    New Users
                                </h4>
                                <span class="kt-widget24__desc">
                                    Joined New User
                                </span>
                            </div>
                            <span class="kt-widget24__stats kt-font-success" id="new_users_counter">
                                0
                            </span>
                        </div>
                        <div class="progress progress--sm">
                            <div class="progress-bar kt-bg-success" role="progressbar" id="new_users_progressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="kt-widget24__action">
                            <span class="kt-widget24__change">
                                <span class="btn btn-sm btn-label-success btn-bold">Total Users:  <strong id="totalUsersCounterStrong">0</strong></span>
                            </span>
                            <span class="kt-widget24__number">
                                <span class="btn btn-sm btn-label-success btn-bold"><strong id="new_user_percentage">0%</strong></span>
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
        <div class="kt-portlet kt-portlet--height-fluid ">
            <div class="kt-widget14">
                <div class="kt-widget14__header">
                    <h3 class="kt-widget14__title">
                        Brand credentials
                    </h3>
                    <span class="kt-widget14__desc">
                        Brand can integrate with jazeel by client id and client secret and you can get integration documentation from <a href="{{url('api/documentation')}}" target="_blank" class="kt-link kt-link--brand kt-font-bolder">here</a>
                    </span>
                </div>
                <div class="kt-widget14__content">
                    <div class="container-fluid row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Client ID</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ auth()->user()->brand->client_id }}" disabled aria-label="Text input with checkbox">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Client Secret</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--success">
                                                <input type="checkbox" id="show_secret">
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                    <input type="password"  value="{{ auth()->user()->brand->client_secret }}" class="form-control client-secret" disabled aria-label="Text input with checkbox">
                                </div>
                            </div>
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-7">
            <!--Begin::Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Recent Activities
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-scroll" data-scroll="true" data-height="400" style="height: 400px;">

                        <!--Begin::Timeline 3 -->
                        @php $counter = 0; @endphp
                        @foreach ($recentActivity as $day => $activities)
                        @php
                            if($counter != 0)
                                $cssClass = "font-size: 20px;padding-top: 30px;";
                            else
                                $cssClass = "font-size: 20px;";
                            $counter++;
                        @endphp

                        <span class="kt-widget24__stats kt-font-brand" style="{{ $cssClass }}"><strong>{{$day}}</strong></span>
                        <div class="kt-timeline-v2" style="margin-left: 18px;    margin-bottom: 30px;margin-top: 12px;">
                            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                                @foreach ($activities as $activity)
                                    <!--Begin::plus -->
                                    <div class="kt-timeline-v2__item">
                                        <span class="kt-timeline-v2__item-time"> {{ $activity->created_at->format('H:i') }}</span>
                                        <div class="kt-timeline-v2__item-cricle">
                                            <i class="fa fa-genderless kt-font-{{ $activity->type == 'plus' ? 'success' : 'danger' }}"></i>
                                        </div>
                                        <div class="kt-timeline-v2__item-text kt-padding-top-5">
                                            <a href="{{ route('integration_system.users.show', $activity->user->id) }}" class="btn btn-sm btn-label-brand btn-bold">{{ substr($activity->user->first_name . ' ' . $activity->user->last_name, 0, 20) }}</a>  {{ $activity->type == 'plus' ? 'got' : 'withdrawn' }} {{ $activity->current_points }} points by  <a href="{{ route('integration_system.actions.show', $activity->action->id) }}" class="kt-link kt-link--brand kt-font-bolder">{{ $activity->action->key }}</a> action.
                                            @if ($activity->description != "")
                                            <!--Start::Read More-->
                                            <br/>
                                            <br/>
                                            <div class="kt-portlet__head-toolbar">
												<a href="#" class="btn btn-label-success btn-sm btn-bold dropdown-toggle" data-toggle="dropdown">
													Read More...
												</a>
												<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
													<ul class="kt-nav">
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link">
																<i class="kt-nav__link-icon flaticon2-send"></i>
																<span class="kt-nav__link-text">{{ $activity->description }}</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
                                            <!--End::Read More-->
                                            @endif
                                        </div>
                                    </div>
                                    <!--End::minus -->
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        <!--End::Timeline 3 -->
					</div>
                </div>
            </div>
            <!--End::Portlet-->
        </div>

        <div class="col-xl-5">

            <!--begin:: Widgets/New Users-->
            <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            New Users
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_widget4_tab1_content" role="tab">
                                    Today
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget4_tab1_content">
                            <div class="kt-scroll" data-scroll="true" data-height="400" style="height: 400px;">
                                <div class="kt-widget4" id="users_container">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/New Users-->
        </div>
    </div>






</div>
@endsection

@section('javascript')
<script>
    $("#show_secret").change(function() {
        if(this.checked) {
            //Do stuff
            $('.client-secret').prop('type', 'text');
        } else {
            $('.client-secret').prop('type', 'password');
        }
    });
    $( document ).ready(function() {
        //Users Blocks (2, 4)
        getTotalUsers();
        getNewUsers();
        //Points Blocks (3)
        getCurrentPoints();

        getNewUsersArray();
    });

    //Points Blocks (3)
    function getCurrentPoints() {
        $.ajax({
            method: "POST",
            url: "{{ url('admin/get_dashboard_ajax_data') }}",
            data: { type: 'counts', order: 'current_points', _token: "{{ csrf_token() }}" }
        })
        .done(function( msg ) {
            console.log(msg.data.key)
            $('#currentPointsCounter').html(msg.data.key);
            getWithdrawnPoints(msg.data.key);
        });
    }

    function getWithdrawnPoints(current_points) {
        $.ajax({
            method: "POST",
            url: "{{ url('admin/get_dashboard_ajax_data') }}",
            data: { type: 'counts', order: 'total_withdrawn', _token: "{{ csrf_token() }}" }
        })
        .done(function( msg ) {
            $('#withdrawnPointsPercentage').html(msg.data.key);
            getPointsPercentage(current_points, msg.data.key);
        });
    }
    function getPointsPercentage(one, two) {
        $.ajax({
            method: "POST",
            url: "{{ url('admin/get_dashboard_ajax_data') }}",
            data: { type: 'counts', order: 'get_percentage', one: one, two: two,  _token: "{{ csrf_token() }}" }
        })
        .done(function( msg ) {
            $('#currentPointsPercentage').html(100 - parseFloat(msg.data.key) + '%');
            $('#currentPointsProgressbar').attr('style', 'width: ' + (100 - parseFloat(msg.data.key)) + '%;')
        });
    }

    //Users Blocks (2, 4)
    function getTotalUsers() {
        $.ajax({
            method: "POST",
            url: "{{ url('admin/get_dashboard_ajax_data') }}",
            data: { type: 'counts', order: 'total_users', _token: "{{ csrf_token() }}" }
        })
        .done(function( msg ) {
            $('#totalUsersCounter').html(msg.data.key);
            $('#totalUsersCounterStrong').html(msg.data.key);

            $('#totalUsersProgressBar').attr('style', 'width: 100%')
            $('#totalUsersPercentage').html('100%');

        });
    }

    function getNewUsers() {
        $.ajax({
            method: "POST",
            url: "{{ url('admin/get_dashboard_ajax_data') }}",
            data: { type: 'counts', order: 'new_users', _token: "{{ csrf_token() }}" }
        })
        .done(function( msg ) {
            $('#new_users_counter').html(msg.data.key);
            getNewUsersPercentage($('#totalUsersCounter').html(), msg.data.key);
        });
    }
    function getNewUsersPercentage(one, two) {
        $.ajax({
            method: "POST",
            url: "{{ url('admin/get_dashboard_ajax_data') }}",
            data: { type: 'counts', order: 'get_percentage', one: one, two: two,  _token: "{{ csrf_token() }}" }
        })
        .done(function( msg ) {
            $('#new_user_percentage').html(msg.data.key + '%');
            $('#new_users_progressbar').attr('style', 'width: ' + msg.data.key + '%;')
        });
    }

    function getNewUsersArray() {
        $.ajax({
            method: "POST",
            url: "{{ url('admin/get_dashboard_ajax_data') }}",
            data: { type: 'arrays', order: 'new_users',  _token: "{{ csrf_token() }}" }
        })
        .done(function( msg ) {
            console.log(msg);

            Object.keys(msg).forEach(function (item, index) {
                //console.log('Key : '+ item)
                var fullName = msg[item].first_name + ' ' + msg[item].last_name;
                $('#users_container').append(
                    '<div class="kt-widget4__item">' +
                        '<div class="kt-widget4__pic kt-widget4__pic--pic">'+
                            '<img src="../assets/media/users/100_2.jpg" alt="">'+
                        '</div>'+
                        '<div class="kt-widget4__info">'+
                            '<a class="kt-widget4__username">'+
                                fullName +
                            '</a>'+
                            '<p class="kt-widget4__text">'+
                                'Total Earned Points: <strong>'+msg[item].total_earned_points+'</strong>'+
                            '</p>'+
                        '</div>'+
                        '<a href="" class="btn btn-sm btn-label-brand btn-bold">Show</a>'+
                    '</div>'
                );
            });
        });
    }
</script>

@endsection
