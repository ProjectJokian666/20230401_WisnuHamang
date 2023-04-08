<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JualBeli;
use App\Hibah;
use App\Aphb;
use App\Waris;
use App\Roya;
use App\PecahSertifikat;
use App\PetaBidang;
use App\Penyertifikatan;
use App\Pt;
use App\Cv;
use App\Siup;
use App\Nib;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{   

//---------------------------------------------------------//

    public function all(){
        $a = $aphbPedding = Aphb::count();
        $b = $cvPedding = Cv::count();
        $c = $hibahPedding = Hibah::count();
        $d = $jualBeliPedding = JualBeli::count();
        $e = $nibPedding = Nib::count();
        $f = $pecahSertifikatPedding = PecahSertifikat::count();
        $g = $pernyertifikatanPedding = Penyertifikatan::count();
        $h = $petaBidangPedding = PetaBidang::count();
        $i = $ptPedding = Pt::count();
        $j = $royaPedding = Roya::count();
        $k = $siupPedding = Siup::count();
        $l = $warisPedding = Waris::count();

        return 
        $a+
        $b+
        $c+
        $d+
        $e+
        $f+
        $g+
        $h+
        $i+
        $j+
        $k+
        $l;
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $users = User::count();

        //Belum Selesai
        $aphbPedding = Aphb::where('status', 2)->count();
        $cvPedding = Cv::where('status', 2)->count();
        $hibahPedding = Hibah::where('status', 2)->count();
        $jualBeliPedding = JualBeli::where('status', 2)->count();
        $nibPedding = Nib::where('status', 2)->count();
        $pecahSertifikatPedding = PecahSertifikat::where('status', 2)->count();
        $pernyertifikatanPedding = Penyertifikatan::where('status', 2)->count();
        $petaBidangPedding = PetaBidang::where('status', 2)->count();
        $ptPedding = Pt::where('status', 2)->count();
        $royaPedding = Roya::where('status', 2)->count();
        $siupPedding = Siup::where('status', 2)->count();
        $warisPedding = Waris::where('status', 2)->count();

        //Selesai
        $aphbSelesai = Aphb::where('status', 1)->count();
        $cvSelesai = Cv::where('status', 1)->count();
        $hibahSelesai = Hibah::where('status', 1)->count();
        $jualBeliSelesai = JualBeli::where('status', 1)->count();
        $nibSelesai = Nib::where('status', 1)->count();
        $pecahSertifikatSelesai = PecahSertifikat::where('status', 1)->count();
        $pernyertifikatanSelesai = Penyertifikatan::where('status', 1)->count();
        $petaBidangSelesai = PetaBidang::where('status', 1)->count();
        $ptSelesai = Pt::where('status', 1)->count();
        $royaSelesai = Roya::where('status', 1)->count();
        $siupSelesai = Siup::where('status', 1)->count();
        $warisSelesai = Waris::where('status', 1)->count();

        //Total
        $aphbTotal = Aphb::count();
        $cvTotal = Cv::count();
        $hibahTotal = Hibah::count();
        $jualBeliTotal = JualBeli::count();
        $nibTotal = Nib::count();
        $pecahSertifikatTotal = PecahSertifikat::count();
        $pernyertifikatanTotal = Penyertifikatan::count();
        $petaBidangTotal = PetaBidang::count();
        $ptTotal = Pt::count();
        $royaTotal = Roya::count();
        $siupTotal = Siup::count();
        $warisTotal = Waris::count();

        $notif = [
            'APHB' => Aphb::where('notif', 'y')->count(),
            'CV' => Cv::where('notif', 'y')->count(),
            'HIBAH' => Hibah::where('notif', 'y')->count(),
            'JUALBELI' => JualBeli::where('notif', 'y')->count(),
            'NIB' => Nib::where('notif', 'y')->count(),
            'PECAH SERTIFIKAT' => PecahSertifikat::where('notif', 'y')->count(),
            'PERNYERTIFIKATAN' => Penyertifikatan::where('notif', 'y')->count(),
            'PETA BIDANG' => PetaBidang::where('notif', 'y')->count(),
            'PT' => Pt::where('notif', 'y')->count(),
            'ROYA' => Roya::where('notif', 'y')->count(),
            'SIUP' => Siup::where('notif', 'y')->count(),
            'WARIS' => Waris::where('notif', 'y')->count(),
        ];

        $notiflink = [
            'APHB' => 'aphbs',
            'CV' => 'cvs',
            'HIBAH' => 'hibahs',
            'JUALBELI' => 'jualBelis',
            'NIB' => 'nibs',
            'PECAH SERTIFIKAT' => 'pecahSertifikats',
            'PERNYERTIFIKATAN' => 'penyertifikatans',
            'PETA BIDANG' => 'petaBidangs',
            'PT' => 'pts',
            'ROYA' => 'royas',
            'SIUP' => 'siups',
            'WARIS' => 'wariss',
        ];

        // dd(array_keys($notif));

        $belum = [
            'APBH' => $aphbPedding,
            'CV' => $cvPedding,
            'HIBAH' => $hibahPedding,
            'JUALBELI' => $jualBeliPedding,
            'NIB' => $nibPedding,
            'PECAHSERTIFIKAT' => $pecahSertifikatPedding,
            'PENYERTIFIKATAN' => $pernyertifikatanPedding,
            'PETA' => $petaBidangPedding,
            'PT' => $ptPedding,
            'ROYA' => $royaPedding,
            'SIUP' => $siupPedding,
            'WARIS' => $warisPedding,
        ];

        $allbelum = $this->all();

        $sudah = [
            'APBH' => $aphbSelesai,
            'CV' => $cvSelesai,
            'HIBAH' => $hibahSelesai,
            'JUALBELI' => $jualBeliSelesai,
            'NIB' => $nibSelesai,
            'PECAHSERTIFIKAT' => $pecahSertifikatSelesai,
            'PENYERTIFIKATAN' => $pernyertifikatanSelesai,
            'PETA' => $petaBidangSelesai,
            'PT' => $ptSelesai,
            'ROYA' => $royaSelesai,
            'SIUP' => $siupSelesai,
            'WARIS' => $warisSelesai,
        ];

        $allsudah = $this->all();

        // dd($allsudah,$allbelum);
        $gjum = [
            'APBH' => $aphbTotal ,
            'CV' => $cvTotal ,
            'HIBAH' => $hibahTotal ,
            'JUALBELI' => $jualBeliTotal ,
            'NIB' => $nibTotal ,
            'PECAHSERTIFIKAT' => $pecahSertifikatTotal ,
            'PENYERTIFIKATAN' => $pernyertifikatanTotal ,
            'PETA' => $petaBidangTotal ,
            'PT' => $ptTotal ,
            'ROYA' => $royaTotal ,
            'SIUP' => $siupTotal ,
            'WARIS' => $warisTotal
        ];

        // dd(array_keys($gjum));
        //deklarasi array;
        $jumb = [
            'APBH' => $aphbTotal ,
            'CV' => $cvTotal ,
            'HIBAH' => $hibahTotal ,
            'JUALBELI' => $jualBeliTotal ,
            'NIB' => $nibTotal ,
            'PECAHSERTIFIKAT' => $pecahSertifikatTotal ,
            'PENYERTIFIKATAN' => $pernyertifikatanTotal ,
            'PETA' => $petaBidangTotal ,
            'PT' => $ptTotal ,
            'ROYA' => $royaTotal ,
            'SIUP' => $siupTotal ,
            'WARIS' => $warisTotal
        ];

        $jums = [
            'APBH' => $aphbTotal ,
            'CV' => $cvTotal ,
            'HIBAH' => $hibahTotal ,
            'JUALBELI' => $jualBeliTotal ,
            'NIB' => $nibTotal ,
            'PECAHSERTIFIKAT' => $pecahSertifikatTotal ,
            'PENYERTIFIKATAN' => $pernyertifikatanTotal ,
            'PETA' => $petaBidangTotal ,
            'PT' => $ptTotal ,
            'ROYA' => $royaTotal ,
            'SIUP' => $siupTotal ,
            'WARIS' => $warisTotal
        ];

        //Penjumlahan
        $pedding = $aphbPedding + $cvPedding + $hibahPedding + $jualBeliPedding + $nibPedding + $pecahSertifikatPedding + $pernyertifikatanPedding + $petaBidangPedding + $ptPedding + $royaPedding + $siupPedding + $warisPedding;
        $selesai = $aphbSelesai + $cvSelesai + $hibahSelesai + $jualBeliSelesai + $nibSelesai + $pecahSertifikatSelesai + $pernyertifikatanSelesai + $petaBidangSelesai + $ptSelesai + $royaSelesai + $siupSelesai + $warisSelesai;
        $total = $aphbTotal + $cvTotal + $hibahTotal + $jualBeliTotal + $nibTotal + $pecahSertifikatTotal + $pernyertifikatanTotal + $petaBidangTotal + $ptTotal + $royaTotal + $siupTotal + $warisTotal;

        //Bar
        if($total == 0){
            $barPedding = 0 .'%';
            $barSelesai = 0 .'%';
            $barAphb = 0 .'%';
            $barCv = 0 .'%';
            $barHibah = 0 .'%';
            $barJualBeli = 0 .'%';
            $barNib = 0 .'%';
            $barPecahSertifikat = 0 .'%';
            $barPenyertifikatan = 0 .'%';
            $barPetaBidang = 0 . '%';
            $barPt = 0 .'%';
            $barRoya = 0 .'%';
            $barSiup = 0 .'%';
            $barWaris = 0 .'%';
        }

        if($pedding == 0){
            $barPedding = 0 .'%';
        }else{
            $barPedding = $pedding * 100 / $total .'%';
        }

        if($selesai == 0){
            $barSelesai = 0 . '%';
        }else{
            $barSelesai = $selesai * 100 / $total .'%';
        }

        if($aphbPedding == 0){
            $barAphb = 0. . '%';
        }else{
            $barAphb = $aphbPedding * 100 / $aphbTotal .'%';
        }

        if($cvPedding == 0){
            $barCv = 0 . '%';
        }else{
            $barCv = $cvPedding * 100 / $cvTotal .'%';
        }

        if($hibahPedding == 0){
            $barHibah = 0 . '%';
        }else{
            $barHibah = $hibahPedding / $hibahTotal * 100 .'%';
        }

        if($jualBeliPedding == 0){
            $barJualBeli = 0 . '%';
        }else{
            $barJualBeli = $jualBeliPedding * 100 / $jualBeliTotal .'%';
        }

        if($nibPedding == 0){
            $barNib = 0 . '%';
        }else{
            $barNib = $nibPedding * 100 / $nibTotal .'%';
        }

        if($pecahSertifikatPedding == 0 ){
            $barPecahSertifikat = 0 . '%';
        }else{
            $barPecahSertifikat = $pecahSertifikatPedding * 100 / $pecahSertifikatTotal .'%';
        }

        if($pernyertifikatanPedding == 0){
            $barPernyertifikatan = 0 . '%';
        }else{
            $barPernyertifikatan = $pernyertifikatanPedding * 100 / $pernyertifikatanTotal .'%';
        }

        if($petaBidangPedding == 0){
            $barPetaBidang = 0 . '%';
        }else{
            $barPetaBidang = $petaBidangPedding * 100 / $petaBidangTotal . '%';
        }

        if($ptPedding == 0){
            $barPt = 0 . '%';
        }else{
            $barPt = $ptPedding * 100 / $ptTotal .'%';
        }

        if($royaPedding == 0){
            $barRoya = 0 . '%';
        }else{
            $barRoya = $royaPedding * 100 / $royaTotal .'%';
        }

        if($siupPedding == 0){
            $barSiup = 0 . '%';
        }else{
            $barSiup = $siupPedding * 100 / $siupTotal .'%';
        }

        if($warisPedding == 0 ){
            $barWaris = 0 . '%';
        }else{
            $barWaris = $warisPedding * 100 / $warisTotal .'%';
        }

        $a = ['a'=>8,'b'=>2,'d'=>1,'e'=>9,'c'=>1];
        arsort($a);
        // dd($a);
        arsort($belum);
        arsort($sudah);
        arsort($jumb);
        arsort($jums);
        $nbelum = array_keys($belum);
        $nsudah = array_keys($sudah);
        $njumb = array_keys($jumb);
        $njums = array_keys($jums);
        // dd($nama);
        $datsudah = [];
        $datbelum = [];
        $dbelum = [];
        foreach ($nbelum as $nbelum) {
            $bar = 0;
            if ($belum[$nbelum]==0) {
                $bar = 0 . '%';
            }
            else{
                $bar = $belum[$nbelum] * 100 / $jumb[$nbelum].'%';
            }
            $dbelum[]= $nbelum.'-'.$belum[$nbelum].'-'.$bar.'-'.$jumb[$nbelum];
        }
        $dsudah = [];
        foreach ($nsudah as $nsudah) {
            $bar = 0;
            if ($sudah[$nsudah]==0) {
                $bar = 0 . '%';
            }
            else{
                $bar = $sudah[$nsudah] * 100 / $jums[$nsudah].'%';
            }
            $dsudah[]= $nsudah.'-'.$sudah[$nsudah].'-'.$bar.'-'.$jums[$nsudah];
        }
        $a = 0;
        $gfjum =[];
        foreach ($gjum as $gjum) {
            $gfjum[] = $gjum;
            $a = $a +1;
            // echo $gjum.' '.$a.' ';
        }
        $gsudah = [];
        $gbelum = [];
        // dd($ig,$dbelum,$dsudah,'belum',$belum,'sudah',$sudah,'jumb',$jumb,'jums',$jums,'nbelum',$nbelum,'nsudah',$nsudah,'njumb',$njumb,'njums',$njums);
        // dd($nbelum,$nsudah,$njums,$njumb);
        // dd($data);
        $widget = [
            'users' => $users,
            'pedding' => $pedding,
            'barPedding' => $barPedding,
            'total' => $total,
            'barSelesai' => $barSelesai,
            'selesai' => $selesai,
            'aphbPedding' => $aphbPedding,
            'aphbTotal' => $aphbTotal,
            'barAphb' => $barAphb,
            'cvPedding' => $cvPedding,
            'cvTotal' => $cvTotal,
            'barCv' => $barCv,
            'hibahPedding' => $hibahPedding,
            'hibahTotal' => $hibahTotal,
            'barHibah' => $barHibah,
            'jualBeliPedding' => $jualBeliPedding,
            'jualBeliTotal' => $jualBeliTotal,
            'barJualBeli' => $barJualBeli,
            'nibPedding' => $nibPedding,
            'nibTotal' => $nibTotal,
            'barNib' => $barNib,
            'pecahSertifikatPedding' => $pecahSertifikatPedding,
            'pecahSertifikatTotal' => $pecahSertifikatTotal,
            'barPecahSertifikat' => $barPecahSertifikat,
            'pernyertifikatanPedding' => $pernyertifikatanPedding,
            'pernyertifikatanTotal' => $pernyertifikatanTotal,
            'barPernyertifikatan' => $barPernyertifikatan,
            'petaBidangPedding' => $petaBidangPedding,
            'petaBidangTotal' => $petaBidangTotal,
            'barPetaBidang' => $barPetaBidang,
            'ptPedding' => $ptPedding,
            'ptTotal' => $ptTotal,
            'barPt' => $barPt,
            'royaPedding' => $royaPedding,
            'royaTotal' => $royaTotal,
            'barRoya' => $barRoya,
            'siupPedding' => $siupPedding,
            'siupTotal' => $siupTotal,
            'barSiup' => $barSiup,
            'warisPedding' => $warisPedding,
            'warisTotal' => $warisTotal,
            'barWaris' => $barWaris,
            'belum' => $belum,
            'dbelum' => $dbelum,
            'allbelum' => $allbelum,
            'sudah' => $sudah,
            'dsudah' => $dsudah,
            'allsudah' => $allsudah,
            'jumb' => $jumb,
            'jums' => $jums,
            'notif' => $notif,
            'notiflink' => $notiflink,
        ];
        // dd($dsudah);
        //data grafik
        $categories = [];
        $xsudah = [];
        $xbelum = [];
        foreach ($dsudah as $d) {
            $d = explode('-', $d);
            $categories[] = $d[0];
            $xsudah[] = intval($d[1]);
            $xbelum[] = intval($d[3]);
        }

        // dd($widget['dsudah'],$widget['dbelum'],$categories,json_encode($xsudah),$xbelum);
        return view('home', compact('widget'));
    }

//--------------------------------------------------------//   

//--------------------------------------------------------//
//Controller Dashboard - Jual Beli


    // View Data
    public function indexJualBeli(){

        if(auth()->user()->level != 99){
            return abort(404);
        }
        JualBeli::where('notif','y')->update(['notif'=>'b']);
        $data = JualBeli::orderBy('tanggal','asc')->get();
        return view('dashboard.jualBeli.index', compact('data'));
    }


    // Add Data
    public function tambahJualBeli(Request $request){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = new JualBeli;
        $data->tanggal = $request->tanggal;
        $data->nik = $request->nik;
        $data->status = '2';

        if ($request->hasFile('fcKtpPenjual')) {
            $file       = $request->file('fcKtpPenjual');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Jual_Beli/KTP_Penjual', $filename);
            $data->fcKtpPenjual = $filename;
        } else {
            return $request;
            $data->fcKtpPenjual = '';
        }

        if ($request->hasFile('fcKkPenjual')) {
            $file       = $request->file('fcKkPenjual');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Jual_Beli/KK_Penjual', $filename);
            $data->fcKkPenjual = $filename;
        } else {
            return $request;
            $data->fcKkPenjual = '';
        }

        if ($request->hasFile('fcKkPembeli')) {
            $file       = $request->file('fcKkPembeli');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Jual_Beli/KK_Pembeli', $filename);
            $data->fcKkPembeli = $filename;
        } else {
            return $request;
            $data->fcKkPembeli = '';
        }

        if ($request->hasFile('fcKtpPembeli')) {
            $file       = $request->file('fcKtpPembeli');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Jual_Beli/KTP_Pembeli', $filename);
            $data->fcKtpPembeli = $filename;
        } else {
            return $request;
            $data->fcKtpPembeli = '';
        }

        if ($request->hasFile('bukuNikahPenjual')) {
            $file       = $request->file('bukuNikahPenjual');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Jual_Beli/Buku_Nikah_Penjual', $filename);
            $data->bukuNikahPenjual = $filename;
        }elseif($request->bukuNikahPenjual == null){
            $data->bukuNikahPenjual = '';
        } else {
            return $request;
            $data->bukuNikahPenjual = '';
        }

        if ($request->hasFile('fcSertifikat')) {
            $file       = $request->file('fcSertifikat');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Jual_Beli/Sertifikat_FC', $filename);
            $data->fcSertifikat = $filename;
        } else {
            return $request;
            $data->fcSertifikat = '';
        }

        if ($request->hasFile('sertifikatAsli')) {
            $file       = $request->file('sertifikatAsli');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Jual_Beli/Sertifikat_Asli', $filename);
            $data->sertifikatAsli = $filename;
        } else {
            return $request;
            $data->sertifikatAsli = '';
        }

        if ($request->hasFile('pbbTerbaru')) {
            $file       = $request->file('pbbTerbaru');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Jual_Beli/PBB', $filename);
            $data->pbbTerbaru = $filename;
        } else {
            return $request;
            $data->pbbTerbaru = '';
        }

        if ($request->hasFile('fotoLokasi')) {
            $file       = $request->file('fotoLokasi');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Jual_Beli/Lokasi', $filename);
            $data->fotoLokasi = $filename;
        } else {
            return $request;
            $data->fotoLokasi = '';
        }

        if ($request->hasFile('koordinatLokasi')) {
            $file       = $request->file('koordinatLokasi');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Jual_Beli/Koordinat', $filename);
            $data->koordinatLokasi = $filename;
        } else {
            return $request;
            $data->koordinatLokasi = '';
        }
        $data->save();
        Alert::success('Berhasil Menambah Data');
        return redirect('/jualBelis');
    }


    // View Detail
    public function detailJualBeli($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = JualBeli::where('id', $id)->first();
        return view('dashboard.jualBeli.detail', compact('data'));
    }

    // Delete Data
    public function hapusJualBeli($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        JualBeli::find($id)
        ->delete();
        Alert::success('Berhasil Menghapus Data');
        return redirect('/jualBelis');
    }

    // View Edit
    public function editJualBeli($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = JualBeli::where('id', $id)->first();
        return view('dashboard.jualBeli.edit', compact('data'));
    }

    // Update Data
    public function updateJualBeli(Request $request, $id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        JualBeli::where('id', $id)
        ->update([
            'status' => $request->status,
        ]);

        Alert::success('Berhasil Menyimpan Data');
        return redirect('/jualBelis');
    }

    public function bayarJualBeli($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = JualBeli::where('id', $id)->first();
        return view('dashboard.jualBeli.bayar', compact('data'));
    }

    // Konfirmasi Pembayarab
    public function pbayarJualBeli($id)
    {
        JualBeli::where('id',$id)
        ->update([
            'Pembayaran' => 'konfirm',
        ]);
        Alert::success('Berhasil Konfirmasi Data');
        return redirect('/jualBelis');
    }
    public function bayarJualBeliA($id)
    {
        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = JualBeli::where('id', $id)->first();
        // dd($data);
        return view('dashboard.jualBeli.bayarA', compact('data'));
    }     

    public function PbayarJualBeliA(Request $request, $id)
    {   
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('JUALBELI/BAYAR',$filename);
            $bukti = $filename;
        }

        if ($request->ket=='lunas') {
            JualBeli::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }
        else{
            JualBeli::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }

        Alert::success('Success !!!','Upload Behasil Dilakukan');

        return redirect()->back();

        // dd($request,$id);
    }

