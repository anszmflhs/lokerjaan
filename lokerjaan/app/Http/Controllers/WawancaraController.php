<?php

namespace App\Http\Controllers;

use App\Models\Wawancara;
use Illuminate\Http\Request;

class WawancaraController extends Controller
{
    public function index()
    {
        return view('wawancara.index', [
            'wawancaras' => Wawancara::all()
        ]);
    }
    public function create()
    {
        return view('wawancara.create', [
            'wawancaras' => Wawancara::all()
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'tanggal_mulai' => 'required',
        ]);

        $wawancara = new Wawancara();
        $wawancara->user_id = $validatedData['user_id'];
        $wawancara->tanggal_mulai = $validatedData['tanggal_mulai'];
        $wawancara->save();

        return redirect()->route('wawancara.index')->with('success', 'Data berhasil ditambahkan');
    }
}
