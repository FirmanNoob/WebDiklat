<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\User;
use App\Models\userPelatihan;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\returnSelf;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }



    public function pelatihanUser()
    {
        $user = auth()->user();
        $data = Pelatihan::all();
        return view('admin.pelatihanUser', compact('user', 'data'));
    }
    public function pelatihanUserDetail()
    {
        // $pelatihan = userPelatihan::all();
        // return view('admin.pelatihanDetail' . compact('pelatihan'));
        $pelatihan = userPelatihan::all();
        return view('admin.pelatihanDetail', ['pelatihan' => $pelatihan]);
    }

    public function createpelatihanUser(Request $request, $trainingId)
    {
        $user = auth()->user();

        if (!$user->trainings->contains($trainingId)) {
            $userTraining = new userPelatihan(['pelatihan_id' => $trainingId]);
            $user->trainings()->save($userTraining);
        }
        return redirect()->route('dashboard')->with('success', 'Anda berhasil mengikuti pelatihan.');


        // $request->request->add(['user_id', 'pelatihan_id' => auth()->user()->id]);
        // User::create($request->all());
        // return redirect('/dashboard');
    }

    public function pelatihan()
    {
        $data_pelatihan = Pelatihan::all();
        return view('admin.pelatihan', ['data_pelatihan' => $data_pelatihan]);
    }


    // public function tambahPelatihan($userId, $pelatihanId)
    // {
    //     // $userId = $request->input('user_id');
    //     // $trainingId = $request->input('training_id');

    //     $user = User::find($userId);
    //     $pelatihan = Pelatihan::find($pelatihanId);

    //     if (!$user || !$pelatihan) {
    //         return response()->json(['message' => 'Pengguna atau pelatihan tidak ditemukan'], 404);
    //     }

    //     // Menambahkan pelatihan untuk pengguna
    //     $user->trainings()->attach($pelatihan->id);

    //     return response()->json(['message' => 'Pelatihan berhasil ditambahkan untuk pengguna'], 200);
    // }



    public function pelatihan_tambah()
    {
        return view('admin.tambahPelatihan');
    }



    public function pelatihan_tambah_proses(Request $request)
    {
        $request->validate(
            [
                'nama_Pelatihan' => 'required',
                'lokasi'    =>  'required',
                'tanggal_awal'    =>  'required',
                'tanggal_berakhir'    =>  'required',
                'waktu_mulai'    =>  'required',
                'waktu_berakhir'    =>  'required',
                'kouta'    =>  'required',
                'gambar'    =>  'required|mimes:png,jpg,jpeg|max:2048',
                'deskripsi'    =>  'required',

            ]
        );

        $gambar     = $request->file('gambar');
        $filename   = date('Y-m-d')  . $gambar->getClientOriginalName();
        $path       = 'gambar-pelatihan/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($gambar));

        $data['nama_Pelatihan']     = $request->nama_Pelatihan;
        $data['lokasi']     = $request->lokasi;
        $data['tanggal_awal']     = $request->tanggal_awal;
        $data['tanggal_berakhir']     = $request->tanggal_berakhir;
        $data['waktu_mulai']     = $request->waktu_mulai;
        $data['waktu_berakhir']     = $request->waktu_berakhir;
        $data['kouta']     = $request->kouta;
        $data['gambar']     = $filename;
        $data['deskripsi']     = $request->deskripsi;
        // dd($data);
        Pelatihan::create($data);
        return redirect()->route('pelatihan')->with('success', 'Data Pelatihan Berhasil Ditambahkan');
    }



    public function pelatihan_update(Request $request, $id)
    {
        $data  = Pelatihan::find($id);
        return view('admin.updatePelatihan', compact('data'));
    }



    public function pelatihan_update_proses(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'nama_Pelatihan' => 'required',
        //     'lokasi'         => 'required',
        //     'deskripsi'      => 'required'
        // ]);
        // if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        $find = Pelatihan::find($id);
        $gambar =  $request->file('gambar');

        if ($gambar) {
            $filename   = date('Y-m-d')  . $gambar->getClientOriginalName();
            $path       = 'gambar-pelatihan/' . $filename;

            if ($find->gambar) {
                Storage::disk('public')->delete('gambar-pelatihan/' . $find->gambar);
            }
            Storage::disk('public')->put($path, file_get_contents($gambar));
            $data['gambar']     = $filename;
        }
        $data['nama_Pelatihan']     = $request->nama_Pelatihan;
        $data['lokasi']     = $request->lokasi;
        $data['tanggal_awal']     = $request->tanggal_awal;
        $data['tanggal_berakhir']     = $request->tanggal_berakhir;
        $data['waktu_mulai']     = $request->waktu_mulai;
        $data['waktu_berakhir']     = $request->waktu_berakhir;
        $data['kouta']     = $request->kouta;
        $data['deskripsi']     = $request->deskripsi;

        $find->update($data);
        return redirect()->route('pelatihan')->with('success', 'Data Pelatihan Berhasil Ditambahkan');

        // return view('admin.updatePelatihan');
    }


    // public function pelatihanUser(Request $request)
    // {
    //     $request->request->add('');
    // }

}