//--------------------------------------------------------------------//

//--------------------------------------------------------//
//Controller Dashboard - Hibah


    // View Data
    public function indexHibah(){

        if(auth()->user()->level != 99){
            return abort(404);
        }
        Hibah::where('notif','y')->update(['notif'=>'b']);
        $data = Hibah::orderBy('tanggal','asc')->get();
        return view('dashboard.hibah.index', compact('data'));
    }


    // Add Data
    public function tambahHibah(Request $request){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = new Hibah;
        $data->tanggal = $request->tanggal;
        $data->nik = $request->nik;
        $data->status = '2';

        if ($request->hasFile('fcKtpPenerima')) {
            $file       = $request->file('fcKtpPenerima');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Hibah/KTP_Penerima', $filename);
            $data->fcKtpPenerima = $filename;
        } else {
            return $request;
            $data->fcKtpPenerima = '';
        }

        if ($request->hasFile('fcKkPenerima')) {
            $file       = $request->file('fcKkPenerima');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Hibah/KK_Penerima', $filename);
            $data->fcKkPenerima = $filename;
        } else {
            return $request;
            $data->fcKkPenerima = '';
        }

        if ($request->hasFile('fcKkPemberi')) {
            $file       = $request->file('fcKkPemberi');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Hibah/KK_Pemberi', $filename);
            $data->fcKkPemberi = $filename;
        } else {
            return $request;
            $data->fcKkPemberi = '';
        }

        if ($request->hasFile('fcKtpPemberi')) {
            $file       = $request->file('fcKtpPemberi');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Hibah/KTP_Pemberi', $filename);
            $data->fcKtpPemberi = $filename;
        } else {
            return $request;
            $data->fcKtpPemberi = '';
        }

        if ($request->hasFile('bukuNikahPemberi')) {
            $file       = $request->file('bukuNikahPemberi');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Hibah/Buku_Nikah_Pemberi', $filename);
            $data->bukuNikahPemberi = $filename;
        }elseif($request->bukuNikahPemberi == null){
            $data->bukuNikahPemberi = '';
        } else {
            return $request;
            $data->bukuNikahPemberi = '';
        }

        if ($request->hasFile('sertifikatAsli')) {
            $file       = $request->file('sertifikatAsli');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Hibah/Sertifikat_Asli', $filename);
            $data->sertifikatAsli = $filename;
        } else {
            return $request;
            $data->sertifikatAsli = '';
        }

        if ($request->hasFile('pbbTerbaru')) {
            $file       = $request->file('pbbTerbaru');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Hibah/PBB', $filename);
            $data->pbbTerbaru = $filename;
        } else {
            return $request;
            $data->pbbTerbaru = '';
        }

        if ($request->hasFile('fotoLokasi')) {
            $file       = $request->file('fotoLokasi');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Hibah/Lokasi', $filename);
            $data->fotoLokasi = $filename;
        } else {
            return $request;
            $data->fotoLokasi = '';
        }

        if ($request->hasFile('koordinatLokasi')) {
            $file       = $request->file('koordinatLokasi');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Hibah/Koordinat', $filename);
            $data->koordinatLokasi = $filename;
        } else {
            return $request;
            $data->koordinatLokasi = '';
        }
        $data->save();
        Alert::success('Berhasil Menambah Data');
        return redirect('/hibahs');
    }


    // View Detail
    public function detailHibah($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Hibah::where('id', $id)->first();
        return view('dashboard.hibah.detail', compact('data'));
    }

    // Delete Data
    public function hapusHibah($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Hibah::find($id)
        ->delete();
        Alert::success('Berhasil Menghapus Data');
        return redirect('/hibahs');
    }

    // View Edit
    public function editHibah($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Hibah::where('id', $id)->first();
        return view('dashboard.hibah.edit', compact('data'));
    }

    // Update Data
    public function updateHibah(Request $request, $id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Hibah::where('id', $id)
        ->update([
            'status' => $request->status,
        ]);

        Alert::success('Berhasil Menyimpan Data');
        return redirect('/hibahs');
    }

    public function bayarHibah($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Hibah::where('id', $id)->first();
        return view('dashboard.hibah.bayar', compact('data'));
    }

    // Konfirmasi Pembayarab
    public function pbayarHibah($id)
    {
        Hibah::where('id',$id)
        ->update([
            'Pembayaran' => 'konfirm',
        ]);
        Alert::success('Berhasil Konfirmasi Data');
        return redirect('/hibahs');
    }

    public function bayarHibahA($id)
    {
        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Hibah::where('id', $id)->first();
        // dd($data);
        return view('dashboard.hibah.bayarA', compact('data'));
    }     

    public function PbayarHibahA(Request $request, $id)
    {   
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('HIBAH/BAYAR',$filename);
            $bukti = $filename;
        }

        if ($request->ket=='lunas') {
            Hibah::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }
        else{
            Hibah::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }

        Alert::success('Success !!!','Upload Behasil Dilakukan');

        return redirect()->back();

        // dd($request,$id);
    } 

