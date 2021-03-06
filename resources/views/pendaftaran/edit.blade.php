@extends('layouts.index')
@section('title') Pendaftaran Pasien Baru @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
@endsection
@section('content')

<section class="content-header">
  <h1>
      Pendaftaran Pasien
      <small>Pendaftaran Pasien Baru</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Pendaftaran</a></li>
    <li class="active">Ubah</li>
</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Pendaftaran Ubah Pasien</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form role="form" method="post" action="{{url('pendaftaran-pasien/ubah/'.$data->id)}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="col-lg-6">
                                                    <div class="form-group {{ $errors->has('noRm') ? 'has-error' : ''}}">
                                                        <label for="nama_q">Nomor Rekam Medis*</label>
                                                        <input class="form-control" value="{{ $data->noRm }}" readonly="" name="noRm" id="noRm" type="text" placeholder="Nomor Rekam Medis">
                                                        @if ($errors->has('noRm'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('noRm') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
                                                        <label for="nama">Nama Pasien*</label>
                                                        <input class="form-control" type="text" value="{{ $data->nama }}" name="nama" placeholder="Nama Pasien">
                                                        @if ($errors->has('nama'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('nama') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <hr>
                                                    <center><label for="title">Alamat Lengkap :</label></center>
                                                    <div class="form-group">
                                                        <label for="title">Pilih Provinsi :*</label>
                                                        <select name="provinsi" class="form-control" style="width:350px">
                                                            <option selected="" hidden="" value="{{ $data->provinsi }}">{{ $data->provinsi }}</option>
                                                            @foreach ($provinces as $key => $value)
                                                            <option value="{{ $key }}">{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Pilih Kabupaten/Kota :*</label>
                                                        <select name="kota" class="form-control" style="width:350px">
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Pilih Kecamatan :*</label>
                                                        <select name="kecamatan" class="form-control" style="width:350px">
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Pilih Kelurahan/Desa :*</label>
                                                        <select name="kelurahan" class="form-control" style="width:350px">
                                                        </select>
                                                    </div>

                                                    <div class="form-group {{ $errors->has('dukuh') ? 'has-error' : ''}}">
                                                        <label for="dukuh">Dukuh*</label>
                                                        <input class="form-control" type="text" value="{{ $data->dukuh }}" name="dukuh" placeholder="Dukuh">
                                                        @if ($errors->has('dukuh'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('dukuh') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group{{ $errors->has('rt') ? ' has-error' : '' }}">
                                                                <label class="control-label " for="RT">RT*</label><br>
                                                                <div class='input-group date'>
                                                                    <input placeholder="RT" type='number' value="{{ $data->rt }}" name="rt" class="form-control" id="rt" >
                                                                </div>
                                                                @if ($errors->has('RT'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('RT') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                       <div class="col-md-6">
                                                            <div class="form-group{{ $errors->has('rw') ? ' has-error' : '' }}">
                                                                <label class="control-label " for="rw">RW*</label><br>
                                                                <div class='input-group date'>
                                                                    <input placeholder="rw" type='number' value="{{ $data->rw }}" name="rw" class="form-control" id="rw" >
                                                                </div>
                                                                @if ($errors->has('rw'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('rw') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>                                                          
                                                   </div>
                                                    
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group{{ $errors->has('tglLahir') ? ' has-error' : '' }}">
                                                                <label class="control-label " for="tglLahir"> Tanggal Lahir*</label><br>
                                                                <div class='input-group date'>
                                                                    <input placeholder="Tanggal Lahir" type='text' value="{{ $data->tglLahir }}" name="tglLahir" class="form-control" id="tanggal_lahir" >
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                </div>
                                                                @if ($errors->has('tglLahir'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('tglLahir') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="tmptLahir">Tempat Lahir*</label>
                                                            <div class="form-group">
                                                               <input class="form-control" name="tmptLahir" value="{{ $data->tmptLahir }}" id="tmptLahir" type="text" placeholder="Tempat Lahir">
                                                           </div>
                                                       </div>                                                             
                                                   </div>

                                                   <div class="row">
                                                     <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('jenisKelamin') ? 'has-error' : ''}}">
                                                         <label class="control-label " for="jenisKelamin">Jenis Kelamin*</label>
                                                         <div class="input-group date">
                                                            <div class="form-group">
                                                                <select name="jenisKelamin" class="form-control">
                                                                <option value="">pilih</option>
                                                                <option hidden="" selected="" value="{{ $data->jenisKelamin }}">{{ $data->jenisKelamin }}</option>
                                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                                    <option value="Perempuan">Perempuan</option>
                                                                </select>
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('jenisKelamin') }}</strong>
                                                                </span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group {{ $errors->has('agama') ? 'has-error' : ''}}">
                                                     <label class="control-label " for="agama">Agama*</label>
                                                     <div class="input-group date">
                                                        <div class="form-group">
                                                            <select name="agama" class="form-control">
                                                                <option value="">pilih</option>
                                                                <option value="{{ $data->agama }}" selected="" hidden="">{{ $data->agama }}</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Khonghucu">Khonghucu</option>
                                                            </select>
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('agama') }}</strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('statusPerkawinan') ? 'has-error' : ''}}">
                                             <label class="control-label " for="statusPerkawinan">Status Perkawinan*</label>
                                             <div class="input-group date">
                                                <div class="form-group">
                                                    <select name="statusPerkawinan" class="form-control">
                                                    <option value="">pilih</option>
                                                    <option selected="" hidden="" value="{{ $data->statusPerkawinan }}">{{ $data->statusPerkawinan }}</option>
                                                        <option value="Kawin">Kawin</option>
                                                        <option value="Belum Kawin">Belum Kawin</option>
                                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                                        <option value="Cerai Mati">Cerai Mati</option>
                                                    </select>
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('statusPerkawinan') }}</strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('pendidikanPasien') ? 'has-error' : ''}}">
                                         <label class="control-label " for="pendidikanPasien">Pendidikan Pasien*</label>
                                         <div class="input-group date">
                                            <div class="form-group">
                                                <input placeholder="Pendidikan Pasien" type='text' value="{{ $data->pendidikanPasien }}" name="pendidikanPasien" class="form-control" id='pendidikanPasien' />

                                                <span class="help-block">
                                                    <strong>{{ $errors->first('pendidikanPasien') }}</strong>
                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="form-group {{ $errors->has('pekerjaanPasien') ? 'has-error' : ''}}">
                                    <label for="pekerjaanPasien">Pekerjaan Pasien*</label>
                                    <input class="form-control" id="pekerjaanPasien" value="{{ $data->pekerjaanPasien }}" name="pekerjaanPasien" placeholder="Pekerjaan Pasien"  >
                                    @if ($errors->has('pekerjaanPasien'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pekerjaanPasien') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group {{ $errors->has('kewarganegaraan') ? 'has-error' : ''}}">
                                 <label class="control-label " for="kewarganegaraan">kewarganegaraan*</label>
                                 <div class="form-group">
                                   <select name="kewarganegaraan" class="form-control">
                                       <option value="">pilih</option>
                                       <option value="{{ $data->kewarganegaraan }}" hidden="" selected="">{{ $data->kewarganegaraan }}</option>
                                       <option value="WNI">WNI</option>
                                       <option value="WNA">WNA</option>
                                   </select>
                                   <span class="help-block">
                                    <strong>{{ $errors->first('kewarganegaraan') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="namaOrtu">Nama Orang Tua*</label>
                            <input class="form-control" id="namaOrtu" name="namaOrtu" value="{{ $data->namaOrtu }}" type="text" placeholder="Nama Orang Tua">
                        </div>
                        <label for="namaSuami-istri">Nama Suami/Istri</label>
                        <input class="form-control" name="namaSuami_istri" value="{{ $data->namaSuami_istri }}" id="namaSuami_istri" type="text" placeholder="Nama Suami/Istri">
                    </div>

                    <div class="form-group">
                        <label for="noHp">Nomor Telepon yang Bisa Dihubungi*</label>
                        <input class="form-control" id="noHp" name="noHp" value="{{ $data->noHp }}" type="number" placeholder="Nomor Telepon yang Bisa Dihubungi">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('tglMasuk') ? ' has-error' : '' }}">
                                <label class="control-label " for="tglMasuk">Tanggal Masuk*</label><br>
                                <div class='input-group date'>
                                <input placeholder="Tanggal Masuk" type='text' value="{{ $data->tglMasuk }}" name="tglMasuk" class="form-control" id="tanggal_kunjungan">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                @if ($errors->has('tglMasuk'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tglMasuk') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="noPesertaJKN">Alergi</label>
                        <input class="form-control" name="riwayatAlergi" value="{{old('riwayatAlergi')}}" id="riwayatAlergi" type="text" placeholder="Alergi">
                    </div>
                    <div class="form-group">
                        <label for="noPesertaJKN">Nomor Peserta JKN</label>
                        <input class="form-control" name="noPesertaJKN" value="{{ $data->noPesertaJKN }}" id="noPesertaJKN" type="text" placeholder="Nomor Peserta JKN">
                    </div>
                    <div class="form-group">
                        <label for="noAsuransiLain">Nomor Asuransi Lain</label>
                        <input class="form-control" name="noAsuransiLain" value="{{ $data->noAsuransiLain }}" id="noAsuransiLain" type="text" placeholder="Nomor Asuransi Lain">
                    </div>

                </div>
                <div class="col-md-12">
                    <br><br><br><br><br>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Simpan</button>
                </div>
            </form>
            <!-- /.row (nested) -->
        </div>
        <!--End Advanced Tables -->
    </div>
</div>

</div>
<!-- /. PAGE INNER  -->
</div>
</div>
<!-- /.box-body -->
</form>
</div>
<!-- /.box -->


</div>
</div>
</div>
<!-- /.row -->
</section>
<!-- /.content -->

@endsection

@section('js')
<!-- bootstrap datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{url('plugins/datepicker/bootstrap-datepicker.js')}}"></script>

<script>
  $(function () {

    //Date picker
    $('#tanggal_lahir').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
  });
   //Date picker
   $('#tanggal_kunjungan').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
  });

});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="provinsi"]').on('change', function() {
            var propinsiID = $(this).val();
            if(propinsiID) {
                $.ajax({
                    url: '{{ url('/') }}/pendaftaran-pasien/kota/'+propinsiID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        // console.log(data);
                        $('select[name="kota"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="kota"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="kota"]').empty();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kota"]').on('change', function() {
            var kotaID = $(this).val();
            if(kotaID) {
                $.ajax({
                    url: '{{ url('/') }}/pendaftaran-pasien/kecamatan/'+kotaID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {


                        $('select[name="kecamatan"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="kecamatan"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="kecamatan"]').empty();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kecamatan"]').on('change', function() {
            var kecamatanID = $(this).val();
            if(kecamatanID) {
                $.ajax({
                    url: '{{ url('/') }}/pendaftaran-pasien/kelurahan/'+kecamatanID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                        

                        $('select[name="kelurahan"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="kelurahan"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="kelurahan"]').empty();
            }
        });
    });
</script>



@endsection