<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;
use Alert;
use Carbon;
use App\Config;
use App\Wilayah\Districts;
use App\Wilayah\Provinces;
use App\Wilayah\Regencies;
use App\Wilayah\Villages;
use DB;
use DateTime;
use App\Pasien;
use App\role_user;
use App\Rawat_Jalan;
use Datatables; 
use App\Ruangan\Bangsal;
use App\Ruangan\Kelas;
use App\Ruangan\No_Kamar;
use App\Rawat_Inap;
use App\Rawat_IGD;
class PendaftaranController extends Controller
{

    public function rawatJalanIndex(){
        $rj = Rawat_Jalan::join('pasien','id_pasien','pasien.id')
        ->orderBy('rawat_jalan.id','desc')
        ->get();

        return view('pendaftaran.indexRawatJalan')->with('rj',$rj);
    }
    public function rawatJalan(){
             $dokter = role_user::where('role_id',6)
             ->join('users','user_id','id')
             ->get();
            
    	return view('pendaftaran.rawatJalan')->with('dokter',$dokter);
    }

    public function rawatJalanInput($id){
           $rawatJalan = Pasien::findOrFail($id);

            $dokter = role_user::where('role_id',6)
             ->join('users','user_id','id')
             ->get();
            
        return view('pendaftaran.rawatJalanInput')->with('dokter',$dokter)->with('rawatJalan',$rawatJalan);

    }

    public function rawatInap(){

        $bangsal = Bangsal::pluck("nama","id");
    	return view('pendaftaran.rawatInap')->with(compact('bangsal'));
    }

    public function rawatInapIndex(){
          $inap = Rawat_Inap::join('pasien','id_pasien','pasien.id')
        ->orderBy('rawat_inap.id','desc')
        ->get();

        return view('pendaftaran.indexRawatInap')->with('inap',$inap);
    }

    public function rawatInapInput($id){
            $rawatInap = Pasien::findOrFail($id);    
          
          $bangsal = Bangsal::pluck("nama","id");
        return view('pendaftaran.rawatInapInput')->with(compact('bangsal','rawatInap'));
    }

    public function rawatInapSimpan(Request $request){
        $this->validate($request, [
            'noRm' => 'required',
            'nama' => 'required',
            'provinsi' => 'required',
            'kabupaten' =>'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'dukuh' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'tglLahir' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
            'hari' => 'required',
            'tanggal_masuk' => 'required',
            'jam_masuk' => 'required',
            'caraBayar' => 'required',
            'caraDatang' => 'required',
            'caraMasuk' => 'required',
            'bangsal' => 'required',
            'kelas' => 'required',
            ]);

        $getBangsal = Bangsal::where('id',$request->bangsal)->first();
        $bangsal = $getBangsal->nama;
        $getKelas = Kelas::where('id',$request->kelas)->first();
        $kelas = $getKelas->nama;
        $getKamar = No_Kamar::where('id',$request->kamar)->first();
        $kamar = $getKamar->kamar_no;
        
        $pasien = Pasien::where('noRm',$request->noRm)->first();
         $id = $pasien->id;
        
        $inap = new Rawat_Inap();
        $inap->id_pasien = $id;
        $inap->tanggal_masuk = $request->tanggal_masuk;
        $inap->jam_masuk = $request->jam_masuk;
        $inap->caraBayar = $request->caraBayar;
        $inap->caraDatang = $request->caraDatang;
        $inap->caraMasuk = $request->caraMasuk;
        $inap->bangsal = $bangsal;
        $inap->kelas = $kelas;
        $inap->kamar = $kamar;
        $inap->rujukan = $request->rujukan;
        $inap->Save();

     Alert::success('Berhasil', 'Data Pasien Rawat Inap telah ditambahkan');
         return back();
    }

    public function igd(){

    	return view('pendaftaran.igd');
    }

    public function igdInput($id){

         $igd = Pasien::findOrFail($id);

        return view('pendaftaran.igdInput')->with(compact('igd'));
    }

    public function igdIndex(){
         $igd = Rawat_IGD::join('pasien','id_pasien','pasien.id')
        ->orderBy('rawat_igd.id','desc')
        ->get();

        return view('pendaftaran.indexRawatIGD')->with('igd',$igd);

    }

