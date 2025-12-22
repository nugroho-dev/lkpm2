<?php

namespace App\Http\Controllers;

use App\Models\Oss_rba_proyek_laps;
use Illuminate\Http\Request;
use App\Models\Oss_rba_izins;
use App\Models\Oss_rba_nib;
use App\Models\Oss_rba_proyeks;
use App\Models\Usernibs;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Oss_rba_nib::firstWhere('nib', auth()->user()->email);
        $nib = $data->nib;

        $nama_perusahaan = '';
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

        $datas = Oss_rba_proyek_laps::latest()->filter(request(['idproyek']))->paginate(25)->withQueryString();
        $idProyeks = $datas->pluck('id_proyek')->unique()->toArray();
        $proyeks = Oss_rba_proyeks::on('mysql2')->whereIn('id_proyek', $idProyeks)->get()->keyBy('id_proyek');
        foreach ($datas as $lap) {
            $lap->proyek = $proyeks[$lap->id_proyek] ?? null;
        }
        return view('dashboard.laporan.index', [
            'title' => 'Proyek' . $nama_perusahaan,
            //'alls' => Oss_rba_proyeks::firstWhere('nib', request('folder'))->get(),
            'names' => Oss_rba_nib::where('nib', $nib)->limit(1)->get(),
            //'nibs' => Usernibs::where('user_id', auth()->user()->id)->latest()->paginate(5),
            //'items' => Oss_rba_nib::filter(request(['search']))->get(),
            "datas" => $datas,
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nib = '';
        $data = Oss_rba_nib::firstWhere('nib', auth()->user()->email);
        if ($data) {
            $nib = $data->nib;
        }
        $nama_perusahaan = '';
        if (request('idproyek')) {
            $proyek = Oss_rba_proyeks::firstWhere('id_proyek', request('idproyek'));
            $id_proyek =  $proyek->id_proyek;

            $nama_perusahaan = $proyek->nama_perusahaan;
        }

        return view('dashboard.laporan.create', [
            'title' => 'Proyek' . $nama_perusahaan,
            //'alls' => Oss_rba_proyeks::firstWhere('nib', request('folder'))->get(),
            'names' => Oss_rba_nib::where('nib', $nib)->limit(1)->get(),
            //'nibs' => Usernibs::where('user_id', auth()->user()->id)->latest()->paginate(5),
            //'items' => Oss_rba_nib::filter(request(['search']))->get(),
            "datas" => Oss_rba_proyek_laps::latest()->filter(request(['idproyek']))->paginate(25)->withQueryString(),
            'id_proyek' =>  $id_proyek,

            'nama_perusahaan' => $nama_perusahaan,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'id_proyek' => 'required|max:255',
            'tahun' => 'required|max:255',
            'periode' => 'required|max:255',
            'modal_tetap' => 'required|max:255',
            'modal_kerja' => 'required|max:255',
            'keterangan' => 'required|max:255',
            'produksi' => 'required|max:255',
            'ekspor' => 'required|max:255',
            'kemitraan' => 'required|max:255',
            'tki_l' => 'required|max:255',
            'tki_p' => 'required|max:255',
            'kategori_masalah' => 'required|max:255',
            'permasalahan' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'nama_pegawai' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $id_proyek = '';

        if (request('id_proyek')) {
            $proyek = Oss_rba_proyeks::firstWhere('id_proyek', request('id_proyek'));
            $id_proyek =  $proyek->id_proyek;
        }

        Oss_rba_proyek_laps::create($validatedData);
        return redirect('/proyek/laporan?idproyek=' . $id_proyek)->with('success', 'Laporan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Oss_rba_proyek_laps $laporan)
    {
        $nib = '';
        $data = Oss_rba_nib::firstWhere('nib', auth()->user()->email);
        if ($data) {
            $nib = $data->nib;
        }
        $nama_perusahaan = '';
        if (request('idproyek')) {
            $proyek = Oss_rba_proyeks::firstWhere('id_proyek', request('idproyek'));
            $id_proyek =  $proyek->id_proyek;
        }
        // Relasi manual proyek lintas database
        $laporan->proyek = Oss_rba_proyeks::on('mysql2')->where('id_proyek', $laporan->id_proyek)->first();
        return view('dashboard.laporan.show', [
            'title' => 'Dashboard',
            //'alls' => Oss_rba_proyeks::where('nib', $nib)->get(),
            'names' => Oss_rba_nib::where('nib', $nib)->limit(1)->get(),
            //'nibs' => Usernibs::where('user_id', auth()->user()->id)->latest()->paginate(5),
            //'items' => Oss_rba_nib::filter(request(['search']))->get(),
            'post' => $laporan,
            'id_proyek' =>  $id_proyek,
            'title' => 'Laporan'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Oss_rba_proyek_laps $laporan)
    {
        $nib = '';
        $data = Oss_rba_nib::firstWhere('nib', auth()->user()->email);
        if ($data) {
            $nib = $data->nib;
        }
        $nama_perusahaan = '';
        if (request('idproyek')) {
            $proyek = Oss_rba_proyeks::firstWhere('id_proyek', request('idproyek'));
            $id_proyek =  $proyek->id_proyek;
        }
        return view('dashboard.laporan.edit', [
            'title' => 'Dashboard',
            //'alls' => Oss_rba_proyeks::where('nib', $nib)->get(),
            'names' => Oss_rba_nib::where('nib', $nib)->limit(1)->get(),
            //'nibs' => Usernibs::where('user_id', auth()->user()->id)->latest()->paginate(5),
            //'items' => Oss_rba_nib::filter(request(['search']))->get(),
            'post' => $laporan,
            'id_proyek' =>  $id_proyek,
            'title' => 'Laporan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Oss_rba_proyek_laps $laporan)
    {
        $validatedData = $request->validate([
            'id_proyek' => 'required|max:255',
            'tahun' => 'required|max:255',
            'periode' => 'required|max:255',
            'modal_tetap' => 'required|max:255',
            'modal_kerja' => 'required|max:255',
            'keterangan' => 'required|max:255',
            'produksi' => 'required|max:255',
            'ekspor' => 'required|max:255',
            'kemitraan' => 'required|max:255',
            'tki_l' => 'required|max:255',
            'tki_p' => 'required|max:255',
            'kategori_masalah' => 'required|max:255',
            'permasalahan' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'nama_pegawai' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $id_proyek = '';

        if (request('id_proyek')) {
            $proyek = Oss_rba_proyeks::firstWhere('id_proyek', request('id_proyek'));
            $id_proyek =  $proyek->id_proyek;
        }

        Oss_rba_proyek_laps::where('id', $laporan->id)->update($validatedData);;
        return redirect('/proyek/laporan/' . $laporan->id . '?idproyek=' . $id_proyek)->with('success', 'Laporan Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Oss_rba_proyek_laps $laporan)
    {
        if (request('id_proyek')) {
            $proyek = Oss_rba_proyeks::firstWhere('id_proyek', request('id_proyek'));
            $id_proyek =  $proyek->id_proyek;
        }
        Oss_rba_proyek_laps::destroy($laporan->id);
        return redirect('/proyek/laporan?idproyek=' . $id_proyek)->with('success', 'Laporan Berhasil Dihapus');
    }

    public function viewpdf()
    {
        //get all users
        //$users = $this->user->get();
        // load view for pdf 
        //return view('dashboard.laporan.laporan');
        $pdf = Pdf::loadView('dashboard.laporan.laporan');
        // stream pdf on browser
        return $pdf->stream();
    }
}
