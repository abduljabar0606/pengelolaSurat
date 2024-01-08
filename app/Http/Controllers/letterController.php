<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\letter;
use App\Models\letter_type;
use App\Models\User;
use PDF;

class letterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letter = letter::all();
        return view('data.index', compact('letter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('role','guru')->get();
        $klasifikasi = letter_type::all();
        return view('data.create', compact('user','klasifikasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {


        $request->validate([
            'letter_type_id' => 'required',
            'letter_perihal' => 'required',
            'recipients' => 'required',
            'content' => 'required',
            'attachment',
            'notulis' => 'required',


        ]);

        $arrayDistinct = array_count_values($request->recipients);
        $arrayAssoc = [];
    
        foreach ($arrayDistinct as $id => $count) {
            $user = User::find($id);
    
            // Periksa apakah pengguna ditemukan sebelum mengakses properti 'name'
            if ($user) {
                $arrayItem = [
                    "id" => $id,
                    "name" => $user->name,
                ];
    
                array_push($arrayAssoc, $arrayItem);
            }
        }
    
        $request['recipients'] = $arrayAssoc;
    
        // dd($request->all(), $arrayAssoc);
    
       $proses = Letter::create($request->all());

        return redirect()->route('surat.index', $proses->id)->with('success', 'Berhasil menambahkan data klasifikasi surat');
    }
    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $surat = letters::find($id);
        $users = User::all();
    
        return view('surat.print', compact('surat', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $item = letter::find($id);
        return view('data.create', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        $request->validate([
            'letter_type_id' => 'required',
            'letter_perihal' => 'required',
            'recipients' => 'required',
            'content' => 'required',
            'attachment',
            'notulis' => 'required',
        ]);
        
        $arrayDistinct = array_count_values($request->recipients);
        $arrayAssoc = [];
    
        foreach ($arrayDistinct as $id => $count) {
            $user = User::find($id);
    
            // Periksa apakah pengguna ditemukan sebelum mengakses properti 'name'
            if ($user) {
                $arrayItem = [
                    "id" => $id,
                    "name" => $user->name,
                ];
    
                array_push($arrayAssoc, $arrayItem);
            }
        }
    
        $request['recipients'] = $arrayAssoc;
    
        // dd($request->all(), $arrayAssoc);
    
       $proses = Letter::create($request->all());

        return redirect()->route('surat.index', $proses->id)->with('success', 'Berhasil mengubah data surat');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        letter::find($id)->delete();
        return redirect()->back()->with('delete', 'Berhasil Menghapus Data');
    }

    public function downloadPDF($id) 
    { 
        // Ambil objek model Letters berdasarkan ID
        $surat = letter::find($id); 

        // Periksa apakah surat ditemukan
        if (!$surat) {
            // Lakukan penanganan jika surat tidak ditemukan
            // Misalnya, redirect ke halaman tertentu atau tampilkan pesan kesalahan
            // Di sini, saya mengembalikan response dengan pesan kesalahan
            return response()->json(['error' => 'Surat tidak ditemukan'], 404);
        }

        // Kirim objek model surat ke view
        view()->share('surat', $surat); 

        // Panggil view blade yang akan dicetak PDF serta data yang akan digunakan
        $pdf = PDF::loadView('surat.download', compact('surat')); 

        // Download PDF file dengan nama tertentu
        return $pdf->download('receipt.pdf'); 
    }
}