    public function igdSimpan(Request $request){
        $this->validate($request, [
            'noRm' => 'required',
            'nama' => 'required',
            'provinsi' => 'required',
            'kabupaten' =>'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'dukuh' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'tglLahir' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
            'hari' => 'required',
            'tanggal_masuk' => 'required',
            'jam_masuk' => 'required',
            'alasan' => 'required',
            'pengantar' => 'required',
            'alamatPengantar' => 'required',
            'caraBayar' => 'required',
            'caraDatang' => 'required',
            'kendaraan' => 'required',
            'penyebab' => 'required',
            'tempatKejadian' => 'required',
            'dokterJaga' => 'required',
            'perawat' => 'required',
            ]);
        $pasien = Pasien::where('noRm',$request->noRm)->first();
         $id = $pasien->id;

        $igd = new Rawat_IGD();
        $igd->id_pasien = $id;
        $igd->tanggal_masuk = $request->tanggal_masuk;
        $igd->jam_masuk = $request->jam_masuk;
        $igd->alasan = $request->alasan;
        $igd->pengantar = $request->pengantar;
        $igd->alamatPengantar = $request->alamatPengantar;
        $igd->caraBayar = $request->caraBayar;
        $igd->caraDatang = $request->caraDatang;
        $igd->kendaraan = $request->kendaraan;
        $igd->penyebab = $request->penyebab;
        $igd->tempatKejadian = $request->tempatKejadian;
        $igd->dokterJaga = $request->dokterJaga;
        $igd->perawat = $request->perawat;
        $igd->rujukan = $request->rujukan;
        $igd->Save();

        Alert::success('Berhasil', 'Data Pasien Rawat IGD telah ditambahkan');
     return back();
    }
    public function viewCariPasien(){
        $pasien = Pasien::orderBy('id', 'desc')->get();
       

    	return view('pendaftaran.cariPasien')->with('pasien',$pasien);
    }


  public function form(){


            $config = Config::all()->first();
            $pertama = $config->no1;
            $kedua = $config->no2;
            $ketiga = $config->no3;
            
            $awal = $pertama<10?'0'.$pertama:$pertama;
            $tengah = $kedua<10?'0'.$kedua:$kedua;
            $akhir = $ketiga<10?'0'.$ketiga:$ketiga;
            $noRM = $awal.'-'.$tengah.'-'.$akhir;
            
            $provinces =  DB::table("provinces")->pluck("name","id");

          
    return view('pendaftaran.tambah')->with(compact('noRM','provinces'));
  }

  public function tambah(Request $request){
    $this->validate($request, [
            'noRm' => 'required',
            'nama' => 'required',
            'provinsi' => 'required',
            'kota' =>'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'dukuh' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'tglLahir' => 'required',
            'tmptLahir' => 'required',
            'jenisKelamin' => 'required',
            'agama' => 'required',
            'statusPerkawinan' => 'required',
            'pendidikanPasien' => 'required',
            'pekerjaanPasien' => 'required',
            'kewarganegaraan' => 'required',
            'namaOrtu' => 'required',
            'namaSuami_istri' => 'required',
            'noHp' => 'required',
            'tglMasuk' => 'required',
            'caraBayar' => 'required',
            'caraDatang' => 'required',
            'noPesertaJKN' => 'required',
            ]);


    $getProvinsi = Provinces::where('id',$request->provinsi)->first();
    $getKota = Regencies::where('id',$request->kota)->first();
    $getKecamatan = Districts::where('id',$request->kecamatan)->first();
    $getKelurahan = Villages::where('id',$request->kelurahan)->first();

    $pasien = new Pasien();
    $pasien->noRm = $request->noRm;
    $pasien->nama = $request->nama;
    $pasien->provinsi  = $getProvinsi->name;
    $pasien->kabupaten = $getKota->name;
    $pasien->kecamatan = $getKecamatan->name;
    $pasien->kelurahan = $getKelurahan->name;
    $pasien->dukuh = $request->dukuh;
    $pasien->rt = $request->rt;
    $pasien->rw = $request->rw;
    $pasien->tglLahir = $request->tglLahir;
    $pasien->tmptLahir = $request->tmptLahir;
    $pasien->jenisKelamin = $request->jenisKelamin;
    $pasien->agama = $request->agama;
    $pasien->statusPerkawinan = $request->statusPerkawinan;
    $pasien->pendidikanPasien = $request->pendidikanPasien;
    $pasien->pekerjaanPasien = $request->pekerjaanPasien;
    $pasien->kewarganegaraan = $request->kewarganegaraan;
    $pasien->namaOrtu = $request->namaOrtu;
    $pasien->namaSuami_istri = $request->namaSuami_istri;
    $pasien->noHp = $request->noHp;
    $pasien->tglMasuk = $request->tglMasuk;
    $pasien->caraDatang = $request->caraDatang;
    $pasien->caraBayar = $request->caraBayar;
    $pasien->noPesertaJKN = $request->noPesertaJKN;
    $pasien->noAsuransiLain = $request->noAsuransiLain;
    $pasien->save();

    $config = Config::all()->first();
            $pertama = $config->no1;
            $kedua = $config->no2;
            $ketiga = $config->no3;
            
            if ($ketiga < 99) {
             $config->no3=$config->no3+1;
             $config->save();
                
            }elseif ($kedua < 99) {
             $config->no3 = 00;
             $config->no2=$config->no2+1;
             $config->save();
                
            }else{
             $config->no3 = 00;
             $config->no2 = 00;
             $config->no1=$config->no1+1;
             $config->save();

            }

     Alert::success('Berhasil', 'Data Pasien telah ditambahkan');
     return back();
  }

