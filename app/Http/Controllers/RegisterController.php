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
        
        
        $data = Oss_rba_nib::firstWhere('nib', request('email'));
        if (empty($data) || empty($data->nib)) {
            return redirect('/register')->with('loginError', 'NIB Tidak Ditemukan/Tidak Terdaftar');
        } else {
            $validatedData = $request->validate([
                'email' => 'required|unique:users',
            ]);
            $validatedData['nib'] = $data->nib;
            $validatedData['password'] = Hash::make($data->nib);
            User::create($validatedData);
            return redirect('/')->with('success', 'Registrasi Berhasil, silakan masuk');
        }
    }
}
