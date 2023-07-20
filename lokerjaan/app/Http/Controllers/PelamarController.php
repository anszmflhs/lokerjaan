<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\Pelamar;
use App\Models\User;
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
        $pekerjaan = Pekerjaan::all();
        $user = User::all();
        return view('pelamar.create', compact('pekerjaan', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'alamat' => 'required',
            'ttl' => 'required',
            'pekerjaan_id' => 'required',
            'pass_foto' => 'image|file|max:1024',
            'cv' => 'image|file|max:1024',
        ]);
        if ($request->file('pass_foto')) {
            $nameFile = $request->file('pass_foto')->getClientOriginalName();
            $masukFile = $request->file('pass_foto')->storeAs('pass_foto/', $nameFile, 'public');
            if ($masukFile) {
                $validatedData['pass_foto'] = $nameFile;
            }
        }
        if ($request->file('cv')) {
            $nameFile = $request->file('cv')->getClientOriginalName();
            $masukFile = $request->file('cv')->storeAs('cv/', $nameFile, 'public');
            if ($masukFile) {
                $validatedData['cv'] = $nameFile;
            }
        }

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
        $pekerjaan = Pekerjaan::all();
        $user = User::all();
        return view('pelamar.edit', compact('pekerjaan', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelamar $pelamar)
    {
        $rules = [
            'user_id' => 'required|max:255',
            'alamat' => 'required',
            'ttl' => 'required',
            'pekerjaan_id' => 'required',
            'pass_foto' => 'image|file|max:1024',
            'cv' => 'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('pass_foto')) {
            $nameFile = $request->file('pass_foto')->getClientOriginalName();
            $masukFile = $request->file('pass_foto')->storeAs('pass_foto/', $nameFile, 'public');
            if ($masukFile) {
                $validatedData['pass_foto'] = $nameFile;
            }
        }
        if ($request->file('cv')) {
            $nameFile = $request->file('cv')->getClientOriginalName();
            $masukFile = $request->file('cv')->storeAs('cv/', $nameFile, 'public');
            if ($masukFile) {
                $validatedData['cv'] = $nameFile;
            }
        }

        $validatedData['user_id'] = auth()->user()->id;

        Pelamar::where('id', $pelamar->id)->update($validatedData);

        return redirect('/pelamar')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelamar $pelamar)
    {
        if ($pelamar->pass_foto) {
            Storage::delete($pelamar->pass_foto);
        }
        if ($pelamar->curl_version) {
            Storage::delete($pelamar->cv);
        }
        Pelamar::destroy($pelamar->id);
        return redirect('/pelamar')->with('success', 'Post Has Been Deleted!');
    }
}