  public function formAjaxKota($id)
    {
        $regencies = DB::table("regencies")
                    ->where("province_id",$id)
                    ->pluck("name","id");
                  
        return json_encode($regencies);
    }

    public function formAjaxKecamatan($id)
    {
        $districts = DB::table("districts")
                    ->where("regency_id",$id)
                    ->pluck("name","id");
                  
        return json_encode($districts);
    }

     public function formAjaxKelurahan($id)
    {
        $villages = DB::table("villages")
                    ->where("district_id",$id)
                    ->pluck("name","id");
                  
        return json_encode($villages);
    }

    public function formAjaxCari($id){

        // return DB::table("pasien")->where("noRm",$id)->first();
        Log::info(Input::all());
        $pasien = Pasien::where('noRm',$id)->first();

        $biday = new DateTime($pasien->tglLahir);
        $today = new DateTime();
        $diff = $today->diff($biday);
          //bikin array baru 
        $pasien['tahun'] = $diff->y;
        $pasien['bulan'] = $diff->m;
        $pasien['hari'] = $diff->d;
        
        return $pasien;
    }

    public function saveRawatJalan(Request $request){

         $this->validate($request, [
            'noRm' => 'required',
            'nama' => 'required',
            'provinsi' => 'required',
            'kabupaten' =>'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'dukuh' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'tglLahir' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
            'hari' => 'required',
            'tglKunjungan' => 'required',
            'caraBayar' => 'required',
            'caraDatang' => 'required',
            'klinikTujuan' => 'required',
            'DokterPJ' => 'required',
            ]);
         $pasien = Pasien::where('noRm',$request->noRm)->first();
         $id = $pasien->id;
        $simpan = new Rawat_Jalan();
        $simpan->id_pasien = $id;
        $simpan->tglKunjungan = $request->tglKunjungan;
        $simpan->caraBayar = $request->caraBayar;
        $simpan->caraDatang = $request->caraDatang;
        $simpan->klinikTujuan = $request->klinikTujuan;
        $simpan->DokterPJ = $request->DokterPJ;
        $simpan->rujukan = $request->rujukan;
        $simpan->save();
     
     Alert::success('Berhasil', 'Data Pasien Rawat Jalan telah ditambahkan');
        return back();
    }

    public function formAjaxKelas($id){
         $kelas = DB::table("kelas")
                    ->where("bangsal_id",$id)
                    ->pluck("nama","id");
                  
        return json_encode($kelas);

    }
    public function formAjaxKamar($id){

         $kamar = DB::table("no_kamar")
                    ->where("id_kelas",$id)->where('status',0)
                    ->pluck("kamar_no","id");
                  
        return json_encode($kamar);
    }

}
