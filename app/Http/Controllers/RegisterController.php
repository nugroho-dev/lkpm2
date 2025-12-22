<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Oss_rba_nib;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', ['title' => 'Register']);
    }
    public function store(Request $request)
    {
        
        
        $data = Oss_rba_nib::firstWhere('nib', request(['email']));
        if (empty($data->nib)) {
            return redirect('/register')->with('loginError', 'NIB Tidak Ditemukan/Tidak Terdaftar');
        }
        else{
        $validatedData = $request->validate(['email' => 'required|unique:users']);
        $validatedData['password'] = Hash::make($data->nib);
        User::create($validatedData);
        //$request->session()->flash('success', 'Registasi Berhasil');
        return redirect('/')->with('success', 'Registrasi Berhasil, silakan masuk');
        }
    }
}
