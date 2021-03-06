@extends('layouts.index')
@section('title') Unit Gawat Darurat @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">

@endsection
@section('content')

<section class="content-header">
  <h1>
      Pendaftaran Pasien
      <small>Pendaftaran Unit Gawat Darurat</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('/')}}">Pendaftaran</a></li>
    <li class="active">Baru</li>
</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Pendaftaran Unit Gawat Darurat</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                           <form id="form_validation" method="post" action="{{ url('igd') }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="col-lg-6">
                                                    <div class="form-group {{ $errors->has('noRm') ? 'has-error' : ''}}">
                                                        <label for="noRm">Nomor Rekam Medis*</label>
                                                        <input class="form-control" id="noRm" name="noRm" readonly="" value="{{$igd->noRm}}" type="text" placeholder="Nomor Rekam Medis" onkeyup="
                                                        var noRm = this.value;
                                                        if (noRm.match(/^\d{2}$/) !== null) {
                                                           this.value = noRm + '-';
                                                       } else if (noRm.match(/^\d{2}\-\d{2}$/) !== null) {
                                                           this.value = noRm + '-';
                                                       }" maxlength="8">

                                                       @if ($errors->has('noRm'))
                                                       <span class="help-block">
                                                        <strong>{{ $errors->first('noRm') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                

                                                <div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
                                                    <label for="nama">Nama Pasien*</label>
                                                    <input class="form-control" type="text" readonly="" value="{{$igd->nama}}"  id="nama" name="nama" placeholder="Nama Pasien">
                                                    @if ($errors->has('nama'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('nama') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <hr>
                                                <center><label for="title">Alamat Lengkap :</label></center>
                                                <div class="form-group">
                                                    <label for="title">Provinsi :*</label>
                                                    <input class="form-control" id="provinsi" readonly="" type="text" value="{{$igd->provinsi}}" name="provinsi" placeholder="Provinsi" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kabupaten/Kota :*</label>
                                                    <input class="form-control" id="kabupaten" readonly="" type="text" value="{{$igd->kabupaten}}" name="kabupaten" placeholder="Kabupaten/Kota" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kecamatan :*</label>
                                                    <input class="form-control" id="kecamatan" readonly="" type="text" value="{{$igd->kecamatan}}" name="kecamatan" placeholder="Kecamatan" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kelurahan/Desa :*</label>
                                                    <input class="form-control" id="kelurahan" readonly="" type="text" value="{{$igd->kelurahan}}" name="kelurahan" placeholder="Kelurahan/Desa" style="width:350px">
                                                </div>

                                                <div class="form-group {{ $errors->has('dukuh') ? 'has-error' : ''}}">
                                                    <label for="dukuh">Dukuh*</label>
                                                    <input class="form-control" id="dukuh" readonly="" type="text" value="{{$igd->dukuh}}" name="dukuh" placeholder="Dukuh">
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
                                                                <input placeholder="RT" type='text' readonly="" value="{{$igd->rt}}" name="rt" class="form-control" id="rt" >
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
                                                                <input placeholder="rw" type='text' readonly="" value="{{$igd->rw}}" name="rw" class="form-control" id="rw" >
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
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group{{ $errors->has('tglLahir') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="tglLahir"> Tanggal Lahir*</label><br>
                                                            <div class='input-group date'>
                                                                <input placeholder="Tanggal Lahir" type='text' readonly="" value="{{$igd->tglLahir}}" name="tglLahir" class="form-control" id="tglLahir" >
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

                                                    <div class="col-md-2">
                                                        <div class="form-group {{ $errors->has('tahun') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="tahun"> Tahun*</label><br>
                                                            <div class="input-group date">
                                                                <input placeholder="tahun" readonly="" type='text' value="{{$igd->tahun}}" name="tahun" class="form-control" id='tahun' />
                                                                
                                                            </div>
                                                            @if ($errors->has('tahun'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('tahun') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="col-md-2">
                                                        <div class="form-group {{ $errors->has('bulan') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="bulan"> Bulan*</label><br>
                                                            <div class="input-group date">
                                                                <input placeholder="bulan" type='text' readonly="" value="{{$igd->bulan}}" name="bulan" class="form-control" id='bulan' />
                                                                
                                                            </div>
                                                            @if ($errors->has('bulan'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('bulan') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="col-md-2">
                                                        <div class="form-group {{ $errors->has('hari') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="hari"> Hari*</label><br>
                                                            <div class="input-group date">
                                                                <input placeholder="hari" type='text' readonly="" value="{{$igd->hari}}" name="hari" class="form-control" id='hari' />
                                                                
                                                            </div>
                                                            @if ($errors->has('hari'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('hari') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group{{ $errors->has('tanggal_masuk') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="tanggal_masuk">Tanggal Masuk*</label><br>
                                                            <div class='input-group date'>
                                                                <input placeholder="Tanggal Kunjungan" required type='text' value="<?php echo date("Y-m-d"); ?>" name="tanggal_masuk" class="form-control" id="tanggal_masuk">
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                            @if ($errors->has('tanggal_masuk'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('tanggal_masuk') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                       <div class="bootstrap-timepicker">
                                                        <div class="form-group{{ $errors->has('jam_masuk') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="jam_masuk">Jam Masuk*</label><br>
                                                            <div class="input-group">
                                                                <input type="text" name="jam_masuk" required value="{{old('jam_masuk')}}" class="form-control timepicker">
                                                                <div class="input-group-addon">
                                                                  <i class="fa fa-clock-o"></i>
                                                              </div>
                                                          </div>
                                                          @if ($errors->has('jam_masuk'))
                                                          <span class="help-block">
                                                            <strong>{{ $errors->first('jam_masuk') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('alasan') ? 'has-error' : ''}}">
                                            <label for="alasan">Alasan Datang*</label>
                                            <input class="form-control" name="alasan" required id="alasan" value="{{old('alasan')}}" type="text" placeholder="Alasan Datang">
                                            @if ($errors->has('alasan'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('alasan') }}</strong>
                                            </span>
                                            @endif
                                        </div>   

                                        <div class="row">
                                           <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('pengantar') ? 'has-error' : ''}}">
                                               <label class="control-label " for="pengantar">Nama Pengantar*</label>
                                               <div class="input-group date">
                                                 <input type="text" class="form-control" required name="pengantar" value="{{old('pengantar')}}" placeholder="Nama Pengantar">
                                                 <span class="help-block">
                                                    <strong>{{ $errors->first('pengantar') }}</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('alamatPengantar') ? 'has-error' : ''}}">
                                       <label class="control-label " for="alamatPengantar">Alamat Pengantar*</label>
                                       <div class="input-group date">
                                         <input type="text" class="form-control" required value="{{old('alamatPengantar')}}" name="alamatPengantar" placeholder="Alamat Pengantar">

                                         <span class="help-block">
                                            <strong>{{ $errors->first('alamatPengantar') }}</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="form-group {{ $errors->has('caraDatang') ? 'has-error' : ''}}">
                       <label class="control-label " for="caraDatang">Cara Datang*</label>
                         <select name="caraDatang" id="caraDatang" class="form-control" required onChange="changetextbox();">
                             <option value="">pilih</option>
                             <option value="Sendiri">Sendiri</option>
                             <option value="Rujukan">Rujukan</option>
                         </select>
                         <span class="help-block">
                            <strong>{{ $errors->first('caraDatang') }}</strong>
                        </span>
                    </div>

                <div class="form-group">
                    <label for="rujukan">Rujukan</label>
                    <input class="form-control" name="rujukan" disabled="" value="{{old('rujukan')}}" id="rujukan" type="text" placeholder="Rujukan">
                </div>

                <div class="form-group {{ $errors->has('caraBayar') ? 'has-error' : ''}}">
                   <label class="control-label " for="caraBayar">Cara Bayar*</label>
                     <select name="caraBayar" id="caraBayar" required class="form-control" onChange="changetextbox();">
                         <option value="">pilih</option>
                        <option value="UMUM">UMUM</option>
                                                     <option value="BPJS">BPJS</option>
                                                     <option value="JAMKESDA">JAMKESDA</option>
                                                     <option value="JAMKESOS">JAMKESOS</option>
                                                     <option value="JASARAHARJA">JASARAHARJA</option>
                     </select>
                     <span class="help-block">
                        <strong>{{ $errors->first('caraBayar') }}</strong>
                    </span>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('kendaraan') ? 'has-error' : ''}}">
                       <label class="control-label " for="kendaraan">Kendaraan Saat Datang*</label>
                       <div class="input-group date">
                            <select name="kendaraan" required class="form-control">
                                <option value="">pilih</option>
                                <option value="Motor">Motor</option>
                                <option value="Mobil">Mobil</option>
                            </select>
                            <span class="help-block">
                                <strong>{{ $errors->first('kendaraan') }}</strong>
                            </span>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            <div class="form-group {{ $errors->has('penyebab') ? 'has-error' : ''}}">
               <label class="control-label " for="penyebab">Penyebab Cedera/ Kejadian*</label>
               <div class="input-group date">
                 <input type="text" class="form-control" required value="{{old('penyebab')}}" name="penyebab" placeholder="Penyebab Cedera/ Kejadian">
                 <span class="help-block">
                    <strong>{{ $errors->first('penyebab') }}</strong>
                </span>
            </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group {{ $errors->has('tempatKejadian') ? 'has-error' : ''}}">
       <label class="control-label" for="tempatKejadian">Tempat Kejadian*</label>
       <div class="input-group date">
         <input type="text" class="form-control" required name="tempatKejadian" value="{{old('tempatKejadian')}}" placeholder="Tempat Kejadian">
         <span class="help-block">
            <strong>{{ $errors->first('tempatKejadian') }}</strong>
        </span>
    </div>
</div>
</div>


<div class="col-md-6">
    <div class="form-group {{ $errors->has('dokterJaga') ? 'has-error' : ''}}">
       <label class="control-label " for="dokterJaga">Dokter Jaga IGD*</label>
       <div class="input-group date">
            <select name="dokterJaga" required class="form-control">
                <option value="">pilih</option>
                @foreach($dokter as $data)
                <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach
            </select>

            <span class="help-block">
                <strong>{{ $errors->first('dokterJaga') }}</strong>
            </span>
        </div>
    </div>
</div>


<div class="col-md-6">
    <div class="form-group {{ $errors->has('perawat') ? 'has-error' : ''}}">
       <label class="control-label " for="perawat">Perawat IGD*</label>
       <div class="input-group date">
            <select name="perawat" required class="form-control">
                <option value="">pilih</option>
                @foreach($perawat as $data)
                <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach
            </select>
            <span class="help-block">
                <strong>{{ $errors->first('perawat') }}</strong>
            </span>
        </div>
    </div>
</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{url('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{url('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

<script>
  $(function () {

     //Date picker
     $('#tglLahir').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
  });
   //Date picker
   $('#tanggal_masuk').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
  });

     //Timepicker
     $(".timepicker").timepicker({
        showInputs: false,
        minuteStep: 1,
        locale: 'id',
        showMeridian :false,
        use24hours: true

    });
     
 });
</script>
<script type="text/javascript">
function changetextbox()
{
    if (document.getElementById("caraDatang").value == "Sendiri") {
        document.getElementById("rujukan").disabled='true';
    } else {
        document.getElementById("rujukan").disabled='';
    }
}
</script>
@endsection