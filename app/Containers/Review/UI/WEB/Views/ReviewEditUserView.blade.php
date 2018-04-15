@extends('layout::Layout')
@section('content')

	<link rel="stylesheet" type="text/css" href="jquery-rating.css">

<style>


</style>


<script type="text/javascript" src="jquery-2.1.1.js"></script>
	<script type="text/javascript" src="jquery-rating.js"></script>

    <!-- START CONTENT -->
        <section id="content">
            <!--start container-->
            <div class="container">
                <!--card stats start-->

                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="bordered-table">

                                <h4 class="header">
                                    <?=$title;?>
                                    <span class="back-button" style="float: right;"><a class="tooltipped" href="{{URL::Route('userReview')}}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.to_view_user_review')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                                </h4>

                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        
                                        <form method=post action="{{ URL::Route('saveEditUserReview') }}">


                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" value="{{ $request->id }}">
                                            <input type="hidden" name="user_id" value="{{ $result->user_id }}">

                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l6">
                                                        <i class="material-icons prefix">star</i>
                                                        <input name="rating" id="rating" type="text" value="{{$result->rating}}" class="validate" required >
                                                        <label for="rating" class="active">{{ trans('localization::lang_view.rating')}} <sup>*</sup> {{ trans('localization::lang_view.rate_1_to_5')}}</label>
                                                    </div>

                                                    <div class="input-field col s12 m12 l12">
                                                        <i class="material-icons prefix">mode_edit</i>
                                                        <textarea name="comment" id="icon_prefix2" class="materialize-textarea">{{json_decode($result->comment)}}</textarea>
                                                        <label for="icon_prefix2">{{ trans('localization::lang_view.comment')}}</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col s12 m12 l12">
                                                <button class="btn save-btn cyan waves-effect waves-light right" type="submit" name="action">{{ trans('localization::lang_view.save')}}
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <!--end container-->
            </div>
        </section>





@endsection