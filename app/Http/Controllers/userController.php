<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role', 'staff')->get();
        return view('admin.staff.index', compact('user'));
    }

    public function loginAuth(request $request)
    {
        $request->validate([
            'email'=> 'required',
            'password'=> 'required',
        ]);

        $user = $request->only(['email', 'password']);
        if (Auth::attempt($user)) {
            return redirect()->route('home.page');
        }else{
            return redirect()->back()->with('failed', 'Proses login gagal, silahkan coba kembali dengan data benar!');
        }
    }

    public function indexGuru()
    {
        $user = User::where('role', 'guru')->get();
        return view('admin.guru.index', compact('user'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name'=> 'required',
            'email' => 'required',
        ]);

        $password = substr($request->name, 3,0) . substr($request->email, 3, 0);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => 'staff'
        ]);

        return redirect()->back()->with('success', 'Anda berhasil menambahkan!');
    }
    public function createGuru()
    {
        return view('admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeGuru(Request $request)
    {
        $request -> validate([
            'name'=> 'required',
            'email' => 'required',
        ]);
        $password = substr($request->name, 3,0) . substr($request->email, 3, 0);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => 'guru'
        ]);

        return redirect()->back()->with('success', 'Anda berhasil menambahkan!');
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
    public function edit( $id)
    {
        $user = User::find($id);
        return view('admin.staff.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',

        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        
        ]);

        return redirect()->route('staff.index')->with('success', 'Anda berhasil mengubah data!');
    }
    public function editGuru($id)
    {
        $user = User::find($id);
        return view('admin.guru.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateGuru(Request $request, $id)
    {
        $request -> validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',

        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password) ,
        
        ]);

        return redirect()->route('guru.index')->with('success', 'Anda berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('delete', 'Berhasil menghapus data');
    }
    public function destroyGuru($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('delete', 'Berhasil menghapus data');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Anda Berhasil Logout');
    }
}
