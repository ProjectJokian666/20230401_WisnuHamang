@extends('layouts.user')
@section('main-content-user')
<div class="container col-lg-6">
    <div class="card shadow">
        <h2 class="card-header bg-primary text-light text-center">Menu E-Notaris</h2>
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-sm-4" >
                  <div class="card shadow">
                    <div class="card-body " style="height: 20rem">
                        <h3 class="card-title text-center"><strong>APHB</strong></h3>
                        <hr>
                        <h5>Persyaratan</h5>
                        <ul>
                          <li>Fotocopy KK & KTP Ahli Waris</li>
                          <li>Fotocopy KK & KTP Penerima Hak</li>
                          <li>Sertifikat Asli</li>
                          <li>PBB Terbaru</li>
                          <li>Foto Lokasi</li>
                          <li>Koordinat Lokasi</li>
                        </ul>
                     
                    </div>
                    <div class="card-footer">
                      <a href="{{url('/users/aphbs')}}" class="btn btn-primary  btn-block">Pilih</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card shadow">
                    <div class="card-body" style="height: 20rem">
                        <h3 class="card-title text-center"><strong>Jual Beli</strong></h3>
                        <hr>
                        <h5>Persyaratan</h5>
                        <ul>
                          <li>Fotocopy KK & KTP Penjual</li>
                          <li>Fotocopy KK & KTP Pembeli</li>
                          <li>Buku Nikah Penjual (Optional)</li>
                          <li>Fotocopy Sertifikat</li>
                          <li>Sertifikat Asli</li>
                          <li>PBB Terbaru</li>
                          <li>Foto Lokasi</li>
                          <li>Koordinat Lokasi</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                      <a href="{{url('/users/jualBelis')}}" class="btn btn-primary  btn-block">Pilih</a>
                    </div>
                  </div>
                </div>
                
                <div class="col-sm-4">
                  <div class="card shadow">
                    <div class="card-body" style="height: 20rem">
                      <h3 class="card-title text-center"><strong>Hibah</strong></h3>
                      <hr>
                      <h5>Persyaratan</h5>
                      <ul>
                        <li>Fotocopy KK & KTP Penerima Hibah</li>
                        <li>Fotocopy KK & KTP Pemberi Hibah</li>
                        <li>Buku Nikah Pemberi Hibah (Optional)</li>
                        <li>Sertifikat Asli</li>
                        <li>PBB Terbaru</li>
                        <li>Foto Lokasi</li>
                        <li>Koordinat Lokasi</li>
                      </ul>
                    </div>
                    <div class="card-footer">
                      <a href="{{url('/users/hibahs')}}" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row mb-5">
              <div class="col-sm-4">
                <div class="card shadow">
                  <div class="card-body" style="height: 15rem">
                    <h3 class="card-title text-center"><strong>CV</strong></h3>
                    <hr>
                    <h5>Persyaratan</h5>
                    <ul>
                      <li>Fotocopy KK & KTP Pengurus 2 Orang</li>
                      <li>Fotocopy NPWP</li>
                    </ul>
                  </div>
                  <div class="card-footer">
                    <a href="{{url('/users/cvs')}}" class="btn btn-primary btn-block">Pilih</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card shadow">
                  <div class="card-body" style="height: 15rem">
                    <h3 class="card-title text-center"><strong>NIB</strong></h3>
                    <hr>
                    <h5>Persyaratan</h5>
                    <ul>
                      <li>Fotocopy KK & KTP Pengurus 2 Orang</li>
                      <li>Fotocopy NPWP</li>
                    </ul>
                  </div>
                  <div class="card-footer">
                    <a href="{{url('/users/nibs')}}" class="btn btn-primary btn-block">Pilih</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card shadow">
                  <div class="card-body" style="height: 15rem">
                    <h3 class="card-title text-center"><strong>Pecah Sertifikat</strong></h3>
                    <hr>
                    <h5>Persyaratan</h5>
                    <ul>
                      <li>Sertifikat Asli</li>
                      <li>Fotocopy KTP & KK Atas Nama Sertifikat</li>
                      <li>PBB Terbaru</li>
                      <li>Foto Lokasi</li>
                    </ul>
                  </div>
                  <div class="card-footer">
                    <a href="{{url('/users/pecahSertifikats')}}" class="btn btn-primary btn-block">Pilih</a>
                  </div>
                </div>
              </div>
          </div>
          <div class="row mb-5">
            <div class="col-sm-4">
              <div class="card shadow">
                <div class="card-body" style="height: 15rem">
                    <h3 class="card-title text-center"><strong>Penyertifikatan</strong></h3>
                    <hr>
                    <h5>Persyaratan</h5>
                    <ul>
                      <li>Fotocopy C Desa / Letter C / Petok D Yang Sudah Di Legalisir Desa</li>
                      <li>Fotocopy KK & KTP Pemohon</li>
                      <li>Kematian Yang Ada Di Desa</li>
                    </ul>
                </div>
                <div class="card-footer">
                  <a href="{{url('/users/penyertifikatans')}}" class="btn btn-primary  btn-block">Pilih</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card shadow">
                <div class="card-body" style="height: 15rem">
                  <h3 class="card-title text-center"><strong>Peta Bidang</strong></h3>
                  <hr>
                  <h5>Persyaratan</h5>
                  <ul>
                    <li>Fotocopy C Desa / Letter C / Petok D Yang Sudah Di Legalisir Desa</li>
                    <li>Fotocopy KK & KTP Pemohon</li>
                    <li>PBB</li>
                    <li>Foto Lokasi</li>
                    <li>Foto Patok</li>
                  </ul>
                </div>
                <div class="card-footer">
                  <a href="{{url('/userspetaBidangs')}}" class="btn btn-primary btn-block">Pilih</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card shadow">
                <div class="card-body" style="height: 15rem">
                  <h3 class="card-title text-center"><strong>PT</strong></h3>
                  <hr>
                  <h5>Persyaratan</h5>
                  <ul>
                    <li>Fotocopy KK & KTP Pengurus 2 Orang</li>
                    <li> Fotocopy NPWP</li>
                  </ul>
                </div>
                <div class="card-footer">
                  <a href="{{url('/users/pts')}}" class="btn btn-primary btn-block">Pilih</a>
                </div>
              </div>
            </div>
        </div>
        <div class="row mb-5">
          <div class="col-sm-4">
            <div class="card shadow" >
              <div class="card-body" style="height: 20rem">
                  <h3 class="card-title text-center"><strong>Roya</strong></h3>
                  <hr>
                  <h5>Persyaratan</h5>
                  <ul>
                    <li>Fotocopy KK & KTP</li>
                    <li>Surat Permohonan Roya Dari Bank</li>
                    <li>Surat Lunas Dari Bank</li>
                    <li>KTP Petugas Bank</li>
                    <li>Sertifikat Asli</li>
                  </ul>
              </div>
              <div class="card-footer">
                <a href="{{url('/users/royas')}}" class="btn btn-primary  btn-block">Pilih</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card shadow">
              <div class="card-body" style="height: 20rem">
                <h3 class="card-title text-center"><strong>SIUP</strong></h3>
                <hr>
                <h5>Persyaratan</h5>
                <ul>
                  <li>Fotocopy KK & KTP Pengurus 2 Orang</li>
                  <li>Fotocopy NPWP</li>
                </ul>
              </div>
              <div class="card-footer">
                <a href="{{url('/users/siups')}}" class="btn btn-primary btn-block">Pilih</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card shadow">
              <div class="card-body">
                <h3 class="card-title text-center"><strong>Waris</strong></h3>
                <hr>
                <h5>Persyaratan</h5>
                <ul>
                  <li>Fotocopy KK & KTP Ahli Waris</li>
                  <li>Surat Pernyataan Waris Yang Sudah Di Tanda Tangani Desa & Camat</li>
                  <li>Surat Kematian Atas Nama Sertifikat</li>
                  <li>Sertifikat Asli</li>
                  <li>PBB Terbaru</li>
                  <li>Foto Lokasi</li>
                  <li>Koordinat Lokasi</li>
                </ul>
              </div>
              <div class="card-footer">
                <a href="{{url('/users/wariss')}}" class="btn btn-primary btn-block">Pilih</a>
              </div>
            </div>
          </div>
        </div>
        </div>

            
        <div class="card-footer bg-primary "></div>
    </div>
</div>
@endsection
@section('main-content-user2')
<div class="container col-lg-6">
    <div class="card shadow">
        <h3 class="card-header bg-primary text-light text-center">Data History</h3>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">JENIS SURAT</th>
                            <th class="text-center" scope="col">TANGGAL PENGAJUAN</th>
                            <th class="text-center" scope="col">VERIFIKASI</th>
                            <th class="text-center" scope="col">PEMBAYARAN</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        @foreach(array_keys($data) as $x)
                        @foreach($data[$x] as $d)
                        <tr>
                            <td>{{$x}}</td>
                            <td>{{$d->tanggal}}</td>
                            <td>
                                @if($d->status=='1')
                                <button class="btn btn-sm btn-warning">MENUNGGU VERIFIKASI</button>
                                @elseif($d->status=='2')
                                <button class="btn btn-sm btn-info">SUDAH TERVERIFIKASI</button>
                                @endif
                            </td>
                            <td>
                                @if($d->pembayaran=='konfirm')
                                <button class="btn btn-sm btn-info">SUDAH TERKONFIRMASI</button>
                                @elseif($d->pembayaran=='belum')
                                <button class="btn btn-sm btn-warning">MENUNGGU KONFIRMASI</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection