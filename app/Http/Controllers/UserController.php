<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $data = User::get();
        return view('user.index', compact('data'));
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $request->validate(User::$rules);
        $requests = $request->all();
        $requests['password'] = Hash::make($request->password);
        
        $user = User::create($requests);
        if($user){
            return redirect('user')->with('status', 'Berhasil buat akun !');
        }

        return redirect('user')->with('status', 'Gagal buat akun !');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('user.edit', compact('data'));
    }

    public function edit_pass($id)
    {
        $data = User::find($id);
        return view('user.edit_pass', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $d = User::find($id);
        if ($d == null){
            return redirect('user/')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        $data = User::find($id)->update($req);
        if($data){
            return redirect('user/')->with('status', 'Data pengguna Berhasil diedit !');
        }

        return redirect('user/')->with('status', 'Gagal edit data pengguna!');
    }

    public function update_pass(Request $request, $id)
    {
        $d = User::find($id);
        if ($d == null){
            return redirect('user/')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();
        $req['password'] = Hash::make($request->password);
        

        $data = User::find($id)->update($req);
        if($data){
            return redirect('user/')->with('status', 'Data pengguna Berhasil diedit !');
        }

        return redirect('user/')->with('status', 'Gagal edit data pengguna!');
    }

    public function delete($id)
    {
        $data = User::find($id);
        if ($data == null) {
            return redirect('user')->with('status', 'Data tidak ditemukan !');
        }
        
        $delete = $data->delete();
        if ($delete) {
            return redirect('user')->with('status', 'Berhasil hapus Data Pengguna !');
        }
        return redirect('user')->with('status', 'Gagal hapus Data Pengguna !');
    }
}