//--------------------------------------------------------------------//

//--------------------------------------------------------//
//Controller Dashboard - APHB


    // View Data
    public function indexAphb(){

        if(auth()->user()->level != 99){
            return abort(404);
        }
        Aphb::where('notif','y')->update(['notif'=>'b']);        
        $data = Aphb::orderBy('tanggal','asc')->get();
        // dd($data);
        return view('dashboard.aphb.index', compact('data'));
    }


    // Add Data
    public function tambahAphb(Request $request){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = new Aphb;
        $data->tanggal = $request->tanggal;
        $data->nik = $request->nik;
        $data->status = '2';

        if ($request->hasFile('fcKtpAhliWaris')) {
            $request->validate([
                'fcKtpAhliWaris' => "required|mimes:pdf",
            ]);
            $file       = $request->file('fcKtpAhliWaris');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('APHB/KTP_Ahli_Waris', $filename);
            $data->fcKtpAhliWaris = $filename;
        } else {
            return $request;
            $data->fcKtpAhliWaris = '';
        }

        if ($request->hasFile('fcKtpPenerima')) {
            $request->validate([
                'fcKtpPenerima' => "required|mimes:pdf",
            ]);
            $file       = $request->file('fcKtpPenerima');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('APHB/KTP_Penerima', $filename);
            $data->fcKtpPenerima = $filename;
        } else {
            return $request;
            $data->fcKtpPenerima = '';
        }

        if ($request->hasFile('fcKkAhliWaris')) {
            $request->validate([
                'fcKkAhliWaris' => "required|mimes:pdf",
            ]);
            $file       = $request->file('fcKkAhliWaris');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('APHB/KK_Ahli_Waris', $filename);
            $data->fcKkAhliWaris = $filename;
        } else {
            return $request;
            $data->fcKkAhliWaris = '';
        }

        if ($request->hasFile('fcKkPenerima')) {
            $request->validate([
                'fcKkPenerima' => "required|mimes:pdf",
            ]);
            $file       = $request->file('fcKkPenerima');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('APHB/KK_Penerima', $filename);
            $data->fcKkPenerima = $filename;
        } else {
            return $request;
            $data->fcKkPenerima = '';
        }

        if ($request->hasFile('sertifikatAsli')) {
            $request->validate([
                'sertifikatAsli' => "required|mimes:pdf",
            ]);
            $file       = $request->file('sertifikatAsli');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('APHB/Sertifikat_Asli', $filename);
            $data->sertifikatAsli = $filename;
        } else {
            return $request;
            $data->sertifikatAsli = '';
        }

        if ($request->hasFile('pbbTerbaru')) {
            $request->validate([
                'pbbTerbaru' => "required|mimes:pdf",
            ]);
            $file       = $request->file('pbbTerbaru');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('APHB/PBB', $filename);
            $data->pbbTerbaru = $filename;
        } else {
            return $request;
            $data->pbbTerbaru = '';
        }

        if ($request->hasFile('fotoLokasi')) {
            $request->validate([
                'fotoLokasi' => "required|mimes:pdf",
            ]);
            $file       = $request->file('fotoLokasi');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('APHB/Lokasi', $filename);
            $data->fotoLokasi = $filename;
        } else {
            return $request;
            $data->fotoLokasi = '';
        }

        if ($request->hasFile('koordinatLokasi')) {
            $request->validate([
                'koordinatLokasi' => "required|mimes:pdf",
            ]);
            $file       = $request->file('koordinatLokasi');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('APHB/Koordinat', $filename);
            $data->koordinatLokasi = $filename;
        } else {
            return $request;
            $data->koordinatLokasi = '';
        }
        $data->save();
        Alert::success('Berhasil Menambah Data');
        return redirect('/aphbs');
    }


    // View Detail
    public function detailAPHB($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Aphb::where('id', $id)->first();
        return view('dashboard.aphb.detail', compact('data'));
    }

    // Delete Data
    public function hapusAPHB($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Aphb::find($id)
        ->delete();
        Alert::success('Berhasil Menghapus Data');
        return redirect('/aphbs');
    }

    // View Edit
    public function editAPHB($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Aphb::where('id', $id)->first();
        return view('dashboard.aphb.edit', compact('data'));
    }

    // Update Data
    public function updateAPHB(Request $request, $id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Aphb::where('id', $id)
        ->update([
            'status' => $request->status,
        ]);

        Alert::success('Berhasil Menyimpan Data');
        return redirect('/aphbs');
    }

    public function bayarAPHB($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Aphb::where('id', $id)->first();
        return view('dashboard.aphb.bayar', compact('data'));
    }

    // Konfirmasi Pembayarab
    public function pbayarAPHB($id)
    {
        Aphb::where('id',$id)
        ->update([
            'Pembayaran' => 'konfirm',
        ]);
        Alert::success('Berhasil Konfirmasi Data');
        return redirect('/aphbs');
    }

    public function bayarAPHBA($id)
    {
        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Aphb::where('id', $id)->first();
        // dd($data);
        return view('dashboard.aphb.bayarA', compact('data'));
    }     

    public function PbayarAPHBA(Request $request, $id)
    {   
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('APHB/BAYAR',$filename);
            $bukti = $filename;
        }

        if ($request->ket=='lunas') {
            Aphb::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }
        else{
            Aphb::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }

        Alert::success('Success !!!','Upload Behasil Dilakukan');

        return redirect()->back();

        // dd($request,$id);
    }  

