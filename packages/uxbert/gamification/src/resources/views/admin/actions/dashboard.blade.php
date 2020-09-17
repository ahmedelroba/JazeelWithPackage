@extends('layouts.app')

@section('title', 'Action Dashboard')

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
                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 512 512" width="50px" height="50px"><g><title class="active-path" style="">Money Transaction</title><path d="M464.75,208.75H371A37.292,37.292,0,0,0,333.75,246V464.75A37.292,37.292,0,0,0,371,502h93.75A37.292,37.292,0,0,0,502,464.75V246A37.292,37.292,0,0,0,464.75,208.75ZM490,257.469V427.5H345.75V257.469ZM371,220.75h93.75a25.274,25.274,0,0,1,25.236,24.719H345.764A25.274,25.274,0,0,1,371,220.75ZM464.75,490H371a25.278,25.278,0,0,1-25.25-25.25V439.5H490v25.25A25.278,25.278,0,0,1,464.75,490Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M432.328,458.75H403.422a6,6,0,0,0,0,12h28.906a6,6,0,0,0,0-12Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M178.25,266V47.25A37.292,37.292,0,0,0,141,10H47.25A37.292,37.292,0,0,0,10,47.25V266a37.292,37.292,0,0,0,37.25,37.25H141A37.292,37.292,0,0,0,178.25,266Zm-12-207.281V228.75H22V58.719ZM47.25,22H141a25.274,25.274,0,0,1,25.236,24.719H22.014A25.274,25.274,0,0,1,47.25,22ZM22,266V240.75H166.25V266A25.278,25.278,0,0,1,141,291.25H47.25A25.278,25.278,0,0,1,22,266Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M108.578,260H79.672a6,6,0,0,0,0,12h28.906a6,6,0,0,0,0-12Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M166.784,430.3a122.7,122.7,0,0,1-55.63-98.6,6,6,0,1,0-11.992.409A134.344,134.344,0,0,0,247.855,461.351l5.8,27.406a6,6,0,0,0,10.9,2.029L290.2,451.371a6,6,0,0,0-1.757-8.3l-39.416-25.644a6,6,0,0,0-9.142,6.272l5.471,25.851A122.293,122.293,0,0,1,166.784,430.3Zm110.085,19.555L262.4,472.1l-3.864-18.254c0-.011,0-.022,0-.033a6.087,6.087,0,0,0-.151-.7l-3.754-17.733Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M402.425,171.815a6,6,0,0,0,5.992,5.8c.069,0,.139,0,.208,0a6,6,0,0,0,5.792-6.2A134.494,134.494,0,0,0,265.724,42.157l-5.8-27.4a6,6,0,0,0-10.9-2.03L223.38,52.144a6,6,0,0,0,1.757,8.3l39.415,25.644a6,6,0,0,0,9.142-6.271l-5.471-25.851a122.492,122.492,0,0,1,134.2,117.848ZM236.711,53.659l14.473-22.245,3.862,18.249c0,.013,0,.025,0,.037a6.2,6.2,0,0,0,.152.7l3.753,17.729Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M94.125,152.079A18,18,0,0,1,94.3,188.07c-.059,0-.115-.008-.174-.008s-.115.007-.174.008a18.015,18.015,0,0,1-17.826-17.991,6,6,0,0,0-12,0,30.05,30.05,0,0,0,24,29.4v8.883a6,6,0,0,0,12,0v-8.883a30,30,0,0,0-6-59.4,18,18,0,1,1,18-18,6,6,0,0,0,12,0,30.05,30.05,0,0,0-24-29.4V84.892a6,6,0,0,0-12,0v7.791a30,30,0,0,0,6,59.4Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M383.193,315.67a6,6,0,0,0-.063,12l42.838.46a23.8,23.8,0,0,1-22.922,17.515h-.259l-19.848-.213h-.064a6,6,0,0,0-4.167,10.317l49.1,47.409a6,6,0,1,0,8.335-8.633L397.9,357.592l4.762.051a35.814,35.814,0,0,0,35.566-29.382l14.267.153h.066a6,6,0,0,0,.063-12l-14.267-.153a35.659,35.659,0,0,0-8.363-17.853l22.821.245h.065a6,6,0,0,0,.063-12l-49.513-.531-19.848-.213h-.065a6,6,0,0,0-.064,12l19.848.213a23.806,23.806,0,0,1,22.8,18.007l-42.839-.459Z" data-original="#000000" class="active-path" fill="#FFFFFF"/></g> </svg>
                            </div>
                            <div class="kt-widget7__info">
                                <h3 class="kt-widget7__username">
                                    {{ $action->name }}
                                </h3>
                                <span class="kt-widget7__time">
                                    {{ $action->points }} Points
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
                                    All points users gets
                                </span>
                            </div>
                            <span class="kt-widget24__stats kt-font-warning">
                                {{ $action->transactions->sum('current_points') }}
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
                                    Total Transactions
                                </h4>
                                <span class="kt-widget24__desc">
                                    Total Transactions for this action
                                </span>
                            </div>
                            <span class="kt-widget24__stats kt-font-success">
                                {{ $action->transactions->count() }}
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
                                    Users Used It
                                </h4>
                                <span class="kt-widget24__desc">
                                    All users used this action
                                </span>
                            </div>
                            <span class="kt-widget24__stats kt-font-danger">
                                {{ $action->transactions->groupBy(function ($val) { return $val->user_id; })->count() }}
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
        <div class="col-xl-5">
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
                                            <a href="{{ route('integration_system.users.show', $activity->user->id) }}"  class="btn btn-sm btn-label-brand btn-bold">{{ substr($activity->user->first_name . ' ' . $activity->user->last_name, 0, 20) }}</a>  {{ $activity->type == 'plus' ? 'got' : 'withdrawn' }} {{ $activity->current_points }} points by  <span href="#" class="kt-link kt-link--brand kt-font-bolder">{{ $activity->action->name }}</span> action.
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
        <div class="col-xl-7">

            <!--begin:: Widgets/Authors Profit-->
            <div class="kt-portlet kt-portlet--bordered-semi kt-portlet--height-fluid">

                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            All users used this action
                        </h3>
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
                    <div class="kt-widget4">
                        <div class="kt-scroll" id="users_container" data-scroll="true" data-height="400" style="height: 400px;">

                        </div>
                    </div>
                </div>
                <!--replace:: users list -->


            </div>
            <!--end:: Widgets/Authors Profit-->
        </div>
    </div>


