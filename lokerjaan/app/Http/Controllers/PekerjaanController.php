<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function index()
    {
        return view('pekerjaan.index', [
            'pekerjaans' => Pekerjaan::all()
        ]);
    }
    public function create()
    {
        return view('pekerjaan.create', [
            'pekerjaans' => Pekerjaan::all()
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
        ]);

        Pekerjaan::create($validatedData);

        return redirect('/pekerjaan')->with('success', 'New Pekerjaan Created!');
    }
    public function edit(Pekerjaan $pekerjaan)
    {
        return view('pekerjaan.edit', [
            'pekerjaans' => $pekerjaan,
            'pekerjaans' => Pekerjaan::all()
        ]);
    }
    public function update(Request $request)
    {
        $rules = [
            'title' => 'required',
            'user_id' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Pekerjaan::where('id', $request->user_id)
            ->update($validatedData);

        return redirect('/pekerjaan')->with('success', 'Post has been updated!');
    }
    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        if (!$pekerjaan) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'data not found'
                ],
                404
            );
        }
        $pekerjaan->delete();
        return response()->json([
            'status' => true,
            'message' => 'data succcessfully deleted'
        ]);
    }
}