//--------------------------------------------------------------------//

//--------------------------------------------------------//
//Controller Dashboard - PT


    // View Data
    public function indexPt(){

        if(auth()->user()->level != 99){
            return abort(404);
        }
        Hibah::where('notif','y')->update(['notif'=>'b']);
        $data = Pt::orderBy('tanggal','asc')->get();
        return view('dashboard.pt.index', compact('data'));
    }


    // Add Data
    public function tambahPt(Request $request){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = new Pt;
        $data->tanggal = $request->tanggal;
        $data->nik = $request->nik;
        $data->status = '2';

        if ($request->hasFile('fcKtpPengurus1')) {
            $file       = $request->file('fcKtpPengurus1');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('PT/KTP_Pengurus', $filename);
            $data->fcKtpPengurus1 = $filename;
        } else {
            return $request;
            $data->fcKtpPengurus1 = '';
        }

        if ($request->hasFile('fcKtpPengurus2')) {
            $file       = $request->file('fcKtpPengurus2');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('PT/KTP_Pengurus', $filename);
            $data->fcKtpPengurus2 = $filename;
        } else {
            return $request;
            $data->fcKtpPengurus2 = '';
        }

        if ($request->hasFile('fcKkPengurus1')) {
            $file       = $request->file('fcKkPengurus1');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('PT/KK_Pengurus', $filename);
            $data->fcKKPengurus1 = $filename;
        } else {
            return $request;
            $data->fcKKPengurus1 = '';
        }

        if ($request->hasFile('fcKkPengurus2')) {
            $file       = $request->file('fcKkPengurus2');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('PT/KK_Pengurus', $filename);
            $data->fcKKPengurus2 = $filename;
        } else {
            return $request;
            $data->fcKKPengurus2 = '';
        }

        if ($request->hasFile('npwp')) {
            $file       = $request->file('npwp');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('PT/NPWP', $filename);
            $data->npwp = $filename;
        } else {
            return $request;
            $data->npwp = '';
        }
        $data->save();
        Alert::success('Berhasil Menambah Data');
        return redirect('/pts');
    }


    // View Detail
    public function detailPt($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Pt::where('id', $id)->first();
        return view('dashboard.pt.detail', compact('data'));
    }

    // Delete Data
    public function hapusPt($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Pt::find($id)
        ->delete();
        Alert::success('Berhasil Menghapus Data');
        return redirect('/pts');
    }

    // View Edit
    public function editPt($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Pt::where('id', $id)->first();
        return view('dashboard.pt.edit', compact('data'));
    }

    // Update Data
    public function updatePt(Request $request, $id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Pt::where('id', $id)
        ->update([
            'status' => $request->status,
        ]);

        Alert::success('Berhasil Menyimpan Data');
        return redirect('/pts');
    }

    public function bayarPt($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Pt::where('id', $id)->first();
        return view('dashboard.pt.bayar', compact('data'));
    }

    // Konfirmasi Pembayarab
    public function pbayarPt($id)
    {
        Pt::where('id',$id)
        ->update([
            'Pembayaran' => 'konfirm',
        ]);
        Alert::success('Berhasil Konfirmasi Data');
        return redirect('/pts');
    }
    public function bayarPtA($id)
    {
        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Pt::where('id', $id)->first();
        // dd($data);
        return view('dashboard.Pt.bayarA', compact('data'));
    }     

    public function PbayarPtA(Request $request, $id)
    {   
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($request);
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('PT/BAYAR',$filename);
            $bukti = $filename;
        }

        if ($request->ket=='lunas') {
            Pt::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }
        else{
            Pt::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }

        Alert::success('Success !!!','Upload Behasil Dilakukan');

        return redirect()->back();

        // dd($request,$id);
    }

