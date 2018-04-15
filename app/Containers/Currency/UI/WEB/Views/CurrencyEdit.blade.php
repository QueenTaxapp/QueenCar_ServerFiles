@extends('layout::Layout')
@section('content')


    <!-- START CONTENT -->
        <section id="content">
            <!--start container-->
            <div class="container">
                <!--card stats start-->

                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="bordered-table">

                                <h4 class="header">{{ trans('localization::lang_view.edit_currency')}}
                                    <span class="back-button" style="float: right;"><a class="tooltipped" href="{{URL::Route('adminCurrencyView')}}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_currency_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>
                                </h4>

                                <div class="row">

                                    <div class="col s12 m12 l12">
                                        <form action="{{URL::Route('adminCurrencyUpdate',$currency->id)}}" method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">
                                                <div class="col s12 m12 l12">

                                                    <div class="input-field col s12 m4 l4">
                                                        <input name="currency_name" id="currency" type="text" value="<?=$currency->name?>" class="validate" required >
                                                        <label for="currency" class="active">{{ trans('localization::lang_view.currency_name')}} <sup>*</sup></label>
                                                    </div>
                                                    <div class="input-field col s12 m4 l4">
                                                        <input name="symbol" id="value" type="text" value="<?= $currency->symbol?>" required >
                                                        <label for="value">{{ trans('localization::lang_view.symbol')}}  <sup>*</sup></label>
                                                    </div>
                                                    <div class="input-field col s12 m4 l4">
                                                        <select name="standard_name" id="standard_name" required >
                                                            <option value="">{{ trans('localization::lang_view.select')}}</option>
                                                            <?php foreach($currency_list as $key => $value){ ?>
                                                            <option value="<?=$key;?>" <?php if($currency->standard_name==$key){echo "selected";} ?> ><?=$key;?></option>
                                                            <?php }?>
                                                        </select>
                                                        <label for="standard_name">{{ trans('localization::lang_view.standard_name')}}  <sup>*</sup></label>
                                                    </div>
                                                </div>

                                            </div>

                                            <br>
                                            <div class="col s12 m12 l12">
                                                <button class="btn save-btn cyan waves-effect waves-light right" type="submit" name="action">{{ trans('localization::lang_view.apply_changes')}}
                                                    <i class="material-icons right">send</i>
                                                </button>
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