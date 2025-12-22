<?php

namespace App\Http\Controllers;

use App\Models\Oss_rba_nib;
use App\Models\Oss_rba_izins;
use App\Models\Oss_rba_proyeks;
use Illuminate\Http\Request;

class DashboardIzinController extends Controller
{
    public function index()
    {
        $data = Oss_rba_nib::firstWhere('nib', auth()->user()->email);
        $nib = $data->nib;
        if (request('idproyek')) {
            $proyek = Oss_rba_proyeks::firstWhere('id_proyek', request('idproyek'));
            $id_proyek =  $proyek->id_proyek;
            $nibp = $proyek->nib;
            $npwp_perusahaan = $proyek->npwp_perusahaan;
            $nama_perusahaan = $proyek->nama_perusahaan;
            $uraian_status_penanaman_modal = $proyek->uraian_status_penanaman_modal;
            $uraian_jenis_perusahaan = $proyek->uraian_jenis_perusahaan;
            $uraian_risiko_proyek = $proyek->uraian_risiko_proyek;
            $uraian_skala_usaha = $proyek->uraian_skala_usaha;
            $alamat_usaha = $proyek->alamat_usaha;
            $kecamatan_usaha = $proyek->kecamatan_usaha;
            $kelurahan_usaha = $proyek->kelurahan_usaha;
            $longitude = $proyek->longitude;
            $latitude = $proyek->latitude;
            $kbli = $proyek->kbli;
            $judul_kbli = $proyek->judul_kbli;
            $kl_sektor_pembina = $proyek->kl_sektor_pembina;
        }
        return view('dashboard.izin.index', [
            'title' => 'Proyek' . $nama_perusahaan,
            //'alls' => Oss_rba_proyeks::firstWhere('nib', request('folder'))->get(),
            'names' => Oss_rba_nib::where('nib', $nib)->limit(1)->get(),
            //'nibs' => Usernibs::where('user_id', auth()->user()->id)->latest()->paginate(5),
            //'items' => Oss_rba_nib::filter(request(['search']))->get(),
            "datas" => Oss_rba_izins::filter(request(['idproyek']))->paginate(25)->withQueryString(),
            'id_proyek' =>  $id_proyek,
            'nibp' => $nibp,
            'npwp_perusahaan' => $npwp_perusahaan,
            'nama_perusahaan' => $nama_perusahaan,
            'uraian_status_penanaman_modal' => $uraian_status_penanaman_modal,
            'uraian_jenis_perusahaan' => $uraian_jenis_perusahaan,
            'uraian_risiko_proyek' => $uraian_risiko_proyek,
            'uraian_skala_usaha' => $uraian_skala_usaha,
            'alamat_usaha' => $alamat_usaha,
            'kecamatan_usaha' => $kecamatan_usaha,
            'kelurahan_usaha' => $kelurahan_usaha,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'kbli' => $kbli,
            'judul_kbli' => $judul_kbli,
            'kl_sektor_pembina' => $kl_sektor_pembina,
        ]);
    }
}
