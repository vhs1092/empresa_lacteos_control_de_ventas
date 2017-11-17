@extends('adminlte::page')

@section('content_header')
    <h1>Reportes</h1>
@stop

@section('content')
	<div class="flex">
			
			<a class="flex-item" href="/GeneralReports"><p>Reporte general</p><img src="{{ url('images/report.png')}}"></a>
			
			<a class="flex-item" href="/UserReports"><p>Reporte de cliente</p><img src="{{ url('images/employee.png')}}"></a>


	</div>
<style type="text/css">
.flex {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}


.flex-item img {
    max-height: 60%;
}
.flex-item{
    width: 300px;
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    background: #03546d;
    margin:  15px;
    color: white;
    font-size: 22px;
}
</style>
@endsection
