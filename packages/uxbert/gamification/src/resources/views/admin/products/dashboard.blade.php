@extends('layouts.app')

@section('title', 'Product Dashboard')

@section('style')
@endsection


@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <!--begin:: Widgets/Stats-->
    <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3 kt-bg-success">

                    <!--begin::User Info-->
                    <div class="kt-widget7 kt-widget7--skin-light">
                        <div class="kt-widget7__content">
                            <div class="kt-widget7__userpic">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 512 512" width="50px" height="50px" class=""><g><title class="active-path" style="">Commercial delivery </title><path d="M472.916,224H448.007a24.534,24.534,0,0,0-23.417-18H398V140.976a6.86,6.86,0,0,0-3.346-6.062L207.077,26.572a6.927,6.927,0,0,0-6.962,0L12.48,134.914A6.981,6.981,0,0,0,9,140.976V357.661a7,7,0,0,0,3.5,6.062L200.154,472.065a7,7,0,0,0,3.5.938,7.361,7.361,0,0,0,3.6-.938L306,415.108v41.174A29.642,29.642,0,0,0,335.891,486H472.916A29.807,29.807,0,0,0,503,456.282v-202.1A30.2,30.2,0,0,0,472.916,224Zm-48.077-4A10.161,10.161,0,0,1,435,230.161v.678A10.161,10.161,0,0,1,424.839,241H384.161A10.161,10.161,0,0,1,374,230.839v-.678A10.161,10.161,0,0,1,384.161,220ZM203.654,40.717l77.974,45.018L107.986,185.987,30.013,140.969ZM197,453.878,23,353.619V153.085L197,253.344Zm6.654-212.658-81.668-47.151L295.628,93.818,377.3,140.969ZM306,254.182V398.943l-95,54.935V253.344L384,153.085V206h.217A24.533,24.533,0,0,0,360.8,224H335.891A30.037,30.037,0,0,0,306,254.182Zm183,202.1A15.793,15.793,0,0,1,472.916,472H335.891A15.628,15.628,0,0,1,320,456.282v-202.1A16.022,16.022,0,0,1,335.891,238h25.182a23.944,23.944,0,0,0,23.144,17H424.59a23.942,23.942,0,0,0,23.143-17h25.183A16.186,16.186,0,0,1,489,254.182Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M343.949,325h7.327a7,7,0,1,0,0-14H351V292h19.307a6.739,6.739,0,0,0,6.655,4.727A7.019,7.019,0,0,0,384,289.743v-4.71A7.093,7.093,0,0,0,376.924,278H343.949A6.985,6.985,0,0,0,337,285.033v32.975A6.95,6.95,0,0,0,343.949,325Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M344,389h33a7,7,0,0,0,7-7V349a7,7,0,0,0-7-7H344a7,7,0,0,0-7,7v33A7,7,0,0,0,344,389Zm7-33h19v19H351Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M351.277,439H351V420h18.929a7.037,7.037,0,0,0,14.071.014v-6.745A7.3,7.3,0,0,0,376.924,406H343.949A7.191,7.191,0,0,0,337,413.269v32.975A6.752,6.752,0,0,0,343.949,453h7.328a7,7,0,1,0,0-14Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M393.041,286.592l-20.5,20.5-6.236-6.237a7,7,0,1,0-9.9,9.9l11.187,11.186a7,7,0,0,0,9.9,0l25.452-25.452a7,7,0,0,0-9.9-9.9Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M393.041,415.841l-20.5,20.5-6.236-6.237a7,7,0,1,0-9.9,9.9l11.187,11.186a7,7,0,0,0,9.9,0l25.452-25.452a7,7,0,0,0-9.9-9.9Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M464.857,295H420.891a7,7,0,0,0,0,14h43.966a7,7,0,0,0,0-14Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M464.857,359H420.891a7,7,0,0,0,0,14h43.966a7,7,0,0,0,0-14Z" data-original="#000000" class="active-path" fill="#FFFFFF"/><path d="M464.857,423H420.891a7,7,0,0,0,0,14h43.966a7,7,0,0,0,0-14Z" data-original="#000000" class="active-path" fill="#FFFFFF"/></g> </svg>
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
                                            <a href="{{ route('integration_system.users.show', $activity->user->id) }}"  class="btn btn-sm btn-label-brand btn-bold">{{ $activity->user->first_name . ' ' . $activity->user->last_name }}</a>  {{ $activity->type == 'plus' ? 'got' : 'withdrawn' }} {{ $activity->current_points }} points by  <span href="#" class="kt-link kt-link--brand kt-font-bolder">{{ $activity->action->name }}</span> action.
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

            <!--begin:: Widgets/Authors Profit-->
            <div class="kt-portlet kt-portlet--bordered-semi kt-portlet--height-fluid">


                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            All users used this action
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-widget4">
                        @foreach ($usersList as $key => $value)
                        @php
                            $user = App\Models\IntegrationSystem\Integ_User::find($key);
                        @endphp
                        <div class="kt-widget4__item">
                            <div class="kt-widget4__pic kt-widget4__pic--logo">
                                <img src="https://b.thumbs.redditmedia.com/OIDktcKCqI8n4CnTj2SNZAQtXjBWxo9Qah6ku96YsME.png" alt="">
                            </div>
                            <div class="kt-widget4__info">
                                <a href="{{ route('integration_system.users.show', $activity->user->id) }}" class="kt-widget4__title">
                                    {{ $user->first_name . ' ' . $user->last_name }}
                                </a>
                                <p class="kt-widget4__text">
                                    {{ $user->active ? 'Active' : 'Disactive' }}
                                </p>
                            </div>
                            <span class="kt-widget4__number kt-font-brand">
                                Transactions <br>( <strong style="font-size: 18px">{{ $value->count() }}</strong> )
                            </span>
                        </div>
                        @endforeach

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


@endsection
