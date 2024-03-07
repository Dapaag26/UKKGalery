<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRole = Role::where('id_user', auth()->id())->first();

        if ($userRole && $userRole->id_akses == 9) {
            // Jika peran '9', tampilkan hanya data foto dengan id_user yang sesuai
            $data = Photo::where('id_user', auth()->id())->get();
        } else {
            // Jika peran bukan '9', tampilkan semua data foto
            $data = Photo::all();
        }

        return view('dashboard.data_photo', ['data' => $data]);
    }

    public function create()
    {
        $users = User::all();
        $data2 = User::findOrFail(Auth::user()->id);
        $role = $data2->role_menu;

        return view('dashboard.data_photo.create', compact('users'),['data2' => $data2, 'role_menu' => $role]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'required|string',
        ]);

        // Mendapatkan ID pengguna yang saat ini login
        $id_user = Auth::id();

        // Mendapatkan nama pengguna yang saat ini login
        $name = Auth::user()->name;

        // Menyimpan gambar ke direktori storage
        $path = $request->file('photo')->store('public/images');
        $photoFileName = pathinfo($path, PATHINFO_BASENAME);
        // Menyimpan data foto ke database
        Photo::create([
            'id_user' => $id_user,
            'nama' => $name,
            'photo' => $photoFileName,
            'keterangan' => $request->input('keterangan'),
        ]);

        return redirect()->route('photo.index')->with('success', 'Foto berhasil disimpan.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Photo::findOrFail($id);
        $data->delete();
        return redirect('/photo')
        ->with('success', 'Foto berhasil dihapus');
    }

    public function laporan_photo()
    {
        $data = Photo::all();

        return view('dashboard.data_photo.laporan',['data' => $data]);
    }
    public function cetak_photo(Request $request)
    {
        $bulan_tahun = $request->input('bulan_tahun');

        list($bulan, $tahun) = explode('-', $bulan_tahun);

        $results = Photo::whereYear('created_at', $tahun)
                            ->whereMonth('created_at', $bulan)
                            ->get();
        return view('dashboard.pdf.laporan',['data' => $results,'bulan_tahun' => $bulan_tahun]);
    }
}
