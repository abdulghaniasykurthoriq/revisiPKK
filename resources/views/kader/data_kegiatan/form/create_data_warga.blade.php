@extends('kader.layout')

@section('title', 'Tambah Data Warga | Kader Dasawisma PKK Kab. Indramayu')

@section('bread', 'Tambah Data Warga')
@section('container')
<div class="container">
    <ul class="nav nav-tabs" id="dataWargaTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="dasawisma-tab" data-toggle="tab" href="#dasawisma" role="tab" aria-controls="dasawisma" aria-selected="true">Data Dasa Wisma</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="warga-tab" data-toggle="tab" href="#warga" role="tab" aria-controls="warga" aria-selected="false">Data Warga</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="aktivitas-warga-tab" data-toggle="tab" href="#aktivitas-warga" role="tab" aria-controls="aktivitas-warga" aria-selected="false">Data Aktivitas Warga</a>
        </li>

    </ul>
    <form action="{{ route('data_warga.store') }}" method="POST">
        @csrf
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="dasawisma" role="tabpanel" aria-labelledby="dasawisma-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-end mb-4">
                            <div class="col-md-2 d-flex justify-content-end">
                                <!-- Tombol yang memicu modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalSaya">
                                    Klik Info
                                </button>
                            </div>
                        </div>

                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{  ($error)  }}</li>

                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label>Dasa Wisma</label>
                                            <select class="form-control" id="id_dasawisma" name="id_dasawisma">
                                                {{-- <option value="" hidden> Pilih Dasa Wisma</option> --}}
                                                @foreach ($dasawisma as $c)
                                                    @if ($kader->id_dasawisma == $c->id)
                                                    <option selected value="{{$c->id}}">{{ $c->nama_dasawisma }}</option>

                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('dasa_wisma')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('id_desa') is-invalid @enderror">
                                            <label for="exampleFormControlSelect1">Desa</label>
                                            @foreach ($desas as $c)
                                                <input type="hidden" class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" value="{{$c->id}}">
                                                <input type="text" disabled class="form-control" name="id_desa" id="id_desa" placeholder="Masukkan Nama Desa" value="{{ $c->nama_desa }}">

                                            @endforeach
                                        </div>
                                        @error('id_desa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('id_kecamatan') is-invalid @enderror">
                                            <label for="exampleFormControlSelect1">Kecamatan</label>
                                            {{-- nama kecamatan --}}
                                            @foreach ($kec as $c)
                                            <input type="hidden" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" value="{{$c->id}}">
                                            <input type="text" disabled class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan Nama Desa" value="{{ $c->nama_kecamatan }}">

                                            @endforeach
                                        </div>
                                        @error('id_kecamatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Kabupaten</label>
                                            {{-- nama kabupaten --}}
                                                <input type="text" readonly class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" id="kabupaten" placeholder="Masukkan kabupaten" value="Indramayu">
                                                @error('kabupaten')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Provinsi</label>
                                            {{-- nama provinsi --}}
                                                <input type="text" readonly class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi" placeholder="Masukkan Provisni" value="Jawa Barat">
                                                @error('provinsi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" data-action="next" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="warga" role="tabpanel" aria-labelledby="warga-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-end mb-4">
                            <div class="col-md-2 d-flex justify-content-end">
                                <!-- Tombol yang memicu modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalSaya">
                                    Klik Info
                                </button>
                            </div>
                        </div>

                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{  ($error)  }}</li>

                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No. Registrasi</label>
                                            {{-- no.registrasi --}}
                                            <input type="text" class="form-control @error('no_registrasi') is-invalid @enderror"
                                                name="no_registrasi" id="no_registrasi"
                                                placeholder="Nomor Registrasi diisi dengan nomor urutan sesuai wilayah"
                                                value="{{ old('no_registrasi') }}">
                                            @error('no_registrasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No. KTP</label>
                                            {{-- No. KTP --}}
                                            <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp"
                                                id="no_ktp"
                                                placeholder="Diisi dengan sudah atau belum atas kepemilikan KTP dan atau Kartu Keluarga (KK)"
                                                value="{{ old('no_ktp') }}">
                                            @error('no_ktp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Warga</label>
                                            {{-- nama warga --}}
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                                                placeholder="Diisi dengan nama warga" value="{{ old('nama') }}">
                                            @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group @error('jenis_kelamin') is-invalid @enderror">
                                            <label class="form-label">Jenis Kelamin </label><br>
                                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                                                <option hidden>Pilih Jenis Kelamin</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror --}}
                                    <div class="col-md-6">
                                        <div class="form-group @error('jenis_kelamin') is-invalid @enderror">
                                            <label class="form-label">Jenis Kelamin </label><br>
                                            {{-- pilih jenis kelamin --}}
                                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                                <option hidden>Pilih Jenis Kelamin</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>

                                            <div class="kondisi_khusus"style="display: none;">
                                                <div class="form-group">
                                                    <label class="form-label">Ibu Hamil</label><br>
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="ibu_hamil" id="ibu_hamil_ya" value="1">
                                                            <label class="form-check-label" for="ibu_hamil_ya">
                                                                Ya
                                                            </label>
                                                        </div>
                                                        <div class="form-check ml-3">
                                                            <input class="form-check-input" type="radio" name="ibu_hamil" id="ibu_hamil_tidak" value="0">
                                                            <label class="form-check-label" for="ibu_hamil_tidak">
                                                                Tidak
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Ibu Menyusui</label><br>
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="ibu_menyusui" id="ibu_menyusui_ya" value="1">
                                                            <label class="form-check-label" for="ibu_menyusui_ya">
                                                                Ya
                                                            </label>
                                                        </div>
                                                        <div class="form-check ml-3">
                                                            <input class="form-check-input" type="radio" name="ibu_menyusui" id="ibu_menyusui_tidak" value="0">
                                                            <label class="form-check-label" for="ibu_menyusui_tidak">
                                                                Tidak
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('status_perkawinan') is-invalid @enderror">
                                            <label>Status Perkawinan</label><br>
                                            {{-- pilih status perkawinan --}}
                                            <select class="form-control @error('status_perkawinan') is-invalid @enderror" name="status_perkawinan" id="status_perkawinan">
                                                <option hidden>Pilih Status Perkawinan</option>
                                                <option value="menikah">Menikah</option>
                                                <option value="lajang">Lajang</option>
                                                <option value="janda">Janda</option>
                                                <option value="duda">Duda</option>
                                            </select>
                                        </div>
                                        @error('status_perkawinan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 pasangan_usia_subur" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label">Pasangan Usia Subur</label><br>
                                            <div class="d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pasangan_usia_subur" id="pasangan_usia_subur_ya" value="1">
                                                    <label class="form-check-label" for="pasangan_usia_subur_ya">
                                                        Ya
                                                    </label>
                                                </div>
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="pasangan_usia_subur" id="pasangan_usia_subur_tidak" value="0">
                                                    <label class="form-check-label" for="pasangan_usia_subur_tidak">
                                                        Tidak
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    
                                    
                                    <div class="col-md-6">
                                        <div class="form-group @error('agama') is-invalid @enderror">
                                            <label>Agama</label><br>
                                            {{-- pilih agama --}}
                                            <select class="form-control @error('agama') is-invalid @enderror" name="agama">
                                                <option hidden>Pilih Agama</option>
                                                <option value="islam">Islam</option>
                                                <option value="kristen">Kristen</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="konghucu">Konghucu</option>
                                                <option value="kepercayaan lain">Kepercayaan Lain</option>
                                            </select>
                                        </div>
                                        @error('agama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>                                 
                                    <div class="col-md-6">
                                        <div class="form-group @error('alamat') is-invalid @enderror">
                                            <label for="exampleFormControlSelect1">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Isi Alamat" value="{{ old('alamat') }}">
                                        </div>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('pendidikan') is-invalid @enderror">
                                            <label>Pendidikan</label><br>
                                            {{-- Pilih Pendidikan --}}
                                            <select class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan">
                                                <option hidden>Pilih Pendidikan</option>
                                                <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                                                <option value="SD/MI">SD/MI</option>
                                                <option value="SMP/Sederajat">SMP/Sederajat</option>
                                                <option value="SMA/Sederajat">SMA/Sederajat</option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="D4/S1">D4/S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                        @error('pendidikan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('pekerjaan') is-invalid @enderror">
                                            <label>Pekerjaan</label><br>
                                            {{-- Pilih Pekejaan --}}
                                            <select class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan">
                                                <option hidden>Pilih Pekerjaan</option>
                                                <option value="Petani">Petani</option>
                                                <option value="Pedagang">Pedagang</option>
                                                <option value="Swasta">Swasta</option>
                                                <option value="Wirausaha">Wirausaha</option>
                                                <option value="TNI Polri">TNI Polri</option>
                                                <option value="PNS">PNS</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        @error('pekerjaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan"
                                            id="jabatan" placeholder="Diisi jabatan yang bersangkutan pada di struktural TP PKK"
                                            value="{{ old('jabatan') }}">
                                            @error('jabatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tempat lahir</label>
                                            {{-- Tempat lahir --}}
                                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                                                id="tempat_lahir" placeholder="Diisi Kota/Kabupaten tempat lahir yang bersangkutan"
                                                value="{{ old('tempat_lahir') }}">
                                            @error('tempat_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal lahir</label>
                                            {{-- Tanggal lahir --}}
                                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir"
                                                id="tgl_lahir" placeholder="Diisi tanggal lahir" data-date-format="mm/dd/yyyy"
                                                value="{{ old('tgl_lahir') }}">
                                            @error('tgl_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Umur</label>
                                            <input type="number" class="form-control @error('umur') is-invalid @enderror" name="umur" id="umur"
                                                placeholder="Diisi Umur" value="{{ old('umur') }}">
                                            @error('umur')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-md-6 tiga_buta" >
                                        <div class="form-group ">
                                            <label class="form-label">3 Buta</label><br>
                                            <div class="d-flex">
                                                <span class="form-check">
                                                    <input class="form-check-input" type="radio" name="tiga_buta" value="1">
                                                    <label class="form-check-label" for="tiga_buta">
                                                        Ya
                                                    </label>
                                                </span>
                                                <span class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="tiga_buta" value="0">
                                                    <label class="form-check-label" >
                                                        Tidak
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('periode') is-invalid @enderror">
                                            {{-- pilih periode --}}
                                            <label>Periode</label>
                                            <select style="cursor:pointer;" class="form-control" id="periode" name="periode">
                                                <option value="" hidden> Pilih Tahun</option>
                                                    <?php
                                                    $year = date('Y');
                                                    $min = $year ;
                                                        $max = $year + 20;
                                                    for( $i=$min; $i<=$max; $i++ ) {
                                                    echo '<option value='.$i.'>'.$i.'</option>';
                                                }?>
                                            </select>
                                        </div>
                                        @error('periode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('id_user') is-invalid @enderror">
                                            {{-- nama kader --}}
                                            @foreach ($kad as $c)
                                            <input type="hidden" class="form-control" name="id_user" id="id_user"
                                                placeholder="Masukkan Nama Desa" value="{{$c->id}}">
                                            @endforeach
                                        </div>
                                        @error('id_user')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" data-action="next" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="aktivitas-warga" role="tabpanel" aria-labelledby="aktivitas-warga-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-end mb-4">
                            <div class="col-md-2 d-flex justify-content-end">
                                <!-- Tombol yang memicu modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalSaya">
                                    Klik Info
                                </button>
                            </div>
                        </div>

                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{  ($error)  }}</li>

                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group @error('ikut_kelompok_belajar') is-invalid @enderror">
                                    <label>Mengikuti Jenis Kelompok Belajar </label><br>
                                    {{-- Pilih Pekejaan --}}
                                    <select class="form-control @error('ikut_kelompok_belajar') is-invalid @enderror"
                                        name="ikut_kelompok_belajar">
                                        <option hidden>Pilih Jenis Kelompok Belajar</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                        <option value="Paket A">Paket A</option>
                                        <option value="Paket B">Paket B</option>
                                        <option value="Paket C">Paket C</option>
                                        <option value="KF (Keaksaraan Fungsional)">KF (Keaksaraan Fungsional)</option>
                                    </select>
                                </div>
                                @error('pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <div class="form-group @error('akseptor_kb') is-invalid @enderror">
                                    <label>Akseptor KB</label><br>
                                    {{-- Pilih Akseptor --}}
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="akseptor_kb" value="ya" class="form-check-input">Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="akseptor_kb" value="tidak" class="form-check-input">Tidak
                                        </label>
                                    </div>
                                </div>
                                @error('akseptor_kb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @error('aktif_posyandu') is-invalid @enderror">
                                    <label>Aktif dalam kegiatan Posyandu</label><br>
                                    {{-- Pilih aktif dalam kegiatan Posyandu --}}
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="aktif_posyandu" value="ya" class="form-check-input">Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="aktif_posyandu" value="tidak" class="form-check-input">Tidak
                                        </label>
                                    </div>
                                </div>
                                @error('aktif_posyandu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group @error('ikut_bkb') is-invalid @enderror">
                                    <label>Mengikuti Program Bina Keluarga Balita</label><br>
                                    {{-- Pilih mengikuti program bkb --}}
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="ikut_bkb" value="ya" class="form-check-input">Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="ikut_bkb" value="tidak" class="form-check-input">Tidak
                                        </label>
                                    </div>
                                </div>
                                @error('ikut_bkb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <div class="form-group @error('memiliki_tabungan') is-invalid @enderror">
                                    <label>Memiliki Tabungan</label><br>
                                    {{-- Pilih memiliki tabungan --}}
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="memiliki_tabungan" value="ya" class="form-check-input">Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="memiliki_tabungan" value="tidak" class="form-check-input">Tidak
                                        </label>
                                    </div>
                                </div>
                                @error('memiliki_tabungan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group @error('ikut_paud_sejenis') is-invalid @enderror">
                                    <label>Mengikuti PAUD/Sejenis</label><br>
                                    {{-- Pilih PAUD/Sejenis --}}
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="ikut_paud_sejenis" value="ya" class="form-check-input">Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="ikut_paud_sejenis" value="tidak" class="form-check-input">Tidak
                                        </label>
                                    </div>
                                </div>
                                @error('ikut_paud_sejenis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @error('ikut_koperasi') is-invalid @enderror">
                                    <label>Ikut dalam Kegiatan Koperasi</label><br>
                                    {{-- Pilih mengikuti kegiatan koperasi --}}
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="ikut_koperasi" value="ya" class="form-check-input">Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="ikut_koperasi" value="tidak" class="form-check-input">Tidak
                                        </label>
                                    </div>
                                </div>
                                @error('ikut_koperasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <div class="form-group @error('id_user') is-invalid @enderror">
                                    @foreach ($kad as $c)
                                    <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Masukkan Nama Desa"
                                        value="{{$c->id}}">
                                    @endforeach
                                </div>
                                @error('id_user')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
                <!-- Contoh Modal -->
                <div class="modal fade" id="modalSaya" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel"aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalSayaLabel">Info Keterangan Atribut </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <tr>
                                        <th colspan="1">Point/Isian</th>
                                        <th>Penjelasan</th>
                                    </tr>
                                    <tr>
                                        <td>Dasa Wisma</td>
                                        <td>Di isi sesuai dengan nama dasawisma yang diikuti warga yang bersangkutan
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Nama Kepala Keluarga</td>
                                        <td>Di isi dengan nama Kepala Rumah Tangga pada rumah yang didata.
                                            Kepala Rumah Tangga adalah yang bertanggung jawab atas segala sesuatu yang
                                            terkait dengan kegiatan di dalam rumah yang sedang didata.</td>

                                    </tr>
                                    <tr>
                                        <td>No. Registrasi</td>
                                        <td>Nomor Registrasi diisi dengan nomor urutan sesuai wilayah,
                                            misalnya:020103042009001,dengan rincian: 02:prov; 01:kab/kota; 03:kec;
                                            04:desa/kelurahan; 2009:th masuk; 001 : nomor pendataan</td>
                                    </tr>
                                    <tr>
                                        <td>No. KTP/NIK</td>
                                        <td>Di isi dengan sudah atau belum atas kepemilikan KTP dan atau Kartu Keluarga
                                            (KK)</td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>Jabatan yang bersangkutan pada di struktural TP PKK</td>
                                    </tr>
                                    <tr>
                                        <td>Status Dalam Keluarga</td>
                                        <td>Diisi sesuai status yang bersangkutan didalam rumah yang sedang di data.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Akseptor KB</td>
                                        <td>Diisi dengan apakah yang bersangkutan mengikuti program KB dan jenis
                                            akseptor KB yang dipilih</td>
                                    </tr>
                                    <tr>
                                        <td>Memiliki Tabungan</td>
                                        <td>Tabungan tidak hanya berupa uang di bank, tetapi bisa juga berupa ternak,
                                            tanaman keras, tanah dll
                                            sesuai dengan situasi kondisi masing-masing daerah</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke</button>
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@push('script-addon')

<script type="text/javascript">

    $(function() {

      $( "#datepicker" ).datepicker({

             changeMonth: true,

             changeYear: true

         });

    });

       window.onload=function(){

           $('#tgl_lahir').on('change', function() {

               var dob = new Date(this.value);

               var today = new Date();

                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

               $('#umur').val(age);

           });

       }

</script>

<script>
    $(document).ready(function() {
    $('#id_kecamatan').on('change', function() {
       var categoryID = $(this).val();
       console.log('cek data kecamatan');
       if(categoryID) {
        console.log('cek get data desa');

           $.ajax({
               url: '/getDesa/'+categoryID,
               type: "GET",
               data : {"_token":"{{ csrf_token() }}"},
               dataType: "json",
               success:function(data)
               {
                console.log('sukses cek data desa');

                 if(data){
                    $('#id_desa').empty();
                    $('#id_desa').append('<option value="" hidden>Pilih Desa</option>');
                    $.each(data, function(key, desas){
                        $('select[name="id_desa"]').append('<option value="'+ key +'">' + desas.nama_desa+ '</option>');
                    });
                }else{
                    $('#id_desa').empty();
                }
             }
           });
       }else{
         $('#id_desa').empty();
       }
    });

        $(document).on('click', '[data-action="next"]', function (e) {
            var $active = $('#dataWargaTabs .active');
            var hasError = false;

            $($active.attr('href')).find('[name]').each(function () {
                if ((!$(this).prop('disabled') || !$(this).prop('readonly')) && !$(this).val()) {
                    $(this).addClass('is-invalid');
                    hasError = true;
                }
            });
            if (!hasError) {
                $active.parent().next().find('a').click();
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mendapatkan elemen jenis_kelamin
        var jenisKelaminSelect = document.getElementById('jenis_kelamin');

        // Mendapatkan elemen kondisi_khusus
        var kondisiKhususDiv = document.querySelector('.kondisi_khusus');

        // Tambahkan event listener untuk perubahan pada jenis_kelamin
        jenisKelaminSelect.addEventListener('change', function() {
            // alert('ayam geprek')
            // Jika jenis kelamin yang dipilih adalah perempuan, tampilkan kondisi_khusus
            if (jenisKelaminSelect.value === 'perempuan') {
                kondisiKhususDiv.style.display = 'block';
            } else {
                // Jika jenis kelamin yang dipilih bukan perempuan, sembunyikan kondisi_khusus
                kondisiKhususDiv.style.display = 'none';
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mendapatkan elemen pasangan_usia_subur
        var statusPerkawinan = document.getElementById('status_perkawinan');

        // Mendapatkan elemen pasangan_usia_subur
        var pasangan_usia_subur = document.querySelector('.pasangan_usia_subur');

        // Tambahkan event listener untuk perubahan pada pasangan_usia_subur
        statusPerkawinan.addEventListener('change', function() {
            // alert('ayam geprek')
            // Jika jenis kelamin yang dipilih adalah menikah, tampilkan pasangan_usia_subur
            if (statusPerkawinan.value === 'menikah') {
                pasangan_usia_subur.style.display = 'block';
            } else {
                // Jika jenis kelamin yang dipilih bukan menikah, sembunyikan pasangan_usia_subur
                pasangan_usia_subur.style.display = 'none';
            }
        });
    });
</script>
@endpush
