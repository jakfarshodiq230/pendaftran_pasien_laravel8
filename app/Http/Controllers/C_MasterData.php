<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\RegistrasiModel; //load model yang digunakan
use App\Models\PelayananModel; //load model yang digunakan
use App\Models\PembiyaanModel; //load model yang digunakan

class C_MasterData extends Controller
{
    public function index(){
        return view('data_master/v_data_master');
    }

    public function dataRegistrasi(){
        $dataRegistrasi  = RegistrasiModel::select("*")->orderBy('jenis_registrasi', 'ASC')->get(); //query get semua data ke model
        $form = view("data_master/data_tabel/data_registrasi", ['data' => $dataRegistrasi]); //passing data ke view
        $darr=array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($darr); //convert ke respone json
    }

    //method untuk insert data
    public function createRegistrasi(Request $request)
    {   
        // rand string
        $randomString = Str::random(30);
        //dd($request->jenis_registrasi);
        //insert data ke table pegawai
        $data = RegistrasiModel::insert([
            'id_registrasi' => $randomString,
            'jenis_registrasi' => $request->jenis_registrasi,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/data-master');
    }

    public function editRegistrasi($id)
    {
    	$RegistrasiModel = RegistrasiModel::select("*")->where('id_registrasi', $id)->first();

	    return response()->json([
	      'data' => $RegistrasiModel
	    ]);
    }

    public function updateRegistrasi(Request $request)
    {
    	$data = RegistrasiModel::where('id_registrasi',$request->id_registrasi2)->update([
            'jenis_registrasi' => $request->jenis_registrasi2,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/data-master');
    }

    //method untuk insert data
    public function deleteRegistrasi($id)
    {   
        RegistrasiModel::where('id_registrasi', $id)->delete(); //query delete data berdasarkan id
        // alihkan halaman ke halaman pegawai
        return redirect('/data-master');
    }

    // pelayanan
    public function dataPelayanan(){
        $data  = PelayananModel::select("*")->orderBy('jenis_pelayanan', 'ASC')->get(); //query get semua data ke model
        $form = view("data_master/data_tabel/data_pelayanan", ['data' => $data]); //passing data ke view
        $darr=array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($darr); //convert ke respone json
    }

    //method untuk insert data
    public function createPelayanan(Request $request)
    {   
        // rand string
        $randomString = Str::random(30);
        $data = PelayananModel::insert([
            'id_pelayanan' => $randomString,
            'jenis_pelayanan' => $request->jenis_pelayanan,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/data-master');
    }

    public function editPelayanan($id)
    {
        $PelayananModel = PelayananModel::select("*")->where('id_pelayanan', $id)->first();;

        return response()->json([
            'data' => $PelayananModel
        ]);
    }

    public function updatePelayanan(Request $request)
    {
        $data = PelayananModel::where('id_pelayanan',$request->id_pelayanan2)->update([
            'jenis_pelayanan' => $request->jenis_pelayanan2,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/data-master');
    }

    //method untuk insert data
    public function deletePelayanan($id)
    {   
        PelayananModel::where('id_pelayanan', $id)->delete(); //query delete data berdasarkan id
        // alihkan halaman ke halaman pegawai
        return redirect('/data-master');
    }

    // Pembiyaan
    public function dataPembiyaan(){
        $data  = PembiyaanModel::select("*")->orderBy('jenis_pembiyaan', 'ASC')->get(); //query get semua data ke model
        $form = view("data_master/data_tabel/data_pembiyaan", ['data' => $data]); //passing data ke view
        $darr=array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($darr); //convert ke respone json
    }

    //method untuk insert data
    public function createPembiyaan(Request $request)
    {   
        // rand string
        $randomString = Str::random(30);
        $data = PembiyaanModel::insert([
            'id_pembiyaan' => $randomString,
            'jenis_pembiyaan' => $request->jenis_pembiyaan,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/data-master');
    }

    public function editPembiyaan($id)
    {
        $PelayananModel = PembiyaanModel::select("*")->where('id_pembiyaan', $id)->first();;

        return response()->json([
            'data' => $PelayananModel
        ]);
    }

    public function updatePembiyaan(Request $request)
    {
        $data = PembiyaanModel::where('id_pembiyaan',$request->id_pembiyaan2)->update([
            'jenis_pembiyaan' => $request->jenis_pembiyaan2,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/data-master');
    }

    //method untuk insert data
    public function deletePembiyaan($id)
    {   
        PembiyaanModel::where('id_pembiyaan', $id)->delete(); //query delete data berdasarkan id
        // alihkan halaman ke halaman pegawai
        return redirect('/data-master');
    }
}
