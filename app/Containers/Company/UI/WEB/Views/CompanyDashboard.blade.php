@extends('company::CompanyLayout')
@section('content')


<?php
    $colorArray = array('card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text','card gradient-45deg-red-pink gradient-shadow min-height-100 white-text','card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text','card gradient-45deg-green-teal gradient-shadow min-height-100 white-text');
?>

    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->
            <div id="card-stats">
                <div class="row">

                    <div class="col s12 m6 l3">
                        <div style="min-height: 150px !important;color:#fff;" class="<?php echo "$colorArray[0]"?>;">
                            <div class="padding-4">
                                <div class="col s7 m7 l7">
                                    <i class="material-icons background-round mt-5">account_box</i>
                                    <p>{{ trans('localization::lang_view.total_drivers')}}</p>
                                </div>
                                <div class="col s5 m5 l5 right-align">
                                    <h5 class="mb-0">{{$result['totalDriver']}}</h5>
                                    {{--<p class="no-margin">{{ trans('localization::new_lang_view.new')}}</p>--}}

                                </div>
                            </div>
                        </div>
                     </div>

                    <div class="col s12 m6 l3">
                        <div style="min-height: 150px !important;color:#fff;" class="<?php echo "$colorArray[1]"?>;">
                            <div class="padding-4">
                                <div class="col s7 m7 l7">
                                    <i class="material-icons background-round mt-5">account_box</i>
                                    <p>{{ trans('localization::lang_view.completed_requests')}}</p>
                                </div>
                                <div class="col s5 m5 l5 right-align">
                                    <h5 class="mb-0">{{$result['completed']}}</h5>
                                    {{--<p class="no-margin">{{ trans('localization::lang_view.new')}}</p>--}}

                                </div>
                            </div>
                        </div>
                     </div>
                    <div class="col s12 m6 l3">
                        <div style="min-height: 150px !important;color:#fff;" class="<?php echo "$colorArray[2]"?>;">
                            <div class="padding-4">
                                <div class="col s7 m7 l7">
                                    <i class="material-icons background-round mt-5">account_box</i>
                                    <p>{{ trans('localization::lang_view.cancelled_requests')}}</p>
                                </div>
                                <div class="col s5 m5 l5 right-align">
                                    <h5 class="mb-0">{{$result['cancelled']}}</h5>
                                    {{--<p class="no-margin">{{ trans('localization::lang_view.new')}}</p>--}}

                                </div>
                            </div>
                        </div>
                     </div>

                    </div>


                </div>
            </div>
    </section>

@endsection