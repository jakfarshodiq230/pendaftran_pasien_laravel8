<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\RegistrasiModel; //load model yang digunakan
use App\Models\PelayananModel; //load model yang digunakan
use App\Models\PembiyaanModel; //load model yang digunakan

use App\Models\PasienModel; //load model yang digunakan

class C_Pasien extends Controller
{
    public function index(){
        $dataRegistrasi  = DB::table('trx_regestrasi_pasien')
        ->join('master_registrasi','master_registrasi.id_registrasi','=','trx_regestrasi_pasien.id_regestrasi')
        ->join('master_pelayanan','master_pelayanan.id_pelayanan','=','trx_regestrasi_pasien.id_layanan')
        ->join('master_pembiyaan','master_pembiyaan.id_pembiyaan','=','trx_regestrasi_pasien.id_pembiayaan')
        ->select('trx_regestrasi_pasien.*', 'master_registrasi.jenis_registrasi', 'master_pelayanan.jenis_pelayanan', 'master_pembiyaan.jenis_pembiyaan')->orderBy('waktu_regestrasi', 'ASC')->get(); 
        $data=[
            'dataRegistrasiPasien' => $dataRegistrasi,
        ];
        return view('pasien/list_data_pasien',$data);
    }

    public function daftarPasien(){
        $table_no = DB::table('trx_regestrasi_pasien')->max('no_regestrasi');
        //$table_no = '0001'; // nantinya menggunakan database dan table sungguhan
        $tgl = substr(str_replace( '-', '', Carbon::now()), 0,8);
        $no= $tgl.$table_no;
        $auto=substr($no,8);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,8).str_repeat(0,(4-strlen($auto))).$auto;

        // nomor rekam
        $table_rekam = DB::table('trx_regestrasi_pasien')->max('no_regestrasi');
        $auto_rekam=intval($table_rekam)+1;
        $auto_number_rekam=str_repeat(0,(6-strlen($auto_rekam))).$auto_rekam;

        //$nomor_rekam = $array_rekam[0].$array_rekam[1].'-'.$array_rekam[2].$array_rekam[3].'-'.$array_rekam[4].$array_rekam[5];
        // dd($zeropadded_rekam);
        $dataRegistrasi  = RegistrasiModel::select("*")->orderBy('jenis_registrasi', 'ASC')->get(); 
        $dataPelayanan  = PelayananModel::select("*")->orderBy('jenis_pelayanan', 'ASC')->get();
        $dataPembiyaan  = PembiyaanModel::select("*")->orderBy('jenis_pembiyaan', 'ASC')->get();
        $data=[
            'dataRegistrasi' => $dataRegistrasi,
            'dataPelayanan' => $dataPelayanan,
            'dataPembiyaan' => $dataPembiyaan,
            'nomor_regestrasi' =>$auto_number,
            'nomor_rekam' => $auto_number_rekam,
        ];
        return view('pasien/pendaftaran',$data);
    }

    //method untuk insert data
    public function createPasien(Request $request)
    {   
        // rand string
        $randomString = Str::random(30);

        $data = PasienModel::insert([
            'no_regestrasi' => $request->no_regestrasi,
            'waktu_regestrasi' => now()->format('Y-m-d H:i:s'),
            'no_rekam_medis' => $request->no_rekam_medis,
            'nama_pasien' => $request->nama_pasien,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_regestrasi' => $request->id_regestrasi,
            'id_layanan' => $request->id_layanan,
            'id_pembiayaan' => $request->id_pembiayaan,
            'status_regestrasi' => "aktif",
            'waktu_mulai_pelayanan' => now()->format('Y-m-d H:i:s'),
            'id_petugas' => '001', //berdasarkan session login petugas
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('data-pasien/daftar');
    }

    public function editPasien($id){
        $dataRegistrasi  = RegistrasiModel::select("*")->orderBy('jenis_registrasi', 'ASC')->get(); 
        $dataPelayanan  = PelayananModel::select("*")->orderBy('jenis_pelayanan', 'ASC')->get();
        $dataPembiyaan  = PembiyaanModel::select("*")->orderBy('jenis_pembiyaan', 'ASC')->get();
        $dataPasien  = PasienModel::select("*")->where('no_regestrasi', $id)->first();
        $data=[
            'dataRegistrasi' => $dataRegistrasi,
            'dataPelayanan' => $dataPelayanan,
            'dataPembiyaan' => $dataPembiyaan,
            'dataPasien' => $dataPasien,
        ];
        return view('pasien/editpendaftaran',$data);
    }

    public function updatePasien(Request $request)
    {   
        // rand string
        $randomString = Str::random(30);

        $data = PasienModel::where('no_regestrasi',$request->no_regestrasi)->update([
            'no_rekam_medis' => $request->no_rekam_medis,
            'nama_pasien' => $request->nama_pasien,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_regestrasi' => $request->id_regestrasi,
            'id_layanan' => $request->id_layanan,
            'id_pembiayaan' => $request->id_pembiayaan,
            'status_regestrasi' => "aktif",
            'id_petugas' => '001',
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/data-pasien');
    }

    public function deletePasien($id)
    {   
        PasienModel::where('no_regestrasi', $id)->delete(); //query delete data berdasarkan id
        // alihkan halaman ke halaman pegawai
        return redirect('/data-pasien');
    }

    public function selesaiPasien($id)
    {   

        $data = PasienModel::where('no_regestrasi',$id)->update([
            'status_regestrasi' => "Tutup Kunjungan",
            'waktu_selesai_pelayanan' => now()->format('Y-m-d H:i:s'),
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/data-pasien');
    }
}