//--------------------------------------------------------------------//

//--------------------------------------------------------//
//Controller Dashboard - CV


    // View Data
    public function indexCv(){

        if(auth()->user()->level != 99){
            return abort(404);
        }
        Cv::where('notif','y')->update(['notif'=>'b']);
        $data = Cv::orderBy('tanggal','asc')->get();
        // dd($data);
        return view('dashboard.cv.index', compact('data'));
    }


    // Add Data
    public function tambahCv(Request $request){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = new Cv;
        $data->tanggal = $request->tanggal;
        $data->nik = $request->nik;
        $data->status = '2';

        if ($request->hasFile('fcKtpPengurus1')) {
            $file       = $request->file('fcKtpPengurus1');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('CV/KTP_Pengurus', $filename);
            $data->fcKtpPengurus1 = $filename;
        } else {
            return $request;
            $data->fcKtpPengurus1 = '';
        }

        if ($request->hasFile('fcKtpPengurus2')) {
            $file       = $request->file('fcKtpPengurus2');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('CV/KTP_Pengurus', $filename);
            $data->fcKtpPengurus2 = $filename;
        } else {
            return $request;
            $data->fcKtpPengurus2 = '';
        }

        if ($request->hasFile('fcKkPengurus1')) {
            $file       = $request->file('fcKkPengurus1');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('CV/KK_Pengurus', $filename);
            $data->fcKKPengurus1 = $filename;
        } else {
            return $request;
            $data->fcKKPengurus1 = '';
        }

        if ($request->hasFile('fcKkPengurus2')) {
            $file       = $request->file('fcKkPengurus2');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('CV/KK_Pengurus', $filename);
            $data->fcKKPengurus2 = $filename;
        } else {
            return $request;
            $data->fcKKPengurus2 = '';
        }

        if ($request->hasFile('npwp')) {
            $file       = $request->file('npwp');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('CV/NPWP', $filename);
            $data->npwp = $filename;
        } else {
            return $request;
            $data->npwp = '';
        }
        $data->save();
        Alert::success('Berhasil Menambah Data');
        return redirect('/cvs');
    }


    // View Detail
    public function detailCv($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Cv::where('id', $id)->first();
        return view('dashboard.cv.detail', compact('data'));
    }

    // Delete Data
    public function hapusCv($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Cv::find($id)
        ->delete();
        Alert::success('Berhasil Menghapus Data');
        return redirect('/cvs');
    }

    // View Edit
    public function editCv($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Cv::where('id', $id)->first();
        return view('dashboard.cv.edit', compact('data'));
    }

    // Update Data
    public function updateCv(Request $request, $id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Cv::where('id', $id)
        ->update([
            'status' => $request->status,
        ]);

        Alert::success('Berhasil Menyimpan Data');
        return redirect('/cvs');
    }

    public function bayarCv($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Cv::where('id', $id)->first();
        return view('dashboard.cv.bayar', compact('data'));
    }

    // Konfirmasi Pembayarab
    public function pbayarCv($id)
    {
        Cv::where('id',$id)
        ->update([
            'Pembayaran' => 'konfirm',
        ]);
        Alert::success('Berhasil Konfirmasi Data');
        return redirect('/cvs');
    }

    public function bayarCvA($id)
    {
        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Cv::where('id', $id)->first();
        // dd($data);
        return view('dashboard.cv.bayarA', compact('data'));
    }     

    public function PbayarCvA(Request $request, $id)
    {   
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('CV/BAYAR',$filename);
            $bukti = $filename;
        }

        if ($request->ket=='lunas') {
            Cv::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }
        else{
            Cv::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }

        Alert::success('Success !!!','Upload Behasil Dilakukan');

        return redirect()->back();

        // dd($request,$id);
    }   

//--------------------------------------------------------------------//

//--------------------------------------------------------//
//Controller Dashboard - SIUP


    // View Data
    public function indexSiup(){

        if(auth()->user()->level != 99){
            return abort(404);
        }
        Siup::where('notif','y')->update(['notif'=>'b']);
        $data = Siup::
        orderBy('tanggal','asc')->get();
        // dd($data);
        return view('dashboard.siup.index', compact('data'));
    }


    // Add Data
    public function tambahSiup(Request $request){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = new Siup;
        $data->tanggal = $request->tanggal;
        $data->nik = $request->nik;
        $data->status = '2';

        if ($request->hasFile('fcKtpPengurus1')) {
            $file       = $request->file('fcKtpPengurus1');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('SIUP/KTP_Pengurus', $filename);
            $data->fcKtpPengurus1 = $filename;
        } else {
            return $request;
            $data->fcKtpPengurus1 = '';
        }

        if ($request->hasFile('fcKtpPengurus2')) {
            $file       = $request->file('fcKtpPengurus2');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('SIUP/KTP_Pengurus', $filename);
            $data->fcKtpPengurus2 = $filename;
        } else {
            return $request;
            $data->fcKtpPengurus2 = '';
        }

        if ($request->hasFile('fcKkPengurus1')) {
            $file       = $request->file('fcKkPengurus1');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('SIUP/KK_Pengurus', $filename);
            $data->fcKKPengurus1 = $filename;
        } else {
            return $request;
            $data->fcKKPengurus1 = '';
        }

        if ($request->hasFile('fcKkPengurus2')) {
            $file       = $request->file('fcKkPengurus2');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('SIUP/KK_Pengurus', $filename);
            $data->fcKKPengurus2 = $filename;
        } else {
            return $request;
            $data->fcKKPengurus2 = '';
        }

        if ($request->hasFile('npwp')) {
            $file       = $request->file('npwp');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('SIUP/NPWP', $filename);
            $data->npwp = $filename;
        } else {
            return $request;
            $data->npwp = '';
        }
        $data->save();
        Alert::success('Berhasil Menambah Data');
        return redirect('/siups');
    }


    // View Detail
    public function detailSiup($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Siup::where('id', $id)->first();
        return view('dashboard.siup.detail', compact('data'));
    }

    // Delete Data
    public function hapusSiup($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Siup::find($id)
        ->delete();
        Alert::success('Berhasil Menghapus Data');
        return redirect('/siups');
    }

    // View Edit
    public function editSiup($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Siup::where('id', $id)->first();
        return view('dashboard.siup.edit', compact('data'));
    }

    // Update Data
    public function updateSiup(Request $request, $id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Siup::where('id', $id)
        ->update([
            'status' => $request->status,
        ]);

        Alert::success('Berhasil Menyimpan Data');
        return redirect('/siups');
    }

    public function bayarSiup($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Siup::where('id', $id)->first();
        return view('dashboard.siup.bayar', compact('data'));
    }

    // Konfirmasi Pembayarab
    public function pbayarSiup($id)
    {
        Siup::where('id',$id)
        ->update([
            'Pembayaran' => 'konfirm',
        ]);
        Alert::success('Berhasil Konfirmasi Data');
        return redirect('/siups');
    }
    public function bayarSiupA($id)
    {
        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Siup::where('id', $id)->first();
        // dd($data);
        return view('dashboard.Siup.bayarA', compact('data'));
    }     

    public function PbayarSiupA(Request $request, $id)
    {   
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($request);
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('SIUP/BAYAR',$filename);
            $bukti = $filename;
        }

        if ($request->ket=='lunas') {
            Siup::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }
        else{
            Siup::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }

        Alert::success('Success !!!','Upload Behasil Dilakukan');

        return redirect()->back();

        // dd($request,$id);
    }

