<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HighCharts;
use App\Models\User;
use App\Models\Cliente;
use App\Models\TransaccionHeader;

class HighChartController extends Controller
{
     public function index($option = null)
    {	
	
		return view('chart.home');

    }

    public function GeneralReports($option = null){

 $data = "";

	$options = [
	0 => 'Seleccione una opción',
	1 => 'Clientes registrados por mes',
	2 => 'Clientes registrados por año',
	3 => 'Total de transacciones por mes',
	4 => 'Total de transacciones por año',
	5 => 'Total de ingreso de mercaderia por mes',
	6 => 'Total de salida de mercaderia por mes',
	];   


	//START REPORTS

	if($option != ""){
	
	if($option == 1){

	$highchart = HighCharts::database(User::all(), 'pie', 'highcharts')
    ->elementLabel("Total")
    ->title('Clientes registrados por mes')
    ->GroupByMonth();


	}elseif ($option == 2) {
	
	$highchart = HighCharts::database(User::all(), 'bar', 'highcharts')
    ->elementLabel("Total")
    ->title('Clientes registrados por año')
    ->GroupByYear();
	}elseif ($option == 3) {
	
	$highchart = HighCharts::database(TransaccionHeader::all(), 'bar', 'highcharts')
    ->elementLabel("Total")
    ->title('Total de transacciones por mes')
    ->GroupByMonth();
	}elseif ($option == 4) {
	
	$highchart = HighCharts::database(TransaccionHeader::all(), 'bar', 'highcharts')
    ->elementLabel("Total")
    ->title('Total de transacciones por año')
    ->GroupByYear();
	}elseif ($option == 5) {
	
	$highchart = HighCharts::database(TransaccionHeader::whereHas('tipo', function($q) {
    $q->where('tipo', 1);
})->get(), 'bar', 'highcharts')
    ->elementLabel("Total")
    ->title('Total de ingreso de mercaderia por mes')
    ->GroupByMonth();

	}elseif ($option == 6) {
	
	$highchart = HighCharts::database(TransaccionHeader::whereHas('tipo', function($q) {
    $q->where('tipo', 2);
})->get(), 'bar', 'highcharts')
    ->elementLabel("Total")
    ->title('Total de salida de mercaderia por mes')
    ->GroupByMonth();

	}


	}


	return view('chart.index',compact('options', 'data', 'option', 'highchart'));
    		
    }
    
    public function UserReports($option = null, $user = null){



	$options = [
	0 => 'Seleccione una opción',
	1 => 'Total de pedidos por mes',
	2 => 'Total de pedidos por año',
	]; 

	 $users = Cliente::where('status', 1)->get(array(
                'name',
                'id'
            ));

            $users_arr = array();
            $users_arr[""] = "Seleccione cliente";
            foreach ($users as $user_var) {
                $users_arr[$user_var["id"]] = $user_var["name"];
            }

    if($option != ""){
	
	if($option == 1){

	$highchart = HighCharts::database(TransaccionHeader::where('id_cliente', $user)->get(), 'pie', 'highcharts')
    ->elementLabel("Total")
    ->title('Total de pedidos por mes')
    ->GroupByMonth();

	}elseif ($option == 2) {
	$highchart = HighCharts::database(TransaccionHeader::where('id_cliente', $user)->get(), 'bar', 'highcharts')
    ->elementLabel("Total")
    ->title('Total de pedidos por año')
    ->GroupByYear();
	}
	}

	return view('chart.users',compact('user', 'users_arr', 'options', 'data', 'option', 'highchart'));

    }

}