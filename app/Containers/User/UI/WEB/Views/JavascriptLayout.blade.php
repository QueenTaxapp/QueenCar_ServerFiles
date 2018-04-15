
@extends('Admin::AdminLogin')
@section('javascript')
   


<?php
if(isset($request))
{
if($request->session()->has('errors'))
        {
            ?>
<script>
 demo.showNotification('top','center','danger','warning', '<?php echo $request->session()->get('errors')->all()[0]; ?>');
</script>
<?php
        }
}
?>


<?php


if(isset($request))
{

if($request->session()->has('success'))
        {
            ?>
<script>
 //demo.showNotification('top','center','danger','warning', '<?php echo $error['message']; ?>');
</script>
<?php
        }

}
?>


@endsection