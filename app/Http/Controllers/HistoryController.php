<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Aphb;
use App\Cv;
use App\Hibah;
use App\JualBeli;
use App\Nib;
use App\PecahSertifikat;
use App\Penyertifikatan;
use App\PetaBidang;
use App\Pt;
use App\Roya;
use App\Siup;
use App\Waris;

class HistoryController extends Controller
{
    public function user_history()
    {	
    	$nik = Auth()->user()->nik;
    	$data = [
    		'aphb' => Aphb::where('nik',$nik)->get(),
    		'cv' => Cv::where('nik',$nik)->get(),
    		'hibah' => Hibah::where('nik',$nik)->get(),
    		'jualbeli' => JualBeli::where('nik',$nik)->get(),
    		'nib' => Nib::where('nik',$nik)->get(),
    		'pecahsertifikat' => PecahSertifikat::where('nik',$nik)->get(),
    		'penyertifikatan' => Penyertifikatan::where('nik',$nik)->get(),
    		'petabidang' => PetaBidang::where('nik',$nik)->get(),
    		'pt' => Pt::where('nik',$nik)->get(),
    		'roya' => Roya::where('nik',$nik)->get(),
    		'siup' => Siup::where('nik',$nik)->get(),
    		'waris' => Waris::where('nik',$nik)->get(),
    	];
    	// dd($data,$nik);
    	return view('user.History.History',compact('data'));
    }
}
