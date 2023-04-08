<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\JualBeliTemp;
use App\JualBeli;
use App\AphbTemp;
use App\Aphb;
use App\CvTemp;
use App\Cv;
use App\HibahTemp;
use App\Hibah;
use App\NibTemp;
use App\Nib;
use App\PecahSertifikatTemp;
use App\PecahSertifikat;
use App\PenyertifikatanTemp;
use App\Penyertifikatan;
use App\PetaBidangTemp;
use App\PetaBidang;
use App\PtTemp;
use App\Pt;
use App\RoyaTemp;
use App\Roya;
use App\SiupTemp;
use App\Siup;
use App\WarisTemp;
use App\Waris;
use File;

class UserController extends Controller
{   

    //Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
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
        return view('user.menu', compact('data'));
    }

//--------------------------------------------------------------------------------------------//
//Controller User - Jual Beli


    public function indexJualBeli(){
        $data = [
            'jual_belis' => JualBeli::addselect('jual_belis.id')
            ->addselect('jual_belis.tanggal')
            ->addselect('jual_belis.pembayaran')
            ->addselect('jual_belis.status')
            ->addselect('jual_belis.ket')
            ->join('users','jual_belis.nik','users.nik')
            ->where('jual_belis.nik',Auth()->user()->nik)->get(),
        ];
        return view('user.Input.jualBeli', compact('data'));
    }

    // Function Simpan Data Ketika Menambah Data
    public function tambahJualBeli(Request $request){
        $request->validate([
            'fcKtpPenjual' => 'required|image|mimes:jpeg,png,jpg',
            'fcKtpPembeli' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPenjual' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPembeli' => 'required|image|mimes:jpeg,png,jpg',
            'bukuNikahPenjual' => 'required|image|mimes:jpeg,png,jpg',
            'fcSertifikat' => 'required|image|mimes:jpeg,png,jpg',
            'sertifikatAsli' => 'required|image|mimes:jpeg,png,jpg',
            'pbbTerbaru' => 'required|image|mimes:jpeg,png,jpg',
            'fotoLokasi' => 'required|image|mimes:jpeg,png,jpg',
            'koordinatLokasi' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $data = new JualBeliTemp;
        $idx = $request->idTrx;
        $data->idTrx = $idx;
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
        Alert::info('Attetion !!!', 'Harap Mengecek Kembali Data Sebelum Menekan Tombol Selesai');
        return redirect('/users/jualBelis/detail/'.$idx);
    }

    // Function Ketika Button Detail Di Klik
    public function detailJualBeli($idx){
        $datax = JualBeliTemp::where('idTrx', $idx)->first();
        return view('user.Detail.jualBeli', compact('datax'));
    }

     // Function Ketika Button Hapus di Klik
    public function hapusJualBeli($id){
        JualBeliTemp::find($id)->delete();
        return redirect('/users/jualBelis');
    }


    public function selesaiJualBeli($id){
        $data = new JualBeli;

        $datax = JualBeliTemp::where('id', $id)->first();
        $data->tanggal = $datax->tanggal;
        $data->nik = $datax->nik;
        $data->status = $datax->status;
        $data->fcKtpPenjual = $datax->fcKtpPenjual;
        $data->fcKtpPembeli = $datax->fcKtpPembeli;
        $data->fcKkPenjual = $datax->fcKkPenjual;
        $data->fcKkPembeli = $datax->fcKkPembeli;
        $data->bukuNikahPenjual = $datax->bukuNikahPenjual;
        $data->fcSertifikat = $datax->fcSertifikat;
        $data->sertifikatAsli = $datax->sertifikatAsli;
        $data->pbbTerbaru = $datax->pbbTerbaru;
        $data->fotoLokasi = $datax->fotoLokasi;
        $data->koordinatLokasi = $datax->koordinatLokasi; 
        $data->notif = 'y';
        $data->save();

        JualBeliTemp::find($id)->delete();

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/jualBelis');
        
    }

    public function bayarJualBeli($id){
        $data = JualBeli::find($id);
        return view('user.Bayar.jualBeli',compact('data','id'));
    }

    public function UploadbayarJualBeli(Request $r,$id){
        $r->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($r,$id,time());
        $bukti = '';

        if ($r->hasFile('bukti')) {
            $file = $r->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('Jual_Beli/KK',$filename);
            $bukti = $filename;
        }

        if ($r->ket=='lunas') {
            JualBeli::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }
        else{
            JualBeli::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/jualBelis');
    }

//--------------------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------------------//
//Controller User - APHB

    public function indexAphb(){
        $data = [
            'aphbs' => Aphb::addselect('aphbs.id')
            ->addselect('aphbs.tanggal')
            ->addselect('aphbs.pembayaran')
            ->addselect('aphbs.status')
            ->addselect('aphbs.ket')
            ->join('users','aphbs.nik','users.nik')
            ->where('aphbs.nik',Auth()->user()->nik)->get(),
        ];
        // dd($data);
        return view('user.Input.aphb', compact('data'));
    }

// Function Simpan Data Ketika Menambah Data
    public function tambahAphb(Request $request){
        $request->validate([
            'fcKtpAhliWaris' => 'required|image|mimes:jpeg,png,jpg',
            'fcKtpPenerima' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkAhliWaris' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPenerima' => 'required|image|mimes:jpeg,png,jpg',
            'sertifikatAsli' => 'required|image|mimes:jpeg,png,jpg',
            'pbbTerbaru' => 'required|image|mimes:jpeg,png,jpg',
            'fotoLokasi' => 'required|image|mimes:jpeg,png,jpg',
            'koordinatLokasi' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $data = new AphbTemp;
        $idx = $request->idTrx;
        $data->idTrx = $idx;
        $data->tanggal = $request->tanggal;
        $data->nik = $request->nik;
        $data->status = '2';

        if ($request->hasFile('fcKtpAhliWaris')) {
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
        Alert::info('Attetion !!!', 'Harap Mengecek Kembali Data Sebelum Menekan Tombol Selesai');
        return redirect('/users/aphbs/detail/'.$idx);
    }

// Function Ketika Button Detail Di Klik
    public function detailAphb($idx){

        $datax = AphbTemp::where('idTrx', $idx)->first();
        return view('user.Detail.aphb', compact('datax'));
    }

 // Function Ketika Button Hapus di Klik
    public function hapusAphb($id){

        AphbTemp::find($id)
        ->delete();
        return redirect('/users/aphbs');
    }


    public function selesaiAphb($id){

        $data = new Aphb;

        $datax = AphbTemp::where('id', $id)->first();
        $data->tanggal = $datax->tanggal;
        $data->nik = $datax->nik;
        $data->status = $datax->status;
        $data->fcKtpAhliWaris = $datax->fcKtpAhliWaris;
        $data->fcKtpPenerima = $datax->fcKtpPenerima;
        $data->fcKkAhliWaris = $datax->fcKkAhliWaris;
        $data->fcKkPenerima = $datax->fcKkPenerima;
        $data->sertifikatAsli = $datax->sertifikatAsli;
        $data->pbbTerbaru = $datax->pbbTerbaru;
        $data->fotoLokasi = $datax->fotoLokasi;
        $data->koordinatLokasi = $datax->koordinatLokasi; 
        $data->notif = 'y';
        $data->save();

        AphbTemp::find($id)
        ->delete();

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/aphbs');
    }

    public function bayarAphb($id){
        $data = Aphb::find($id);
        return view('user.Bayar.aphb',compact('data','id'));
    }

    public function UploadbayarAphb(Request $r,$id){
        $r->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($r,$id,time());
        $bukti = '';

        if ($r->hasFile('bukti')) {
            $file = $r->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('APHB/KK',$filename);
            $bukti = $filename;
        }

        if ($r->ket=='lunas') {
            Aphb::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }
        else{
            Aphb::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/aphbs');
    }

//--------------------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------------------//
//Controller User - CV

    public function indexCv(){
        $data = [
            'cvs' => Cv::addselect('cvs.id')
            ->addselect('cvs.tanggal')
            ->addselect('cvs.pembayaran')
            ->addselect('cvs.status')
            ->addselect('cvs.ket')
            ->join('users','cvs.nik','users.nik')
            ->where('cvs.nik',Auth()->user()->nik)->get(),
        ];
        // dd($data);
        return view('user.Input.cv', compact('data'));
    }

// Function Simpan Data Ketika Menambah Data
    public function tambahCv(Request $request){
        $request->validate([
            'fcKtpPengurus1' => 'required|image|mimes:jpeg,png,jpg',
            'fcKtpPengurus2' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPengurus1' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPengurus2' => 'required|image|mimes:jpeg,png,jpg',
            'npwp' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $data = new CvTemp;
        $idx = $request->idTrx;
        $data->idTrx = $idx;
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
        Alert::info('Attetion !!!', 'Harap Mengecek Kembali Data Sebelum Menekan Tombol Selesai');
        return redirect('/users/cvs/detail/'.$idx);
    }

// Function Ketika Button Detail Di Klik
    public function detailCv($idx){

        $datax = CvTemp::where('idTrx', $idx)->first();
        return view('user.Detail.cv', compact('datax'));
    }

 // Function Ketika Button Hapus di Klik
    public function hapusCv($id){

        CvTemp::find($id)
        ->delete();
        return redirect('/users/cvs');
    }


    public function selesaiCv($id){
        $data = new Cv;

        $datax = CvTemp::where('id', $id)->first();
        $data->tanggal = $datax->tanggal;
        $data->nik = $datax->nik;
        $data->status = $datax->status;
        $data->fcKtpPengurus1 = $datax->fcKtpPengurus1;
        $data->fcKtpPengurus2 = $datax->fcKtpPengurus2;
        $data->fcKKPengurus1 = $datax->fcKKPengurus1;
        $data->fcKKPengurus2 = $datax->fcKKPengurus2;
        $data->npwp = $datax->npwp;  
        $data->notif = 'y';
        $data->save();

        CvTemp::find($id)
        ->delete();

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/cvs');
    }

    public function bayarCv($id){
        $data = Cv::find($id);
        return view('user.Bayar.cv',compact('data','id'));
    }

    public function UploadbayarCv(Request $r,$id){
        $r->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($r,$id,time());
        $bukti = '';

        if ($r->hasFile('bukti')) {
            $file = $r->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('CV/KK',$filename);
            $bukti = $filename;
        }
        if ($r->ket=='lunas') {
            Cv::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }
        else{
            Cv::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/cvs');
    }

//--------------------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------------------//
//Controller User - Hibah

    public function indexHibah(){
        $data = [
            'hibahs' => Hibah::addselect('hibahs.id')
            ->addselect('hibahs.tanggal')
            ->addselect('hibahs.pembayaran')
            ->addselect('hibahs.status')
            ->addselect('hibahs.ket')
            ->join('users','hibahs.nik','users.nik')
            ->where('hibahs.nik',Auth()->user()->nik)->get(),
        ];
        return view('user.Input.hibah', compact('data'));
    }

// Function Simpan Data Ketika Menambah Data
    public function tambahHibah(Request $request){
        $request->validate([
            'fcKtpPenerima' => 'required|image|mimes:jpeg,png,jpg',
            'fcKtpPemberi' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPenerima' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPemberi' => 'required|image|mimes:jpeg,png,jpg',
            'bukuNikahPemberi' => 'required|image|mimes:jpeg,png,jpg',
            'sertifikatAsli' => 'required|image|mimes:jpeg,png,jpg',
            'pbbTerbaru' => 'required|image|mimes:jpeg,png,jpg',
            'fotoLokasi' => 'required|image|mimes:jpeg,png,jpg',
            'koordinatLokasi' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $data = new HibahTemp;
        $idx = $request->idTrx;
        $data->idTrx = $idx;
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
        Alert::info('Attetion !!!', 'Harap Mengecek Kembali Data Sebelum Menekan Tombol Selesai');
        return redirect('/users/hibahs/detail/'.$idx);
    }

// Function Ketika Button Detail Di Klik
    public function detailHibah($idx){

        $datax = HibahTemp::where('idTrx', $idx)->first();
        return view('user.Detail.hibah', compact('datax'));
    }

 // Function Ketika Button Hapus di Klik
    public function hapusHibah($id){

        HibahTemp::find($id)
        ->delete();
        return redirect('/users/hibahs');
    }


    public function selesaiHibah($id){

        $data = new Hibah;

        $datax = HibahTemp::where('id', $id)->first();
        $data->tanggal = $datax->tanggal;
        $data->nik = $datax->nik;
        $data->status = $datax->status;
        $data->fcKtpPenerima = $datax->fcKtpPenerima;
        $data->fcKtpPemberi = $datax->fcKtpPemberi;
        $data->fcKkPenerima = $datax->fcKkPenerima;
        $data->fcKkPemberi = $datax->fcKkPemberi;
        $data->bukuNikahPemberi = $datax->bukuNikahPemberi;
        $data->sertifikatAsli = $datax->sertifikatAsli;
        $data->pbbTerbaru = $datax->pbbTerbaru;
        $data->fotoLokasi = $datax->fotoLokasi;
        $data->koordinatLokasi = $datax->koordinatLokasi;  
        $data->notif = 'y';
        $data->save();

        HibahTemp::find($id)
        ->delete();

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/hibahs');

    }

    public function bayarHibah($id){
        $data = Hibah::find($id);
        return view('user.Bayar.hibah',compact('data','id'));
    }

    public function UploadbayarHibah(Request $r,$id){
        $r->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($r,$id,time());
        $bukti = '';

        if ($r->hasFile('bukti')) {
            $file = $r->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('HIBAH/KK',$filename);
            $bukti = $filename;
        }

        if ($r->ket=='lunas') {
            Hibah::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }
        else{
            Hibah::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/hibahs');
    }

//--------------------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------------------//
//Controller User - NIB

    public function indexNib(){
        $data = [
            'nibs' => Nib::addselect('nibs.id')
            ->addselect('nibs.tanggal')
            ->addselect('nibs.pembayaran')
            ->addselect('nibs.status')
            ->addselect('nibs.ket')
            ->join('users','nibs.nik','users.nik')
            ->where('nibs.nik',Auth()->user()->nik)->get(),
        ];
        return view('user.Input.nib',compact('data'));
    }

// Function Simpan Data Ketika Menambah Data
    public function tambahNib(Request $request){
        $request->validate([
            'fcKtpPengurus1' => 'required|image|mimes:jpeg,png,jpg',
            'fcKtpPengurus2' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPengurus1' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPengurus2' => 'required|image|mimes:jpeg,png,jpg',
            'npwp' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $data = new NibTemp;
        $idx = $request->idTrx;
        $data->idTrx = $idx;
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
        Alert::info('Attetion !!!', 'Harap Mengecek Kembali Data Sebelum Menekan Tombol Selesai');
        return redirect('/users/nibs/detail/'.$idx);
    }

// Function Ketika Button Detail Di Klik
    public function detailNib($idx){

        $datax = NibTemp::where('idTrx', $idx)->first();
        return view('user.Detail.nib', compact('datax'));
    }

 // Function Ketika Button Hapus di Klik
    public function hapusNib($id){

        NibTemp::find($id)
        ->delete();
        return redirect('/users/nibs');
    }


    public function selesaiNib($id){

        $data = new Nib;

        $datax = NibTemp::where('id', $id)->first();
        $data->tanggal = $datax->tanggal;
        $data->nik = $datax->nik;
        $data->status = $datax->status;
        $data->fcKtpPengurus1 = $datax->fcKtpPengurus1;
        $data->fcKtpPengurus2 = $datax->fcKtpPengurus2;
        $data->fcKKPengurus1 = $datax->fcKKPengurus1;
        $data->fcKKPengurus2 = $datax->fcKKPengurus2;
        $data->npwp = $datax->npwp; 
        $data->notif = 'y';
        $data->save();

        NibTemp::find($id)
        ->delete();

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/nibs');

    }

    public function bayarNib($id){
        $data = Nib::find($id);
        return view('user.Bayar.nib',compact('data','id'));
    }

    public function UploadbayarNib(Request $r,$id){
        $r->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($r,$id,time());
        $bukti = '';

        if ($r->hasFile('bukti')) {
            $file = $r->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('NIB/KK',$filename);
            $bukti = $filename;
        }

        if ($r->ket=='lunas') {
            Nib::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }
        else{
            Nib::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/nibs');
    }

//--------------------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------------------//
//Controller User - PT

    public function indexPt(){
        $data = [
            'pts' => Pt::addselect('pts.id')
            ->addselect('pts.tanggal')
            ->addselect('pts.pembayaran')
            ->addselect('pts.status')
            ->addselect('pts.ket')
            ->join('users','pts.nik','users.nik')
            ->where('pts.nik',Auth()->user()->nik)->get(),
        ];
        return view('user.Input.pt', compact('data'));
    }

// Function Simpan Data Ketika Menambah Data
    public function tambahPt(Request $request){
        $request->validate([
            'fcKtpPengurus1' => 'required|image|mimes:jpeg,png,jpg',
            'fcKtpPengurus2' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPengurus1' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPengurus2' => 'required|image|mimes:jpeg,png,jpg',
            'npwp' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $data = new PtTemp;
        $idx = $request->idTrx;
        $data->idTrx = $idx;
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
        Alert::info('Attetion !!!', 'Harap Mengecek Kembali Data Sebelum Menekan Tombol Selesai');
        return redirect('/users/pts/detail/'.$idx);
    }

// Function Ketika Button Detail Di Klik
    public function detailPt($idx){

        $datax = PtTemp::where('idTrx', $idx)->first();
        return view('user.Detail.pt', compact('datax'));
    }

 // Function Ketika Button Hapus di Klik
    public function hapusPt($id){

        PtTemp::find($id)
        ->delete();
        return redirect('/users/pts');
    }


    public function selesaiPt($id){

        $data = new Pt;

        $datax = PtTemp::where('id', $id)->first();
        $data->tanggal = $datax->tanggal;
        $data->nik = $datax->nik;
        $data->status = $datax->status;
        $data->fcKtpPengurus1 = $datax->fcKtpPengurus1;
        $data->fcKtpPengurus2 = $datax->fcKtpPengurus2;
        $data->fcKKPengurus1 = $datax->fcKKPengurus1;
        $data->fcKKPengurus2 = $datax->fcKKPengurus2;
        $data->npwp = $datax->npwp;   
        $data->notif = 'y';
        $data->save();

        PtTemp::find($id)
        ->delete();

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/pts');

    }

    public function bayarPt($id){
        $data = Pt::find($id);
        return view('user.Bayar.pt',compact('data','id'));
    }

    public function UploadbayarPt(Request $r,$id){
        $r->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($r,$id,time());
        $bukti = '';

        if ($r->hasFile('bukti')) {
            $file = $r->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('PT/KK',$filename);
            $bukti = $filename;
        }
        if ($r->ket=='lunas') {
            Pt::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }
        else{
            Pt::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/pts');
    }
//--------------------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------------------//
//Controller User - SIUP

    public function indexSiup(){
        $data = [
            'siup' => Siup::addselect('siups.id')
            ->addselect('siups.tanggal')
            ->addselect('siups.pembayaran')
            ->addselect('siups.status')
            ->addselect('siups.ket')
            ->join('users','siups.nik','users.nik')
            ->where('siups.nik',Auth()->user()->nik)->get(),
        ];
        // dd($data);
        return view('user.Input.siup',compact('data'));
    }

// Function Simpan Data Ketika Menambah Data
    public function tambahSiup(Request $request){
        $request->validate([
            'fcKtpPengurus1' => 'required|image|mimes:jpeg,png,jpg',
            'fcKtpPengurus2' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPengurus1' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPengurus2' => 'required|image|mimes:jpeg,png,jpg',
            'npwp' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $data = new SiupTemp;
        $idx = $request->idTrx;
        $data->idTrx = $idx;
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
        Alert::info('Attetion !!!', 'Harap Mengecek Kembali Data Sebelum Menekan Tombol Selesai');
        return redirect('/users/siups/detail/'.$idx);
    }

// Function Ketika Button Detail Di Klik
    public function detailSiup($idx){

        $datax = SiupTemp::where('idTrx', $idx)->first();
        return view('user.Detail.siup', compact('datax'));
    }

 // Function Ketika Button Hapus di Klik
    public function hapusSiup($id){

        SiupTemp::find($id)
        ->delete();
        return redirect('/users/siups');
    }


    public function selesaiSiup($id){

        $data = new Siup;

        $datax = SiupTemp::where('id', $id)->first();
        $data->tanggal = $datax->tanggal;
        $data->nik = $datax->nik;
        $data->status = $datax->status;
        $data->fcKtpPengurus1 = $datax->fcKtpPengurus1;
        $data->fcKtpPengurus2 = $datax->fcKtpPengurus2;
        $data->fcKKPengurus1 = $datax->fcKKPengurus1;
        $data->fcKKPengurus2 = $datax->fcKKPengurus2;
        $data->npwp = $datax->npwp;   
        $data->notif = 'y';
        $data->save();

        SiupTemp::find($id)
        ->delete();

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/siups');
    }

    public function bayarSiup($id){
        $data = Siup::find($id);
        return view('user.Bayar.siup',compact('data','id'));
    }

    public function UploadbayarSiup(Request $r,$id){
        $r->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($r,$id,time());
        $bukti = '';

        if ($r->hasFile('bukti')) {
            $file = $r->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('SIUP/KK',$filename);
            $bukti = $filename;
        }

        if ($r->ket=='lunas') {
            Siup::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }
        else{
            Siup::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/siups');
    }

//--------------------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------------------//
//Controller User - Pecah Sertifikat

    public function indexPecahSertifikat(){
        $data = [
            'pecah_sertifikats' => PecahSertifikat::addselect('pecah_sertifikats.id')
            ->addselect('pecah_sertifikats.tanggal')
            ->addselect('pecah_sertifikats.pembayaran')
            ->addselect('pecah_sertifikats.status')
            ->addselect('pecah_sertifikats.ket')
            ->join('users','pecah_sertifikats.nik','users.nik')
            ->where('pecah_sertifikats.nik',Auth()->user()->nik)->get(),
        ];
        return view('user.Input.pecahSertifikat',compact('data'));
    }

// Function Simpan Data Ketika Menambah Data
    public function tambahPecahSertifikat(Request $request){
        $request->validate([
            'fcKtp' => 'required|image|mimes:jpeg,png,jpg',
            'fcKk' => 'required|image|mimes:jpeg,png,jpg',
            'sertifikatAsli' => 'required|image|mimes:jpeg,png,jpg',
            'pbbTerbaru' => 'required|image|mimes:jpeg,png,jpg',
            'fotoLokasi' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $data = new PecahSertifikatTemp;
        $idx = $request->idTrx;
        $data->idTrx = $idx;
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
        Alert::info('Attetion !!!', 'Harap Mengecek Kembali Data Sebelum Menekan Tombol Selesai');
        return redirect('/users/pecahSertifikats/detail/'.$idx);
    }

// Function Ketika Button Detail Di Klik
    public function detailPecahSertifikat($idx){

        $datax = PecahSertifikatTemp::where('idTrx', $idx)->first();
        return view('user.Detail.pecahSertifikat', compact('datax'));
    }

 // Function Ketika Button Hapus di Klik
    public function hapusPecahSertifikat($id){

        PecahSertifikatTemp::find($id)
        ->delete();
        return redirect('/users/pecahSertifikats');
    }


    public function selesaiPecahSertifikat($id){

        $data = new PecahSertifikat;

        $datax = PecahSertifikatTemp::where('id', $id)->first();
        $data->tanggal = $datax->tanggal;
        $data->nik = $datax->nik;
        $data->status = $datax->status;
        $data->fcKtp = $datax->fcKtp;
        $data->fcKk = $datax->fcKk;
        $data->sertifikatAsli = $datax->sertifikatAsli;
        $data->pbbTerbaru = $datax->pbbTerbaru;
        $data->fotoLokasi = $datax->fotoLokasi;
        $data->notif = 'y';
        $data->save();

        PecahSertifikatTemp::find($id)
        ->delete();

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/pecahSertifikats');

    }

    public function bayarPecahSertifikat($id){
        $data = PecahSertifikat::find($id);
        return view('user.Bayar.pecahsertifikat',compact('data','id'));
    }

    public function UploadbayarPecahSertifikat(Request $r,$id){
        $r->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($r,$id,time());
        $bukti = '';

        if ($r->hasFile('bukti')) {
            $file = $r->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('Pecah_Sertifikat/KK',$filename);
            $bukti = $filename;
        }

        if ($r->ket=='lunas') {
            PecahSertifikat::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }
        else{
            PecahSertifikat::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/pecahSertifikats');
    }

//--------------------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------------------//
//Controller User - Penyertifikatan

    public function indexPenyertifikatan(){
        $data = [
            'penyertifikats' => Penyertifikatan::addselect('penyertifikatans.id')
            ->addselect('penyertifikatans.tanggal')
            ->addselect('penyertifikatans.pembayaran')
            ->addselect('penyertifikatans.status')
            ->addselect('penyertifikatans.ket')
            ->join('users','penyertifikatans.nik','users.nik')
            ->where('penyertifikatans.nik',Auth()->user()->nik)->get(),
        ];
        return view('user.Input.penyertifikatan', compact('data'));
    }

// Function Simpan Data Ketika Menambah Data
    public function tambahPenyertifikatan(Request $request){
        $request->validate([
            'fcSurat' => 'required|image|mimes:jpeg,png,jpg',
            'fcKtpPemohon' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPemohon' => 'required|image|mimes:jpeg,png,jpg',
            'kematian' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $data = new PenyertifikatanTemp;
        $idx = $request->idTrx;
        $data->idTrx = $idx;
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
        Alert::info('Attetion !!!', 'Harap Mengecek Kembali Data Sebelum Menekan Tombol Selesai');
        return redirect('/users/penyertifikatans/detail/'.$idx);
    }

// Function Ketika Button Detail Di Klik
    public function detailPenyertifikatan($idx){

        $datax = PenyertifikatanTemp::where('idTrx', $idx)->first();
        return view('user.Detail.penyertifikatan', compact('datax'));
    }

 // Function Ketika Button Hapus di Klik
    public function hapusPenyertifikatan($id){

        PenyertifikatanTemp::find($id)
        ->delete();
        return redirect('/users/penyertifikatans');
    }


    public function selesaiPenyertifikatan($id){

        $data = new Penyertifikatan;

        $datax = PenyertifikatanTemp::where('id', $id)->first();
        $data->tanggal = $datax->tanggal;
        $data->nik = $datax->nik;
        $data->status = $datax->status;
        $data->fcSurat = $datax->fcSurat;
        $data->fcKtpPemohon = $datax->fcKtpPemohon;
        $data->fcKkPemohon = $datax->fcKkPemohon;
        $data->kematian = $datax->kematian; 
        $data->notif = 'y';
        $data->save();

        PenyertifikatanTemp::find($id)
        ->delete();

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/user/penyertifikatans');

    }

    public function bayarPenyertifikatan($id){
        $data = Penyertifikatan::find($id);
        return view('user.Bayar.penyertifikatan',compact('data','id'));
    }

    public function UploadbayarPenyertifikatan(Request $r,$id){
        $r->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($r,$id,time());
        $bukti = '';

        if ($r->hasFile('bukti')) {
            $file = $r->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('Penyertifikatan/KK',$filename);
            $bukti = $filename;
        }

        if ($r->ket=='lunas') {
            Penyertifikatan::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }
        else{
            Penyertifikatan::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/penyertifikatans');
    }

//--------------------------------------------------------------------------------------------//


//--------------------------------------------------------------------------------------------//
//Controller User - Peta Bidang

    public function indexPetaBidang(){
        $data = [
            'peta_bidangs' => PetaBidang::addselect('peta_bidangs.id')
            ->addselect('peta_bidangs.tanggal')
            ->addselect('peta_bidangs.pembayaran')
            ->addselect('peta_bidangs.ket')
            ->join('users','peta_bidangs.nik','users.nik')
            ->where('peta_bidangs.nik',Auth()->user()->nik)->get(),
        ];
        return view('user.Input.petaBidang', compact('data'));
    }

// Function Simpan Data Ketika Menambah Data
    public function tambahPetaBidang(Request $request){
        $request->validate([
            'fcSurat' => 'required|image|mimes:jpeg,png,jpg',
            'fcKtpPemohon' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkPemohon' => 'required|image|mimes:jpeg,png,jpg',
            'pbbTerbaru' => 'required|image|mimes:jpeg,png,jpg',
            'fotoLokasi' => 'required|image|mimes:jpeg,png,jpg',
            'fotoPatok' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $data = new PetaBidangTemp;
        $idx = $request->idTrx;
        $data->idTrx = $idx;
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
        Alert::info('Attetion !!!', 'Harap Mengecek Kembali Data Sebelum Menekan Tombol Selesai');
        return redirect('/userspetaBidangs/detail/'.$idx);
    }

// Function Ketika Button Detail Di Klik
    public function detailPetaBidang($idx){

        $datax = PetaBidangTemp::where('idTrx', $idx)->first();
        return view('user.Detail.petaBidang', compact('datax'));
    }

 // Function Ketika Button Hapus di Klik
    public function hapusPetaBidang($id){

        PetaBidangTemp::find($id)
        ->delete();
        return redirect('/userspetaBidangs');
    }


    public function selesaiPetaBidang($id){

        $data = new PetaBidang;

        $datax = PetaBidangTemp::where('id', $id)->first();
        $data->tanggal = $datax->tanggal;
        $data->nik = $datax->nik;
        $data->status = $datax->status;
        $data->fcSurat = $datax->fcSurat;
        $data->fcKtpPemohon = $datax->fcKtpPemohon;
        $data->fcKkPemohon = $datax->fcKkPemohon;
        $data->pbbTerbaru = $datax->pbbTerbaru;
        $data->fotoLokasi = $datax->fotoLokasi;
        $data->fotoPatok = $datax->fotoPatok; 
        $data->notif = 'y';
        $data->save();

        PetaBidangTemp::find($id)
        ->delete();

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/userspetaBidangs');

    }

    public function bayarPetaBidang($id){
        $data = PetaBidang::find($id);
        return view('user.Bayar.petaBidang',compact('data','id'));
    }

    public function UploadbayarPetaBidang(Request $r,$id){
        $r->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($r,$id,time());
        $bukti = '';

        if ($r->hasFile('bukti')) {
            $file = $r->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('Peta_Bidang/KK',$filename);
            $bukti = $filename;
        }
        PetaBidang::where('id',$id)
        ->update([
            'bukti' => $bukti,
            'pembayaran' => 'sudah',
            'ket' => $r->ket,
        ]);

        if ($r->ket=='lunas') {
            PetaBidang::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }
        else{
            PetaBidang::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/userspetaBidangs');
    }


//--------------------------------------------------------------------------------------------//


//--------------------------------------------------------------------------------------------//
//Controller User - Roya

    public function indexRoya(){
        $data = [
            'royas' => Roya::addselect('royas.id')
            ->addselect('royas.tanggal')
            ->addselect('royas.pembayaran')
            ->addselect('royas.status')
            ->addselect('royas.ket')
            ->join('users','royas.nik','users.nik')
            ->where('royas.nik',Auth()->user()->nik)->get(),
        ];
        return view('user.Input.roya', compact('data'));
    }

// Function Simpan Data Ketika Menambah Data
    public function tambahRoya(Request $request){
        $request->validate([
            'fcKtp' => 'required|image|mimes:jpeg,png,jpg',
            'fcKk' => 'required|image|mimes:jpeg,png,jpg',
            'suratPermohonan' => 'required|image|mimes:jpeg,png,jpg',
            'suratLunas' => 'required|image|mimes:jpeg,png,jpg',
            'ktpPetugas' => 'required|image|mimes:jpeg,png,jpg',
            'sertifikatAsli' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $data = new RoyaTemp;
        $idx = $request->idTrx;
        $data->idTrx = $idx;
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
        Alert::info('Attetion !!!', 'Harap Mengecek Kembali Data Sebelum Menekan Tombol Selesai');
        return redirect('/users/royas/detail/'.$idx);
    }

// Function Ketika Button Detail Di Klik
    public function detailRoya($idx){

        $datax = RoyaTemp::where('idTrx', $idx)->first();
        return view('user.Detail.roya', compact('datax'));
    }

 // Function Ketika Button Hapus di Klik
    public function hapusRoya($id){

        RoyaTemp::find($id)
        ->delete();
        return redirect('/users/royas');
    }


    public function selesaiRoya($id){

        $data = new Roya;

        $datax = RoyaTemp::where('id', $id)->first();
        $data->tanggal = $datax->tanggal;
        $data->nik = $datax->nik;
        $data->status = $datax->status;
        $data->fcKtp = $datax->fcKtp;
        $data->fcKk = $datax->fcKk;
        $data->suratPermohonan = $datax->suratPermohonan;
        $data->suratLunas = $datax->suratLunas;
        $data->ktpPetugas = $datax->ktpPetugas;
        $data->sertifikatAsli = $datax->sertifikatAsli; 
        $data->notif = 'y';
        $data->save();

        RoyaTemp::find($id)
        ->delete();

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/royas');

    }

    public function bayarRoya($id){
        $data = Roya::find($id);
        return view('user.Bayar.roya',compact('data','id'));
    }

    public function UploadbayarRoya(Request $r,$id){
        $r->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($r,$id,time());
        $bukti = '';

        if ($r->hasFile('bukti')) {
            $file = $r->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('Roya/KK',$filename);
            $bukti = $filename;
        }
        
        if ($r->ket=='lunas') {
            Roya::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }
        else{
            Roya::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/royas');
    }

//--------------------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------------------//
//Controller User - Waris

    public function indexWaris(){
        $data = [
            'waris' => Waris::addselect('waris.id')
            ->addselect('waris.tanggal')
            ->addselect('waris.pembayaran')
            ->addselect('waris.status')
            ->addselect('waris.ket')
            ->join('users','waris.nik','users.nik')
            ->where('waris.nik',Auth()->user()->nik)->get(),
        ];
        return view('user.Input.waris', compact('data'));
    }

// Function Simpan Data Ketika Menambah Data
    public function tambahWaris(Request $request){
        $request->validate([
            'fcKtpAhliWaris' => 'required|image|mimes:jpeg,png,jpg',
            'fcKkAhliWaris' => 'required|image|mimes:jpeg,png,jpg',
            'suratPernyatan' => 'required|image|mimes:jpeg,png,jpg',
            'suratKematian' => 'required|image|mimes:jpeg,png,jpg',
            'sertifikatAsli' => 'required|image|mimes:jpeg,png,jpg',
            'pbbTerbaru' => 'required|image|mimes:jpeg,png,jpg',
            'fotoLokasi' => 'required|image|mimes:jpeg,png,jpg',
            'koordinatLokasi' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $data = new WarisTemp;
        $idx = $request->idTrx;
        $data->idTrx = $idx;
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
        Alert::info('Attetion !!!', 'Harap Mengecek Kembali Data Sebelum Menekan Tombol Selesai');
        return redirect('/users/wariss/detail/'.$idx);
    }

// Function Ketika Button Detail Di Klik
    public function detailWaris($idx){

        $datax = WarisTemp::where('idTrx', $idx)->first();
        return view('user.Detail.waris', compact('datax'));
    }

 // Function Ketika Button Hapus di Klik
    public function hapusWaris($id){

        WarisTemp::find($id)
        ->delete();
        return redirect('/users/wariss');
    }


    public function selesaiWaris($id){

        $data = new Waris;

        $datax = WarisTemp::where('id', $id)->first();
        $data->tanggal = $datax->tanggal;
        $data->nik = $datax->nik;
        $data->status = $datax->status;
        $data->fcKtpAhliWaris = $datax->fcKtpAhliWaris;
        $data->fcKkAhliWaris = $datax->fcKkAhliWaris;
        $data->suratPernyataan = $datax->suratPernyataan;
        $data->suratKematian = $datax->suratKematian;
        $data->sertifikatAsli = $datax->sertifikatAsli;
        $data->pbbTerbaru = $datax->pbbTerbaru;
        $data->fotoLokasi = $datax->fotoLokasi;
        $data->koordinatLokasi = $datax->koordinatLokasi; 
        $data->notif = 'y';
        $data->save();

        WarisTemp::find($id)
        ->delete();

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/wariss');

    }

    public function bayarWaris($id){
        $data = Waris::find($id);
        return view('user.Bayar.waris',compact('data','id'));
    }

    public function UploadbayarWaris(Request $r,$id){
        $r->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        // dd($r,$id,time());
        $bukti = '';

        if ($r->hasFile('bukti')) {
            $file = $r->file('bukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('Waris/KK',$filename);
            $bukti = $filename;
        }
        
        if ($r->ket=='lunas') {
            Waris::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }
        else{
            Waris::where('id',$id)
            ->update([
                'bukti' => $bukti,
                'pembayaran' => 'sudah',
                'ket' => $r->ket,
            ]);
        }

        Alert::success('Success !!!','Silakan Menghubungi Admin Untuk Tahap Selanjutnya');
        return redirect('/users/wariss');
    }

//--------------------------------------------------------------------------------------------//


}
