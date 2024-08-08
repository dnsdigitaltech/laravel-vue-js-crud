<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultaVeiculoController extends Controller
{
    public function index()
    {
    	return view('index');
    }

    public function consultarCep($placa)
    {
    	try {
            $wsdl = "https://XXXXXXXX.asmx?WSDL";
            $options = array(
            "trace" => true,
            "exceptions" => 0,
            "cache_wsdl" => WSDL_CACHE_NONE);
		    $soapClient = new \SoapClient($wsdl, $options);
		    $endereco = $soapClient->ConsultarVeiculo(['placa' => $placa, 'operador' => 'XXX', 'estado' => '']);
		   
		    return response()->json($endereco, 200);
	    } catch (\SoapFault $exception) {
		    return response()->json(['error' => true, 'descrption' => $exception->getMessage()], 500);
	    }
    }
}