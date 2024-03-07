<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        $data2 = User::findOrFail(Auth::user()->id);
        $role = $data2->role_menu;


        return view('dashboard.data_user', ['data' => $data, 'data2' => $data2, 'role_menu'=> $role]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.data_user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        //fungsi untuk enkripsi
        $validatedData['password'] = Hash::make($validatedData['password']);
        //fungsi untuk validasi detailuser
        $validasiDetailUser = $request->validate([
            'nama_lengkap' => 'required',
            'tanggal_lahir' => 'required'
        ]);
        //create a new record using the validate data
        $data = User::create($validatedData);
        //memanggil id dari user simpan di detailuser
        $dataid_user = $data->id;
        $detailUser = new DetailUser($validasiDetailUser);
        $detailUser->id_user = $dataid_user;
        $detailUser->save();

        return redirect('/user')->with('success', 'Reocord created succesfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = User::findOrFail($id);
        $photo = Photo::where('id_user','=',$id)->get();
        $tgl_lahir = Carbon::parse($data->detailUser->tgl_lahir);
        $umur = $tgl_lahir->age;
        return view('dashboard.profile', ['data' => $data,'umur'=>$umur,'photo'=>$photo]);
    }

    public function update_profile(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            // Add more validation rules for other columns
        ]);
        // berfungsi untuk memvalidasi data detail user
        $validasiDetailUser = $request->validate([
            'nama_lengkap' => 'required',
            'tgl_lahir' => 'required',
            'nik' => '',
            'alamat' => '',
            'no_tlfn' => '',
        ]);
        // Mencari record yang dritubah
        $data = User::findOrFail($id);
        // proses ubah data table user
        $data->update($validatedData);
        // mencari record yang dirubah di table detail user
        $detailUser = DetailUser::where('id_user', $id)->first();
        // Update data detail user
        $detailUser->update($validasiDetailUser);


        // Flash a success message to the session
        return redirect()->route('data.petugas.show', ['id' => $id])->with('success', 'Record updated successfully!');
    }

    public function photo(Request $request,  string $id)
    {
        $user = User::findOrFail($id);

        $data =  $request->validate([
            'profile_foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Memastikan tipe file adalah gambar (jpeg, png, jpg, gif) dan ukurannya tidak lebih dari 2MB
        ]);

        // Memeriksa apakah gambar sudah ada sebelumnya
        if ($user->profile_foto != null) {
                // Hapus gambar yang sudah ada sebelumnya
                Storage::delete('public/photo/'.$user->profile_foto);
        }

        // Mengambil file gambar dari request
        $image = $request->file('profile_foto');

        // Menyimpan gambar ke dalam direktori 'public/posts' dengan nama file yang dihasilkan menggunakan hash dari konten gambar
        $path = $image->storeAs('public/photo', $image->hashName());

        $user->update(['profile_foto'=> $image->hashName()]);
        //Flash a success message to the session
        return redirect()->route('user.show', ['id' => $id])->with('success', 'Foto profil telah diubah');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findOrFail($id);
        return view('dashboard.data_user.edit', ['data'=> $data]);
    }

    public function custom(string $id)
    {
        $data = User::findOrFail($id);
        return view('dashboard.profile', ['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        //fungsi untuk enkripsi

        //fungsi untuk validasi detailuser
        $validasiDetailUser = $request->validate([
            'nama_lengkap' => 'required',
            'tgl_lahir' => 'required',
            'nik' => '',
            'alamat' => '',
            'no_tlfn' => '',
        ]);
        //create a new record using the validate data
        $data = User::findOrFail($id);

        $data->update($validatedData);
        //memanggil id dari user simpan di detailuser
        $detailUser = DetailUser::where('id_user', $id)->first();

        $detailUser->update($validasiDetailUser);

        return redirect('/user')->with('success', 'Record updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataDetail = DetailUser::where('id_user', $id);
        $dataDetail->delete();
        $dataRole = Role::where('id_user', $id);
        $dataRole->delete();
        $data = User::findOrFail($id);
        $data->delete();

        return redirect('/user')->with('success', 'User berhasil dihapus');
    }
}
