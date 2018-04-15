@extends('layout::Layout')
@section('content')

<script src="bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="bower_components/sweetalert2/dist/sweetalert2.min.css">

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <style>
        sup{
            color:red;
            font-size: 12px;
            left: 2px;

        }

        th {
    text-align: center;
}
td
{
    text-align: center;
}
.non_act
{

font-size: 16px;
color: white;
width :25px;
background-color: #d81b60;
padding-top: 8px;
padding-right: 10px;
padding-bottom: 8px;
padding-left: 10px;
-moz-border-radius: 0px 0px 0px 0px;
border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
}
.act
{

font-size: 16px;
color: white;
width :25px;
background-color: #5cb860;
padding-top: 8px;
padding-right: 10px;
padding-bottom: 8px;
padding-left: 10px;
-moz-border-radius: 0px 0px 0px 0px;
border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
}

#noresult
{
    text-align: center;

}
    </style>



    <section class="content">
        <div class="container">
            <div class="row">

                <div class="col s12 m12 l12">

                            <h4 class="card-title">Module</h4>


                            <ul class="collapsible popout collapsible-accordion" data-collapsible="accordion">

                                <?php
        foreach($object->module as $base_name => $base_module)
            {
                ?>
                                    <li class="">
                                        <div class="collapsible-header">
                                            <h4 class="panel-title">
                                                   {{$base_name}}
                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                </h4>

                                        </div>
                                        <div class="collapsible-body" style="display: none;">


<?php
        foreach ($base_module as $sub_module_name => $sub_module)
            {
                ?>


    <table class="table table-bordered">


                    <b>Title</b> : {{$sub_module->title}}<br>
                    <b>Version</b> : {{$sub_module->version}}<br>
                    <b>Description</b> : {{$sub_module->description}}<br>
                    <b>Author</b> : {{$sub_module->author}}<br>
                    <b>Status</b> : {{$sub_module->is_active?"Active":"Inactive"}}<br><hr><br>

    </table>

    <?php
            }
        ?>
                                        </div>
                                    </li>

                                <?php
            }
        ?>
                            </ul>

                </div>



                <div class="col s12 m12 l12">

                            <h4 class="card-title">Custom Module</h4>

                            <ul class="collapsible popout collapsible-accordion" data-collapsible="accordion">
                                <?php
                                foreach($object->Custom_module as $base_name => $base_module)
                                {
                                ?>

                                    <li class="">
                                        <div class="collapsible-header">
                                            <h4 class="panel-title">
                                                {{$base_name}}
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </h4>

                                        </div>

                                        <div class="collapsible-body" style="display: none;">
                                            <?php
                                            foreach ($base_module as $sub_module_name => $sub_module)
                                            {
                                            ?>

                                                <table class="table table-bordered">
                                                            <b>Title</b> : {{$sub_module->title}}<br>
                                                            <b>Version</b> : {{$sub_module->version}}<br>
                                                            <b>Description</b> : {{$sub_module->description}}<br>
                                                            <b>Author</b> : {{$sub_module->author}}<br>
                                                            <b>Status</b> : {{$sub_module->is_active?"Active":"Inactive"}}<br><hr><br>
                                                </table>


                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </li>

                        <?php
                                }
                                ?>
                              </ul>


                </div>
            </div>
        </div>

    </section>


<script>

<!-- for more actions that you can use onclick, please check out demo.js -->



</script>
@endsection

