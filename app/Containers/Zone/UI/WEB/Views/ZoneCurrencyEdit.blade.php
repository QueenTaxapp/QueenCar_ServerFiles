@extends('layout::Layout')
@section('content')



        <section id="content">

            <div class="container">


                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="bordered-table">

                                <h4 class="header">{{ trans('localization::lang_view.zone_settings')}}
                                    <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('zoneView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_zone_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                                </h4>

                                <div class="row">

                                    <div class="col s12 m12 l12">
                                        <form action="{{URL::Route('zoneCurrencyUpdate',$zone->id)}}"  method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l12">
                                                            <input name="name" id="zone_name" type="text" value="{{$zone->name}}" class="validate" required >
                                                            <label for="zone_name">{{ trans('localization::lang_view.zone_name')}} <sup>*</sup></label>

                                                    </div>

                                                    <input type="hidden" name="zoneAdmin" value="{{$zone->admin_reference}}">

                                                </div>

                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l6">
                                                        <select name="currency" id="currency" required >
                                                            <option value="">{{ trans('localization::lang_view.select')  }}</option>
                                                            <?php
                                                            foreach ($currency as $value)
                                                            {
                                                            ?>
                                                            <option value="{{$value->id}} {{$value->symbol}}" <?php if($zone->currency == $value->id){ echo "selected";} ?> >{{$value->name}}  {{$value->symbol}}</option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>

                                                        <label for="currency">{{ trans('localization::lang_view.select_currency')}} <sup>*</sup></label>

                                                    </div>

                                                    <div class="input-field col s12 m6 l6">
                                                        <select name="unit" id="unit" required >

                                                            <option value="1" <?php if($zone->unit == 1){ echo "selected";} ?> > {{trans('localization::lang_view.kilometer')}}</option>
                                                            <option value="0" <?php if($zone->unit == 0){ echo "selected";} ?> > {{trans('localization::lang_view.miles')}}</option>

                                                        </select>

                                                        <label for="unit">{{ trans('localization::lang_view.select_unit')}} <sup>*</sup></label>

                                                    </div>


                                                </div>


                                                <div class="input-field col s12 m12 l12">
                                                    <button class="btn save-btn cyan waves-effect waves-light right" type="submit" name="action">{{ trans('localization::lang_view.update_type')}}
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </div>

                                            </div>
                                            
                                        </form>
                                        <br><br><br><br><br><br><br><br>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                <!--end container-->
            </div>
        </section>

@endsection