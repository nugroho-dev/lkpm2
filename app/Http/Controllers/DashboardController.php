<?php

namespace App\Http\Controllers;

use App\Models\Oss_rba_izins;
use Illuminate\Http\Request;
use App\Models\Oss_rba_nib;
use App\Models\Oss_rba_proyeks;
use App\Models\Usernibs;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        
        $data= Oss_rba_nib::firstWhere('nib', auth()->user()->email);
        //if ($data->count() == 0){
           // $nib='';
            //return view(
                //'dashboard.indexa',
                //[
                    //'title' => 'Dashboard',
                    //'alls' => Oss_rba_proyeks::where('nib', $nib)->get(),
                    //'names' => Oss_rba_nib::where('nib', $nib)->limit(1)->get(),
                    //'nibs' => Usernibs::where('user_id', auth()->user()->id)->latest()->paginate(5),
                    //'items' => Oss_rba_nib::filter(request(['search']))->get(),
                //]
           // );
        //} else{
           
            $nib = $data->nib;
            $tanggal_terbit = $data->day_of_tanggal_terbit_oss;
            $nama_perusahaan = $data->nama_perusahaan;
            $status_penanaman_modal = $data->status_penanaman_modal;
            $uraian_jenis_perusahaan = $data->uraian_jenis_perusahaan;
            $alamat_perusahaan = $data->alamat_perusahaan;
            $kab_kota = $data->kab_kota;
            $email = $data->email;
            $nomor_telp = $data->nomor_telp;
           
            return view(
                'dashboard.indexb',
                [
                    'title' => 'Dashboard',
                    'alls' => Oss_rba_proyeks::where('nib', $nib)->paginate(10),
                    'names' => Oss_rba_nib::where('nib', $nib)->limit(1)->get(),
                    'nibs' => Usernibs::where('user_id', auth()->user()->id)->latest()->paginate(5),
                    'items' => Oss_rba_nib::filter(request(['search']))->get(),
                    'izins' => Oss_rba_izins::where('nib', $nib)->paginate(10)->withQueryString(),
                    'nib' => $nib,
                    'tanggal_terbit' => $tanggal_terbit,
                    'nama_perusahaan' => $nama_perusahaan,
                    'status_penanaman_modal' => $status_penanaman_modal,
                    'uraian_jenis_perusahaan' => $uraian_jenis_perusahaan,
                    'alamat_perusahaan' => $alamat_perusahaan,
                    'kab_kota' => $kab_kota,
                    'email' => $email,
                    'nomor_telp' => $nomor_telp,
                ]
            );  
        //}
    }
    public function proyek()
    {
        $data = Oss_rba_nib::firstWhere('nib', auth()->user()->email);
        $nib = $data->nib;
            
            return view(
            'dashboard.proyek.index',
                [
                    'title' => 'Dashboard',
                    'alls' => Oss_rba_proyeks::where('nib', $nib)->get(),
                    'names' => Oss_rba_nib::where('nib', $nib)->limit(1)->get(),
                    'nibs' => Usernibs::where('user_id', auth()->user()->id)->latest()->paginate(5),
                    'items' => Oss_rba_nib::filter(request(['search']))->get(),
               
                ]
            );
    }
}
