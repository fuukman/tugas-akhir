@extends('layouts.index')
@section('title') Pelaporan Eksternal @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{url('plugins/iCheck/all.css')}}">
@endsection
@section('content')
<section class="content-header">
	<h1>
		Pelaporan
		<small>Index</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{url('/index')}}">Pelaporan</a></li>
		<li class="active">Pilih Tanggal</li>
	</ol>
</section>
<br>
<br>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-5 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">Pilih Tanggal</div>
				<div class="panel-body">
					<div class="col-md-12">
						<form action="{{url('index')}}" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							
							<div class="form-group" style="text-align: center;">
								<div class="col-md-4">
									<label>
									&nbsp&nbsp	<input type="radio" class="flat-red" name="index" id="optionsRadios1" value="penyakit">
										I.Penyakit
									</label>
								</div>
								<div>
									<label>
										<input type="radio" class="flat-red" name="index" id="optionsRadios1" value="tindakan" >
										I.Tindakan
									</label>
								</div>
								<div class="col-md-4">
									<label>
										<input type="radio" class="flat-red" name="index" id="optionsRadios1" value="dokter" >
										I.Dokter
									</label>
								</div>
								{{-- <div>
									<label>
										<input type="radio" class="flat-red" name="index" id="optionsRadios1" value="kematian" >
										I.Kematian
									</label>
								</div> --}}
							</div>
							
							<div  id="list" style="display: none;" class="form-group">
							<label>Pilih</label>
								<select class="form-control" name="list"></select>
							</div>
							
							<!-- Minimal red style -->
							<div class="form-group{{ $errors->has('dariTanggal') ? ' has-error' : '' }}">
								<label class="control-label " for="dariTanggal">Dari Tanggal</label><br>
								<div class='input-group date'>
									<input placeholder="Tanggal Kunjungan" type='text' value="<?php echo date("Y-m-d"); ?>" name="dariTanggal" class="form-control" id="dariTanggal">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>

								@if ($errors->has('dariTanggal'))
								<span class="help-block">
									<strong>{{ $errors->first('dariTanggal') }}</strong>
								</span>
								@endif
							</div>

							<div class="form-group{{ $errors->has('sampaiTanggal') ? ' has-error' : '' }}">
								<label class="control-label " for="sampaiTanggal">Sampai Tanggal</label><br>
								<div class='input-group date'>
									<input placeholder="Tanggal Kunjungan" type='text' value="<?php echo date("Y-m-d"); ?>" name="sampaiTanggal" class="form-control" id="sampaiTanggal">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
								@if ($errors->has('sampaiTanggal'))
								<span class="help-block">
									<strong>{{ $errors->first('sampaiTanggal') }}</strong>
								</span>
								@endif
							</div>
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary btn-block btn-lg">Cetak <span class="glyphicon glyphicon-print"></span></button>
							</div>
						</form>
					</div>
				</div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<!-- bootstrap datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{url('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{url('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{url('/plugins/iCheck/icheck.min.js')}}"></script>

<script>
	$(function () {

     //Date picker
     $('#dariTanggal').datepicker({
     	autoclose: true,
     	format: 'yyyy-mm-dd'
     });
   //Date picker
   $('#sampaiTanggal').datepicker({
   	autoclose: true,
   	format: 'yyyy-mm-dd'
   });
 //Flat red color scheme for iCheck
 // $('input[type="radio"]').iCheck({
 // 	checkboxClass: 'icheckbox_flat-green',
 // 	radioClass: 'iradio_flat-green'
 // });
 
});
</script>
<script>
	$(document).ready(function() {
    $("input[type=radio][name=index]").change(function() {

    	 if (this.value == "penyakit") {
    	 	$('#list').show();
     		$("select[name=list]").removeAttr('disabled');
                $.ajax({
                    url: '{{ url('/index/list/penyakit') }}',
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        // console.log(data);
                        $('select[name="list"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="list"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
        }
        else if (this.value == "tindakan") {
        	$('#list').show();
     		$("select[name=list]").removeAttr('disabled');
                $.ajax({
                    url: '{{ url('/index/list/tindakan') }}',
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        // console.log(data);
                        $('select[name="list"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="list"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            
        }else if(this.value == "dokter"){
        	$('#list').show();
     		$("select[name=list]").removeAttr('disabled');
                $.ajax({
                    url: '{{ url('/index/list/dokter') }}',
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        // console.log(data);
                        $('select[name="list"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="list"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            

        }else{
  			$("select[name=list]").attr('disabled','disabled');
        	$('#list').hide();

        }	
    	

       
    });
});
</script>

@endsection