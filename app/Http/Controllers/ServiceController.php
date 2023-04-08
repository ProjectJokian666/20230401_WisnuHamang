<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function Service(){
    	$data = [
    		'jasa'=>[
    			'APHB'=>['id'=>'1','service'=>'APHB'],
    			'CV'=>['id'=>'2','service'=>'CV'],
    			'HIBAH'=>['id'=>'3','service'=>'HIBAH'],
    			'JUAL BELI'=>['id'=>'4','service'=>'JUAL BELI'],
    			'NIB'=>['id'=>'5','service'=>'NIB'],
    			'PECAH SERTIFIKAT'=>['id'=>'6','service'=>'PECAH SERTIFIKAT'],
    			'PENYERTIFIKAT'=>['id'=>'7','service'=>'PENYERTIFIKAT'],
    			'PETABIDANG'=>['id'=>'8','service'=>'PETABIDANG'],
    			'PT'=>['id'=>'9','service'=>'PT'],
    			'ROYA'=>['id'=>'10','service'=>'ROYA'],
    			'SIUP'=>['id'=>'11','service'=>'SIUP'],
    			'WARIS'=>['id'=>'23','service'=>'WARIS'],
    		],
    	];
    	// dd($data,array_keys($data));
    	return view('dashboard.service.service',compact('data'));
    }

    
}
