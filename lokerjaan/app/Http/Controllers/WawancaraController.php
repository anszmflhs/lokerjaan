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

        Wawancara::create($validatedData);

        return redirect('/wawancara')->with('success', 'New Wawancara Created!');
    }
    public function edit(Wawancara $wawancara)
    {
        return view('wawancara.edit', [
            'wawancaras' => $wawancara,
            'wawancaras' => Wawancara::all()
        ]);
    }
    public function update(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'tanggal_mulai' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Wawancara::where('id', $request->user_id)
            ->update($validatedData);

        return redirect('/wawancara')->with('success', 'Wawancara has been updated!');
    }
    public function destroy($id)
    {
        Wawancara::destroy($id);
        return redirect('/wawancara')->with('success', 'Wawancara Has Been Deleted!');
    }
}
