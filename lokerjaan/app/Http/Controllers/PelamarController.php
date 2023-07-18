<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Pelamar::all();
        return view('pelamar.index', [
            'pelamars' => Pelamar::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelamar.create', [
            'pelamars' => Pelamar::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'ttl' => 'required',
            'pekerjaan_id' => 'required',
            'user_id' => 'required',
            'pass_foto' => 'required',
            'cv' => 'required',
        ]);

        Pelamar::create($validatedData);

        return redirect('/pelamar')->with('success', 'New Pelamar Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelamar $pelamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelamar $pelamar)
    {
        return view('pelamar.edit', [
            'pelamars' => $pelamar,
            'pelamars' => Pelamar::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelamar $pelamar)
    {
        $rules = [
            'name' => 'required',
            'alamat' => 'required',
            'ttl' => 'required',
            'pekerjaan_id' => 'required',
            // 'user_id' => 'required',
            'pass_foto' => 'image|file|max:1024',
            'cv' => 'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('pass_foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['pass_foto'] = $request->file('pass_foto')->store('pass_foto');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Pelamar::where('id', $pelamar->id)
            ->update($validatedData);

        return redirect('/pelamar')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelamar $pelamar)
    {
        //
    }
}
