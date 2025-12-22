<?php

namespace App\Http\Controllers;

use App\Models\Usernibs;
use Illuminate\Http\Request;

class DashboardUserNibController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate(['user_id' => 'required' , 'nib' => 'unique:usernibs']);

        Usernibs::create($validatedData);
        return redirect('/dashboard')->with('success', 'Data Baru Berhasil di Tambahkan !');
    }
}
