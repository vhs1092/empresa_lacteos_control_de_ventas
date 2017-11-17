@extends('adminlte::page')
@if($option != "")
@section('content_header')
{!! HighCharts::styles() !!}
@stop
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<!-- optional -->
<script src="http://code.highcharts.com/modules/offline-exporting.js"></script>
@endif
@section('content')


<form id="submit_pdf" action="/statesRequirements/download_pdf" method="post" target="_blank">
   <div class="col-md-3">
      <label class=" control-label">Seleccione Usuario</label>
      {!! Form::select('users',
      $users_arr, $user, [
      'id'=>'select_user',
      'class' => 'form-control col-sm-3 pull-right chosen'
      ]) !!}
   </div>
   <div class="col-md-6" id="optionss">
      <label class=" control-label">Seleccione Reporte</label>
      {!! Form::select('options',
      $options, $option, [
      'id'=>'select_option',
      'class' => 'form-control col-sm-6 pull-right chosen'
      ]) !!}
   </div>
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@if($option != "")
<div class="row">
   <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
      <div class="hpanel">
         <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
               <div class="panel-body">
                  {!! $highchart->html() !!}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
{!! HighCharts::scripts() !!}
{!! $highchart->script() !!}
@endif
@endsection
@section('adminlte_js')
<script type="text/javascript">

$( document ).ready(function() {

if('{{$user}}' == ""){
$("#optionss").hide();
}
});

   var val = "";

   $('select#select_user').change(function () {
   val = $(this).val();
   if(val != ""){
      $("#optionss").show();

   }
   });

   $('select#select_option').change(function () {
   var str = "";
   str = $(this).val();

   if(str != ""){

   var option = '{{$option}}'; 
   if(option != ""){

     var url = window.location.href.replace("UserReports/"+option+"/"+val, "UserReports/"+str+"/"+val);  
   }else{

       var url = window.location.href.replace("UserReports", "UserReports/"+str+"/"+val);
   }
   
   window.location.href = url;
   }
   });

</script>
@stop