</div>
@endsection
@section('javascript')

<script src="{{ asset('admin/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/app/custom/general/crud/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>

<script>
    $('.kt-portlet__head').on('click', '#onPressBtn', function() {
        getAllMilestones('')
    });

    $( document ).ready(function() {
        getAllMilestones('')
    });

    function getAllMilestones(id, buttonText = 'Choose Influencer') {
        var from = $('input[name=from]').val();
        var to = $('input[name=to]').val();
        $('#users_container').empty();
        $('#users_container').append('<span class="kt-widget24__stats kt-font-brand" style="font-size: 20px;padding-top: 30px;"><strong>Loading ...</strong></span>');

        $.ajax({
            method: "POST",
            url: "{{ url('admin/integration_system/actions/get_ajax_all_users') }}",
            data: { from: from, to: to, action_id: "{{ $action->id }}", _token: "{{ csrf_token() }}" }
        })
        .done(function( msg ) {
            $('#users_container').empty();
            Object.keys(msg).forEach(function (item, index) {
                //console.log('Key : '+ item)
                var fullName = msg[item][0]['user'].first_name + ' ' + msg[item][0]['user'].last_name
                var email = msg[item][0]['user'].email
                var counter = msg[item].length

                $('#users_container').append(
                    '<div class="kt-widget4__item">'+
                        '<div class="kt-widget4__pic kt-widget4__pic--logo">'+
                            '<img src="https://b.thumbs.redditmedia.com/OIDktcKCqI8n4CnTj2SNZAQtXjBWxo9Qah6ku96YsME.png" alt="">'+
                        '</div>'+
                        '<div class="kt-widget4__info">'+
                            '<a href="{{ url("admin/integration_system/users") }}/'+msg[item][0]['user']._id+'" class="kt-widget4__title">'+
                                fullName.substr(1, 4) +
                            '</a>'+
                            '<p class="kt-widget4__text">'+
                                email +
                            '</p>'+
                        '</div>'+
                        '<span class="kt-widget4__number kt-font-brand">'+
                            'Transactions <br>( <strong style="font-size: 18px">' + counter + '</strong> )'+
                        '</span>'+
                    '</div>'
                );
            });
        });
    }
</script>
@endsection
