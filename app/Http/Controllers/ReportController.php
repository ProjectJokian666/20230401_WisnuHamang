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
use PDF;
use DB;

class ReportController extends Controller
{
    public function report()
    {
    	$data = [
    		'aphb' => Aphb::get(),
    		'cv' => Cv::get(),
    		'hibah' => Hibah::get(),
    		'jualbeli' => JualBeli::get(),
    		'nib' => Nib::get(),
    		'pecahsertifikat' => PecahSertifikat::get(),
    		'penyertifikatan' => Penyertifikatan::get(),
    		'petabidang' => PetaBidang::get(),
    		'pt' => Pt::get(),
    		'roya' => Roya::get(),
    		'siup' => Siup::get(),
    		'waris' => Waris::get(),
    	];

        $gjum = [
            'APBH' => Aphb::count(),
            'CV' => Cv::count(),
            'HIBAH' => Hibah::count(),
            'JUALBELI' => JualBeli::count(),
            'NIB' => Nib::count(),
            'PECAHSERTIFIKAT' => PecahSertifikat::count(),
            'PENYERTIFIKATAN' => Penyertifikatan::count(),
            'PETA' => PetaBidang::count(),
            'PT' => Pt::count(),
            'ROYA' => Roya::count(),
            'SIUP' => Siup::count(),
            'WARIS' => Waris::count()
        ];

        $sudah = [
            'APBH' => Aphb::where('status', 1)->count(),
            'CV' => Cv::where('status', 1)->count(),
            'HIBAH' => Hibah::where('status', 1)->count(),
            'JUALBELI' => JualBeli::where('status', 1)->count(),
            'NIB' => Nib::where('status', 1)->count(),
            'PECAHSERTIFIKAT' => PecahSertifikat::where('status', 1)->count(),
            'PENYERTIFIKATAN' => Penyertifikatan::where('status', 1)->count(),
            'PETA' => PetaBidang::where('status', 1)->count(),
            'PT' => Pt::where('status', 1)->count(),
            'ROYA' => Roya::where('status', 1)->count(),
            'SIUP' => Siup::where('status', 1)->count(),
            'WARIS' => Waris::where('status', 1)->count(),
        ];
        $belum = [
            'APBH' => Aphb::where('status', 2)->count(),
            'CV' => Cv::where('status', 2)->count(),
            'HIBAH' => Hibah::where('status', 2)->count(),
            'JUALBELI' => JualBeli::where('status', 2)->count(),
            'NIB' => Nib::where('status', 2)->count(),
            'PECAHSERTIFIKAT' => PecahSertifikat::where('status', 2)->count(),
            'PENYERTIFIKATAN' => Penyertifikatan::where('status', 2)->count(),
            'PETA' => PetaBidang::where('status', 2)->count(),
            'PT' => Pt::where('status', 2)->count(),
            'ROYA' => Roya::where('status', 2)->count(),
            'SIUP' => Siup::where('status', 2)->count(),
            'WARIS' => Waris::where('status', 2)->count(),
        ];

        $grafikindex = [];
        $grafiksudah = [];
        $grafikbelum = [];
        $grafiktotal = [];

        foreach (array_keys($gjum) as $g) {
            //pengisian data index;
            $grafikindex[]=$g;
            //pengisian data sudah;
            $grafiksudah[]=$sudah[$g];
            //pengisian data belum;
            $grafikbelum[]=$belum[$g];
            //pengisian data total;
            $grafiktotal[]=$sudah[$g]+$belum[$g]; 
            // $ig[$gjum] = $belum[$gjum];
            // $ig [] = $gjum;
        }

    	// dd($data,$grafiktotal);
        return view('dashboard.report.report',compact('data','grafikindex','grafiksudah','grafikbelum','grafiktotal'));
    }

    public function cetak()
    {
        // dd(request()->berkas,request()->kondisi);
        $a = '';
        $b = '';
        if (request()->kondisi=='menunggu_verif') {
            $a = 'status';
            $b = '1';
        }
        if (request()->kondisi=='sudah_verif') {
            $a = 'status';
            $b = '2';
        }
        if (request()->kondisi=='menunggu_konfirm') {
            $a = 'pembayaran';
            $b = 'belum';
        }
        if (request()->kondisi=='sudah_konfirm') {
            $a = 'pembayaran';
            $b = 'konfirm';
        }

        $data = [
            'data' => DB::table(request()->berkas)->where($a,$b)->leftjoin('users',request()->berkas.'.nik','users.nik')->get(),
            'tabel' => request()->berkas,
            'kondisi' => ['a'=>$a,'b'=>request()->kondisi],
        ];
        // dd($data);
        $pdf=PDF::loadview('dashboard.report.cetak',compact('data'));
        return $pdf->download('cetak_data_'.request()->berkas);

        return view('dashboard.report.cetak',compact('data'));
    }
}
