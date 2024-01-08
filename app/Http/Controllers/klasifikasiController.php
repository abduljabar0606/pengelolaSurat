<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\letter_type;
use Excel;
use App\Exports\letterTypeExport;

class klasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = letter_type::all();
        return view('admin.klasifikasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.klasifikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'letter_code'=> 'required',
            'name_type' => 'required',
        ]);

        $letterTypePles = letter_type::count();

        $letterType = $request->letter_code . '-' . ($letterTypePles  + 1 );

        letter_type::create([
            'letter_code' => $letterType,
            'name_type' => $request->name_type,
        ]);
        return redirect()->back()->with('Successs', 'Berhasil menambah data!');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = letter_type::find($id);
        return view('admin.klasifikasi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'letter_code'=> 'required',
            'name_type'=> 'required',
        ]);

        $letterTypePles =  substr($request->letter_code, -2);
        $letterCode =  substr($request->letter_code, 0, -3);

        $letterType = $letterCode . $letterTypePles ;


        letter_type::where('id', $id)->update([
            'letter_code' => $letterType,
            'name_type' => $request->name_type,
        ]);
        return redirect()->route('data.index')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        letter_type::find($id)->delete();
        return redirect()->back()->with('Success', 'Berhasil menghapus Data!');
    }

    public function exportExcel(){
        return Excel::download(new letterTypeExport, "klafikasi.xlsx");
    }

    public function detail($id) 
    {
        $detail = letter_type::find($id);
        return view('admin.klasifikasi.detail', compact('detail'));
    }
    
}
