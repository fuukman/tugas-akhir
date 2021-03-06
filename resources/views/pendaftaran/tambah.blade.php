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
    <li class="active">Baru</li>
</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Pendaftaran Pasien Baru</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form id="form_validation" method="post" action="{{url('pendaftaran-pasien')}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="col-lg-6">
                                                    <div class="form-group {{ $errors->has('noRm') ? 'has-error' : ''}}">
                                                        <label for="nama_q">Nomor Rekam Medis*</label>
                                                        <input class="form-control" value="{{$noRM}}" readonly="" name="noRm" id="noRm" type="text" placeholder="Nomor Rekam Medis">
                                                        @if ($errors->has('noRm'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('noRm') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
                                                        <label for="nama">Nama Pasien*</label>
                                                        <input class="form-control" required type="text" value="{{old('nama')}}" name="nama" placeholder="Nama Pasien">
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
                                                        <select name="provinsi" required class="form-control" style="width:350px">
                                                            <option value="">--- Pilih Provinsi ---</option>
                                                            @foreach ($provinces as $key => $value)
                                                            <option value="{{ $key }}">{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Pilih Kabupaten/Kota :*</label>
                                                        <select name="kota" required class="form-control" style="width:350px">
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Pilih Kecamatan :*</label>
                                                        <select name="kecamatan" required class="form-control" style="width:350px">
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Pilih Kelurahan/Desa :*</label>
                                                        <select name="kelurahan" required class="form-control" style="width:350px">
                                                        </select>
                                                    </div>

                                                    <div class="form-group {{ $errors->has('dukuh') ? 'has-error' : ''}}">
                                                        <label for="dukuh">Dukuh*</label>
                                                        <input class="form-control" required type="text" value="{{old('dukuh')}}" name="dukuh" placeholder="Dukuh">
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
                                                                    <input placeholder="RT" required type='number' value="{{old('rt')}}" name="rt" class="form-control" id="rt" >
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
                                                                    <input placeholder="rw" type='number' required value="{{old('rw')}}" name="rw" class="form-control" id="rw" >
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
                                                                    <input placeholder="Tanggal Lahir" type='text' value="{{old('tglLahir')}}" name="tglLahir" required class="form-control" id="tanggal_lahir" >
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
                                                               <input class="form-control" required name="tmptLahir" value="{{old('tmptLahir')}}" id="tmptLahir" type="text" placeholder="Tempat Lahir">
                                                           </div>
                                                       </div>                                                             
                                                   </div>

                                                   
                                                 </div>
                                            <div class="col-lg-6">
                                            <div class="row">
                                                     <div class="col-md-6">
                                                    <div class="form-group">
                                                         <label class="control-label">Jenis Kelamin*</label>
                                                         <div class="input-group date">
                                                                <select name="jenisKelamin" required class="form-control">
                                                                <option value="">pilih</option>
                                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                                    <option value="Perempuan">Perempuan</option>
                                                                </select>
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('jenisKelamin') }}</strong>
                                                                </span>

                                                            </div>
                                                        </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                     <label class="control-label " for="agama">Agama*</label>
                                                     <div class="input-group date">
                                                            <select name="agama" required class="form-control">
                                                                <option value="">pilih</option>
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

                                        <div class="row">
                                         <div class="col-md-6">
                                        
                                             <label class="control-label " for="statusPerkawinan">Status Perkawinan*</label>
                                             <div class="input-group date">
                                                <div class="form-group">
                                                    <select name="statusPerkawinan" id="statusPerkawinan" required class="form-control">
                                                    <option value="">pilih</option>
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

                                    <div class="col-md-6">
                                       <div class="form-group">
                                         <label class="control-label" for="pendidikanPasien">Pendidikan Pasien*</label>
                                         <div class="input-group date">
                                                <input placeholder="Pendidikan Pasien" required type='text' value="{{old('pendidikanPasien')}}" name="pendidikanPasien" class="form-control" id='pendidikanPasien' />

                                                <span class="help-block">
                                                    <strong>{{ $errors->first('pendidikanPasien') }}</strong>
                                                </span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                            <div class="form-group">
                                    <label for="pekerjaanPasien">Pekerjaan Pasien*</label>
                                    <input class="form-control" id="pekerjaanPasien" required value="{{old('pekerjaanPasien')}}" name="pekerjaanPasien" placeholder="Pekerjaan Pasien">
                                    @if ($errors->has('pekerjaanPasien'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pekerjaanPasien') }}</strong>
                                    </span>
                                    @endif
                               </div>


                              <div class="form-group">
                                 <label class="control-label " for="kewarganegaraan">kewarganegaraan*</label>
                                   <select name="kewarganegaraan"  class="form-control" required="">
                                       <option value="">pilih</option>
                                       <option value="WNI">WNI</option>
                                       <option value="WNA">WNA</option>
                                   </select>
                            </div>
                       

                        <div class="form-group">
                            <label for="namaOrtu">Nama Orang Tua*</label>
                            <input class="form-control" id="namaOrtu" name="namaOrtu" required value="{{old('namaOrtu')}}" type="text" placeholder="Nama Orang Tua">
                        </div>

                        <div class="form-group" style="display: none;" id="istri_suami">
                        <label for="namaSuami-istri">Nama Suami/Istri</label>
                        <input class="form-control" name="namaSuami_istri" value="{{old('namaSuami_istri')}}" id="namaSuami_istri" type="text" placeholder="Nama Suami/Istri">
                    </div>

                    <div class="form-group">
                        <label for="noHp">Nomor Telepon yang Bisa Dihubungi*</label>
                        <input class="form-control" id="noHp" name="noHp"  value="{{old('noHp')}}" type="number" required placeholder="Nomor Telepon yang Bisa Dihubungi">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('tglMasuk') ? ' has-error' : '' }}">
                                <label class="control-label " for="tglMasuk">Tanggal Masuk*</label><br>
                                <div class='input-group date'>
                                <input placeholder="Tanggal Masuk" type='text'  required value="@php echo date("Y-m-d"); @endphp" name="tglMasuk" class="form-control" id="tanggal_kunjungan">
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
                        <input class="form-control" name="noPesertaJKN" value="{{old('noPesertaJKN')}}" id="noPesertaJKN" type="text" placeholder="Nomor Peserta JKN">
                    </div>
                    <div class="form-group">
                        <label for="noAsuransiLain">Nomor Asuransi Lain</label>
                        <input class="form-control" name="noAsuransiLain" value="{{old('noAsuransiLain')}}" id="noAsuransiLain" type="text" placeholder="Nomor Asuransi Lain">
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
                    url: 'pendaftaran-pasien/kota/'+propinsiID,
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
                    url: 'pendaftaran-pasien/kecamatan/'+kotaID,
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
                    url: 'pendaftaran-pasien/kelurahan/'+kecamatanID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        // console.log(data);
                        

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


<script type="text/javascript">
    $("#statusPerkawinan").on("change",function(){
        if($(this).val() == "Kawin"){
            $("#istri_suami").show();
        }else{
            $("#istri_suami").hide();
        }

    });
</script>
@endsection