<?php

namespace App\Http\Controllers;

use App\Models\alumni;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($credentials) == true) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function dashboard()
    {
        return view('admin.index');
    }

    public function viewAlumni($jurusan)
    {

        $alumni['alumni'] = alumni::where('jurusan', $jurusan)->get();
        return view('admin.alumni.index', $alumni, ['titleJudul' => $jurusan]);
    }

    public function viewJurusan()
    {
        $jurusan['jurusan'] = Jurusan::all();
        return view('admin.jurusan.index', $jurusan);
    }

    public function addJurusan()
    {
        return view('admin.jurusan.tambah');
    }

    public function ProcessAddJurusan(Request $request)
    {
        $request->validate([
            'kode' => 'required|max:5',
            'jurusan' => 'required'
        ]);

        $data = new jurusan();
        $data->kode_jurusan = $request->kode;
        $data->nama_jurusan =  $request->jurusan;
        $data->save();

        return redirect()->route('view-jurusan');
    }

    public function ubahJurusan($id)
    {
        $jurusan['jurusan'] = jurusan::find($id);
        return view('admin.jurusan.ubah', $jurusan);
    }

    public function updtJurusan(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|max:5',
            'jurusan' => 'required'
        ]);

        $data = jurusan::find($id);
        $data->kode_jurusan = $request->kode;
        $data->nama_jurusan =  $request->jurusan;
        $data->save();

        return redirect()->route('view-jurusan');
    }
}