//--------------------------------------------------------------------//

//--------------------------------------------------------//
//Controller Dashboard - NIB


    // View Data
    public function indexNib(){

        if(auth()->user()->level != 99){
            return abort(404);
        }
        Nib::where('notif','y')->update(['notif'=>'b']);
        $data = Nib::orderBy('tanggal','asc')->get();
        return view('dashboard.nib.index', compact('data'));
    }


    // Add Data
    public function tambahNib(Request $request){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = new Nib;
        $data->tanggal = $request->tanggal;
        $data->nik = $request->nik;
        $data->status = '2';

        if ($request->hasFile('fcKtpPengurus1')) {
            $file       = $request->file('fcKtpPengurus1');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('NIB/KTP_Pengurus', $filename);
            $data->fcKtpPengurus1 = $filename;
        } else {
            return $request;
            $data->fcKtpPengurus1 = '';
        }

        if ($request->hasFile('fcKtpPengurus2')) {
            $file       = $request->file('fcKtpPengurus2');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('NIB/KTP_Pengurus', $filename);
            $data->fcKtpPengurus2 = $filename;
        } else {
            return $request;
            $data->fcKtpPengurus2 = '';
        }

        if ($request->hasFile('fcKkPengurus1')) {
            $file       = $request->file('fcKkPengurus1');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('NIB/KK_Pengurus', $filename);
            $data->fcKKPengurus1 = $filename;
        } else {
            return $request;
            $data->fcKKPengurus1 = '';
        }

        if ($request->hasFile('fcKkPengurus2')) {
            $file       = $request->file('fcKkPengurus2');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('NIB/KK_Pengurus', $filename);
            $data->fcKkPengurus2 = $filename;
        } else {
            return $request;
            $data->fcKkPengurus2 = '';
        }

        if ($request->hasFile('npwp')) {
            $file       = $request->file('npwp');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('NIB/NPWP', $filename);
            $data->npwp = $filename;
        } else {
            return $request;
            $data->npwp = '';
        }
        $data->save();
        Alert::success('Berhasil Menambah Data');
        return redirect('/nibs');
    }


    // View Detail
    public function detailNib($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Nib::where('id', $id)->first();
        return view('dashboard.nib.detail', compact('data'));
    }

    // Delete Data
    public function hapusNib($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Nib::find($id)
        ->delete();
        Alert::success('Berhasil Menghapus Data');
        return redirect('/nibs');
    }

    // View Edit
    public function editNib($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Nib::where('id', $id)->first();
        return view('dashboard.nib.edit', compact('data'));
    }

    // Update Data
    public function updateNib(Request $request, $id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Nib::where('id', $id)
        ->update([
            'status' => $request->status,
        ]);

        Alert::success('Berhasil Menyimpan Data');
        return redirect('/nibs');
    }

    public function bayarNib($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Nib::where('id', $id)->first();
        return view('dashboard.nib.bayar', compact('data'));
    }

    // Konfirmasi Pembayarab
    public function pbayarNib($id)
    {
        Nib::where('id',$id)
        ->update([
            'Pembayaran' => 'konfirm',
        ]);
        Alert::success('Berhasil Konfirmasi Data');
        return redirect('/nibs');
    }
    public function bayarNibA($id)
    {
        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Nib::where('id', $id)->first();
        // dd($data);
        return view('dashboard.nib.bayarA', compact('data'));
    }     

    public function PbayarNibA(Request $request, $id)
    {   
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('NIB/BAYAR',$filename);
            $bukti = $filename;
        }

        if ($request->ket=='lunas') {
            Nib::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }
        else{
            Nib::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }

        Alert::success('Success !!!','Upload Behasil Dilakukan');

        return redirect()->back();

        // dd($request,$id);
    }

//--------------------------------------------------------------------//

//--------------------------------------------------------//
//Controller Dashboard - Pecah Sertifikat


    // View Data
    public function indexPecahSertifikat(){

        if(auth()->user()->level != 99){
            return abort(404);
        }
        PecahSertifikat::where('notif','y')->update(['notif'=>'b']);
        $data = PecahSertifikat::orderBy('tanggal','asc')->get();
        return view('dashboard.pecahSertifikat.index', compact('data'));
    }


    // Add Data
    public function tambahPecahSertifikat(Request $request){

        if(auth()->user()->level != 99){
            return abort(404);
        }
        // dd($request);

        $data = new pecahSertifikat;
        $data->tanggal = $request->tanggal;
        $data->nik = $request->nik;
        $data->status = '2';

        if ($request->hasFile('fcKtp')) {
            $file       = $request->file('fcKtp');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Pecah_Sertifikat/KTP', $filename);
            $data->fcKtp = $filename;
        } else {
            return $request;
            $data->fcKtp = '';
        }

        if ($request->hasFile('fcKk')) {
            $file       = $request->file('fcKk');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Pecah_Sertifikat/KK', $filename);
            $data->fcKk = $filename;
        } else {
            return $request;
            $data->fcKk = '';
        }

        if ($request->hasFile('sertifikatAsli')) {
            $file       = $request->file('sertifikatAsli');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Pecah_Sertifikat/Sertifikat_Asli', $filename);
            $data->sertifikatAsli = $filename;
        } else {
            return $request;
            $data->sertifikatAsli = '';
        }

        if ($request->hasFile('pbbTerbaru')) {
            $file       = $request->file('pbbTerbaru');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Pecah_Sertifikat/PBB', $filename);
            $data->pbbTerbaru = $filename;
        } else {
            return $request;
            $data->pbbTerbaru = '';
        }

        if ($request->hasFile('fotoLokasi')) {
            $file       = $request->file('fotoLokasi');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Pecah_Sertifikat/Lokasi', $filename);
            $data->fotoLokasi = $filename;
        } else {
            return $request;
            $data->fotoLokasi = '';
        }

        $data->save();
        Alert::success('Berhasil Menambah Data');
        return redirect('/pecahSertifikats');
    }


    // View Detail
    public function detailPecahSertifikat($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = PecahSertifikat::where('id', $id)->first();
        return view('dashboard.pecahSertifikat.detail', compact('data'));
    }

    // Delete Data
    public function hapusPecahSertifikat($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        PecahSertifikat::find($id)
        ->delete();
        Alert::success('Berhasil Menghapus Data');
        return redirect('/pecahSertifikats');
    }

    // View Edit
    public function editPecahSertifikat($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = PecahSertifikat::where('id', $id)->first();
        return view('dashboard.pecahSertifikat.edit', compact('data'));
    }

    // Update Data
    public function updatePecahSertifikat(Request $request, $id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        PecahSertifikat::where('id', $id)
        ->update([
            'status' => $request->status,
        ]);

        Alert::success('Berhasil Menyimpan Data');
        return redirect('/pecahSertifikats');
    }

    public function bayarPecahSertifikat($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = PecahSertifikat::where('id', $id)->first();
        return view('dashboard.pecahSertifikat.bayar', compact('data'));
    }

    // Konfirmasi Pembayarab
    public function pbayarPecahSertifikat($id)
    {
        PecahSertifikat::where('id',$id)
        ->update([
            'Pembayaran' => 'konfirm',
        ]);
        Alert::success('Berhasil Konfirmasi Data');
        return redirect('/pecahSertifikats');
    }
    public function bayarPecahSertifikatA($id)
    {
        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = PecahSertifikat::where('id', $id)->first();
        // dd($data);
        return view('dashboard.pecahSertifikat.bayarA', compact('data'));
    }     

    public function PbayarPecahSertifikatA(Request $request, $id)
    {   
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('PECAHSERTIFIKAT/BAYAR',$filename);
            $bukti = $filename;
        }

        if ($request->ket=='lunas') {
            PecahSertifikat::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }
        else{
            PecahSertifikat::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }

        Alert::success('Success !!!','Upload Behasil Dilakukan');

        return redirect()->back();

        // dd($request,$id);
    }

//--------------------------------------------------------------------//

