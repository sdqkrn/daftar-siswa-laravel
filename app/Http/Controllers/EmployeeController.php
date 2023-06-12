<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Employee::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Employee::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }

       
       
        return view('datasiswa',compact('data'));
    }

    public function tambahsiswa(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){

    $this->validate($request,[
        'nama' => 'required|min:4|max:100',
        'notelepon' => 'required|min:10|max:100',
    ]);
 

     Employee::create($request->all());
        

        // $data = Employee::create($request->all());
        // if($request->hasFile('foto')){
        //     $request->file('foto')->move('fotosiswa/', $request->file('foto')->getClientOriginalName());
        //     $data->foto = $request->file('foto')->getClientOriginalName();
        //     $data->save();
        // }
        return redirect()->route('siswa')->with('success','Data Berhasil Di Tambahkan');
    }

    public function tampilkandata($id){
        $data = Employee::find($id);
        // dd($data);
        return view('tampildata',compact('data'));
        $this->validate($request,[
            'nama' => 'required|min:4|max:100',
            'notelepon' => 'required|min:10|max:100',
        ]);
    }

    public function updatedata(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        if (session('halaman_url')) {
            return Redirect(session('halaman_url'))->with('success','Data Berhasil Di Update');
        }

        return redirect()->route('siswa')->with('success','Data Berhasil Di Update');
    }

    public function delete(Request $request, $id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('siswa')->with('success','Data Berhasil Di Hapus');
    }
}