//--------------------------------------------------------//
//Controller Dashboard - Penyertifikatan


    // View Data
    public function indexPenyertifikatan(){

        if(auth()->user()->level != 99){
            return abort(404);
        }
        Penyertifikatan::where('notif','y')->update(['notif'=>'b']);
        $data = Penyertifikatan::orderBy('tanggal','asc')->get();
        return view('dashboard.penyertifikatan.index', compact('data'));
    }


    // Add Data
    public function tambahPenyertifikatan(Request $request){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = new Penyertifikatan;
        $data->tanggal = $request->tanggal;
        $data->nik = $request->nik;
        $data->status = '2';

        if ($request->hasFile('fcSurat')) {
            $file       = $request->file('fcSurat');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Penyertifikatan/Surat', $filename);
            $data->fcSurat = $filename;
        } else {
            return $request;
            $data->fcSurat = '';
        }

        if ($request->hasFile('fcKtpPemohon')) {
            $file       = $request->file('fcKtpPemohon');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Penyertifikatan/KTP_Pemohon', $filename);
            $data->fcKtpPemohon = $filename;
        } else {
            return $request;
            $data->fcKtpPemohon = '';
        }

        if ($request->hasFile('fcKkPemohon')) {
            $file       = $request->file('fcKkPemohon');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Penyertifikatan/KK_Pemohon', $filename);
            $data->fcKkPemohon = $filename;
        } else {
            return $request;
            $data->fcKkPemohon = '';
        }

        if ($request->hasFile('kematian')) {
            $file       = $request->file('kematian');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Penyertifikatan/Kematian', $filename);
            $data->kematian = $filename;
        } else {
            return $request;
            $data->kematian = '';
        }
        $data->save();
        Alert::success('Berhasil Menambah Data');
        return redirect('/penyertifikatans');
    }


    // View Detail
    public function detailPenyertifikatan($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Penyertifikatan::where('id', $id)->first();
        return view('dashboard.penyertifikatan.detail', compact('data'));
    }

    // Delete Data
    public function hapusPenyertifikatan($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Penyertifikatan::find($id)
        ->delete();
        Alert::success('Berhasil Menghapus Data');
        return redirect('/penyertifikatans');
    }

    // View Edit
    public function editPenyertifikatan($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Penyertifikatan::where('id', $id)->first();
        return view('dashboard.penyertifikatan.edit', compact('data'));
    }

    // Update Data
    public function updatePenyertifikatan(Request $request, $id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Penyertifikatan::where('id', $id)
        ->update([
            'status' => $request->status,
        ]);

        Alert::success('Berhasil Menyimpan Data');
        return redirect('/penyertifikatans');
    }



    public function bayarPenyertifikatan($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Penyertifikatan::where('id', $id)->first();
        return view('dashboard.penyertifikatan.bayar', compact('data'));
    }

    // Konfirmasi Pembayarab
    public function pbayarPenyertifikatan($id)
    {
        Penyertifikatan::where('id',$id)
        ->update([
            'Pembayaran' => 'konfirm',
        ]);
        Alert::success('Berhasil Konfirmasi Data');
        return redirect('/penyertifikatans');
    }
    public function bayarPenyertifikatanA($id)
    {
        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Penyertifikatan::where('id', $id)->first();
        // dd($data);
        return view('dashboard.penyertifikatan.bayarA', compact('data'));
    }     

    public function PbayarPenyertifikatanA(Request $request, $id)
    {   
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($request);
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('PENYERTIFIKATAN/BAYAR',$filename);
            $bukti = $filename;
        }

        if ($request->ket=='lunas') {
            Penyertifikatan::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }
        else{
            Penyertifikatan::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }

        Alert::success('Success !!!','Upload Behasil Dilakukan');

        return redirect()->back();

        // dd($request,$id);
    }

//--------------------------------------------------------------------//

//--------------------------------------------------------//
//Controller Dashboard - Peta Bidang


    // View Data
    public function indexPetaBidang(){

        if(auth()->user()->level != 99){
            return abort(404);
        }
        PetaBidang::where('notif','y')->update(['notif'=>'b']);
        $data = PetaBidang::orderBy('tanggal','asc')->get();
        return view('dashboard.petaBidang.index', compact('data'));
    }


    // Add Data
    public function tambahPetaBidang(Request $request){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = new PetaBidang;
        $data->tanggal = $request->tanggal;
        $data->nik = $request->nik;
        $data->status = '2';

        if ($request->hasFile('fcSurat')) {
            $file       = $request->file('fcSurat');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Peta_Bidang/Surat', $filename);
            $data->fcSurat = $filename;
        } else {
            return $request;
            $data->fcSurat = '';
        }

        if ($request->hasFile('fcKtpPemohon')) {
            $file       = $request->file('fcKtpPemohon');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Peta_Bidang/KTP_Pemohon', $filename);
            $data->fcKtpPemohon = $filename;
        } else {
            return $request;
            $data->fcKtpPemohon = '';
        }

        if ($request->hasFile('fcKkPemohon')) {
            $file       = $request->file('fcKkPemohon');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Peta_Bidang/KK_Pemohon', $filename);
            $data->fcKkPemohon = $filename;
        } else {
            return $request;
            $data->fcKkPemohon = '';
        }

        if ($request->hasFile('pbbTerbaru')) {
            $file       = $request->file('pbbTerbaru');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Peta_Bidang/PBB', $filename);
            $data->pbbTerbaru = $filename;
        } else {
            return $request;
            $data->pbbTerbaru = '';
        }

        if ($request->hasFile('fotoLokasi')) {
            $file       = $request->file('fotoLokasi');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Peta_Bidang/Lokasi', $filename);
            $data->fotoLokasi = $filename;
        } else {
            return $request;
            $data->fotoLokasi = '';
        }

        if ($request->hasFile('fotoPatok')) {
            $file       = $request->file('fotoPatok');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Peta_Bidang/Foto_Patok', $filename);
            $data->fotoPatok = $filename;
        } else {
            return $request;
            $data->fotoPatok = '';
        }
        $data->save();
        Alert::success('Berhasil Menambah Data');
        return redirect('petaBidangs');
    }


    // View Detail
    public function detailPetaBidang($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = PetaBidang::where('id', $id)->first();
        return view('dashboard.petaBidang.detail', compact('data'));
    }

    // Delete Data
    public function hapusPetaBidang($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        PetaBidang::find($id)
        ->delete();
        Alert::success('Berhasil Menghapus Data');
        return redirect('petaBidangs');
    }

    // View Edit
    public function editPetaBidang($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = PetaBidang::where('id', $id)->first();
        return view('dashboard.petaBidang.edit', compact('data'));
    }

    // Update Data
    public function updatePetaBidang(Request $request, $id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        PetaBidang::where('id', $id)
        ->update([
            'status' => $request->status,
        ]);

        Alert::success('Berhasil Menyimpan Data');
        return redirect('petaBidangs');
    }

    public function bayarPetaBidang($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = PetaBidang::where('id', $id)->first();
        return view('dashboard.petaBidang.bayar', compact('data'));
    }

    // Konfirmasi Pembayarab
    public function pbayarPetaBidang($id)
    {
        PetaBidang::where('id',$id)
        ->update([
            'Pembayaran' => 'konfirm',
        ]);
        Alert::success('Berhasil Konfirmasi Data');
        return redirect('/petaBidangs');
    }
    public function bayarPetaBidangA($id)
    {
        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = PetaBidang::where('id', $id)->first();
        // dd($data);
        return view('dashboard.petaBidang.bayarA', compact('data'));
    }     

    public function PbayarPetaBidangA(Request $request, $id)
    {   
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($request);
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('PETABIDANG/BAYAR',$filename);
            $bukti = $filename;
        }

        if ($request->ket=='lunas') {
            PetaBidang::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }
        else{
            PetaBidang::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }

        Alert::success('Success !!!','Upload Behasil Dilakukan');

        return redirect()->back();

        // dd($request,$id);
    }

//--------------------------------------------------------------------//

//--------------------------------------------------------//
//Controller Dashboard - Roya


    // View Data
    public function indexRoya(){

        if(auth()->user()->level != 99){
            return abort(404);
        }
        Roya::where('notif','y')->update(['notif'=>'b']);
        $data = Roya::orderBy('tanggal','asc')->get();
        return view('dashboard.roya.index', compact('data'));
    }


    // Add Data
    public function tambahRoya(Request $request){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = new Roya;
        $data->tanggal = $request->tanggal;
        $data->nik = $request->nik;
        $data->status = '2';

        if ($request->hasFile('fcKtp')) {
            $file       = $request->file('fcKtp');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Roya/KTP', $filename);
            $data->fcKtp = $filename;
        } else {
            return $request;
            $data->fcKtp = '';
        }

        if ($request->hasFile('fcKk')) {
            $file       = $request->file('fcKk');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Roya/KK', $filename);
            $data->fcKk = $filename;
        } else {
            return $request;
            $data->fcKk = '';
        }

        if ($request->hasFile('suratPermohonan')) {
            $file       = $request->file('suratPermohonan');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Roya/Surat_Permohonan', $filename);
            $data->suratPermohonan = $filename;
        } else {
            return $request;
            $data->suratPermohonan = '';
        }

        if ($request->hasFile('suratLunas')) {
            $file       = $request->file('suratLunas');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Roya/Surat_Lunas', $filename);
            $data->suratLunas = $filename;
        } else {
            return $request;
            $data->suratLunas = '';
        }

        if ($request->hasFile('ktpPetugas')) {
            $file       = $request->file('ktpPetugas');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Roya/KTP_Petugas', $filename);
            $data->ktpPetugas = $filename;
        } else {
            return $request;
            $data->ktpPetugas = '';
        }

        if ($request->hasFile('sertifikatAsli')) {
            $file       = $request->file('sertifikatAsli');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Roya/Sertifikat_Asli', $filename);
            $data->sertifikatAsli = $filename;
        } else {
            return $request;
            $data->sertifikatAsli = '';
        }

        $data->save();
        Alert::success('Berhasil Menambah Data');
        return redirect('/royas');
    }

    // View Detail
    public function detailRoya($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Roya::where('id', $id)->first();
        return view('dashboard.roya.detail', compact('data'));
    }

    // Delete Data
    public function hapusRoya($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Roya::find($id)
        ->delete();
        Alert::success('Berhasil Menghapus Data');
        return redirect('/royas');
    }

    // View Edit
    public function editRoya($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Roya::where('id', $id)->first();
        return view('dashboard.roya.edit', compact('data'));
    }

    // Update Data
    public function updateRoya(Request $request, $id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Roya::where('id', $id)
        ->update([
            'status' => $request->status,
        ]);

        Alert::success('Berhasil Menyimpan Data');
        return redirect('/royas');
    }

    public function bayarRoya($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Roya::where('id', $id)->first();
        return view('dashboard.roya.bayar', compact('data'));
    }

    // Konfirmasi Pembayarab
    public function pbayarRoya($id)
    {
        Roya::where('id',$id)
        ->update([
            'Pembayaran' => 'konfirm',
        ]);
        Alert::success('Berhasil Konfirmasi Data');
        return redirect('/royas');
    }
    public function bayarRoyaA($id)
    {
        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Roya::where('id', $id)->first();
        // dd($data);
        return view('dashboard.Roya.bayarA', compact('data'));
    }     

    public function PbayarRoyaA(Request $request, $id)
    {   
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($request);
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('ROYA/BAYAR',$filename);
            $bukti = $filename;
        }

        if ($request->ket=='lunas') {
            Roya::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }
        else{
            Roya::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }

        Alert::success('Success !!!','Upload Behasil Dilakukan');

        return redirect()->back();

        // dd($request,$id);
    }

//--------------------------------------------------------------------//

//--------------------------------------------------------//
//Controller Dashboard - Waris


    // View Data
    public function indexWaris(){

        if(auth()->user()->level != 99){
            return abort(404);
        }
        Waris::where('notif','y')->update(['notif'=>'b']);
        $data = Waris::orderBy('tanggal','asc')->get();
        return view('dashboard.waris.index', compact('data'));
    }


    // Add Data
    public function tambahWaris(Request $request){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = new Waris;
        $data->tanggal = $request->tanggal;
        $data->nik = $request->nik;
        $data->status = '2';

        if ($request->hasFile('fcKtpAhliWaris')) {
            $file       = $request->file('fcKtpAhliWaris');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Waris/KTP_Ahli_Waris', $filename);
            $data->fcKtpAhliWaris = $filename;
        } else {
            return $request;
            $data->fcKtpAhliWaris = '';
        }

        if ($request->hasFile('fcKkAhliWaris')) {
            $file       = $request->file('fcKkAhliWaris');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Waris/KK_Ahli_Waris', $filename);
            $data->fcKkAhliWaris = $filename;
        } else {
            return $request;
            $data->fcKkAhliWaris = '';
        }

        if ($request->hasFile('suratPernyatan')) {
            $file       = $request->file('suratPernyatan');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Waris/Surat_Pernyataan', $filename);
            $data->suratPernyataan = $filename;
        } else {
            return $request;
            $data->suratPernyataan = '';
        }

        if ($request->hasFile('suratKematian')) {
            $file       = $request->file('suratKematian');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Waris/Surat_Kematian', $filename);
            $data->suratKematian = $filename;
        } else {
            return $request;
            $data->suratKematian = '';
        }

        if ($request->hasFile('sertifikatAsli')) {
            $file       = $request->file('sertifikatAsli');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Waris/Sertifikat_Asli', $filename);
            $data->sertifikatAsli = $filename;
        } else {
            return $request;
            $data->sertifikatAsli = '';
        }

        if ($request->hasFile('pbbTerbaru')) {
            $file       = $request->file('pbbTerbaru');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Waris/PBB', $filename);
            $data->pbbTerbaru = $filename;
        } else {
            return $request;
            $data->pbbTerbaru = '';
        }

        if ($request->hasFile('fotoLokasi')) {
            $file       = $request->file('fotoLokasi');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Waris/Lokasi', $filename);
            $data->fotoLokasi = $filename;
        } else {
            return $request;
            $data->fotoLokasi = '';
        }

        if ($request->hasFile('koordinatLokasi')) {
            $file       = $request->file('koordinatLokasi');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Waris/Koordinat', $filename);
            $data->koordinatLokasi = $filename;
        } else {
            return $request;
            $data->koordinatLokasi = '';
        }
        $data->save();
        Alert::success('Berhasil Menambah Data');
        return redirect('/wariss');
    }


    // View Detail
    public function detailWaris($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $datax = Waris::where('id', $id)->first();
        return view('dashboard.waris.detail', compact('datax'));
    }

    // Delete Data
    public function hapusWaris($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Waris::find($id)
        ->delete();
        Alert::success('Berhasil Menghapus Data');
        return redirect('/wariss');
    }

    // View Edit
    public function editWaris($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Waris::where('id', $id)->first();
        return view('dashboard.waris.edit', compact('data'));
    }

    // Update Data
    public function updateWaris(Request $request, $id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        Waris::where('id', $id)
        ->update([
            'status' => $request->status,
        ]);

        Alert::success('Berhasil Menyimpan Data');
        return redirect('/wariss');
    }

    public function bayarWaris($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Waris::where('id', $id)->first();
        return view('dashboard.waris.bayar', compact('data'));
    }

    // Konfirmasi Pembayarab
    public function pbayarWaris($id)
    {
        Waris::where('id',$id)
        ->update([
            'Pembayaran' => 'konfirm',
        ]);
        Alert::success('Berhasil Konfirmasi Data');
        return redirect('/wariss');
    }

    public function bayarWarisA($id)
    {
        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = Waris::where('id', $id)->first();
        // dd($data);
        return view('dashboard.waris.bayarA', compact('data'));
    }     

    public function PbayarWarisA(Request $request, $id)
    {   
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($request);
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('WARIS/BAYAR',$filename);
            $bukti = $filename;
        }

        if ($request->ket=='lunas') {
            Waris::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }
        else{
            Waris::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $request->ket,
            ]);
        }

        Alert::success('Success !!!','Upload Behasil Dilakukan');

        return redirect()->back();

        // dd($request,$id);
    }

//--------------------------------------------------------------------//

//--------------------------------------------------------//
//Controller Dashboard - Manage Users


    // View Data
    public function indexUsers(){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = User::orderBy('level','asc')->get();
        return view('dashboard.users.index', compact('data'));
    }


    // Add Data
    public function tambahUsers(Request $request){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = new User;
        $data->nik = $request->nik;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->level = $request->level;
        // dd($data);
        $data->save();

        Alert::success('Berhasil Menambah Users');
        return redirect('/users');
    }


    // Delete Data
    public function hapusUsers($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        User::find($id)
        ->delete();
        Alert::success('Berhasil Menghapus Users');
        return redirect('/users');
    }

    // View Edit
    public function editUsers($id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        $data = User::where('id', $id)->first();
        return view('dashboard.users.edit', compact('data'));
    }

    // Update Data
    public function updateUsers(Request $request, $id){

        if(auth()->user()->level != 99){
            return abort(404);
        }

        User::where('id', $id)
        ->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
        ]);

        Alert::success('Berhasil Menyimpan Perubahan');
        return redirect('/users');
    }

//--------------------------------------------------------------------//

}
