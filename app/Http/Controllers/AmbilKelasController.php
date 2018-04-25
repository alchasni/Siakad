<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ambilKelas;
use App\mhs;
use App\kelas;
use App\matkul;

class AmbilKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $data = DB::table('ambilkelas')->join('kelas','ambilkelas.kodekelas','=','kelas.kodekelas')->join('mhs','ambilkelas.nrp','=','mhs.nrp')->join('matkuls','matkuls.kodematkul','=','kelas.kodematkul')->get();
        return view('ambilkelas.index', compact('data'));
    }
    public function boot()
    {
        $data = DB::table('ambilkelas')->join('kelas','ambilkelas.kodekelas','=','kelas.kodekelas')->join('mhs','ambilkelas.nrp','=','mhs.nrp')->join('matkuls','matkuls.kodematkul','=','kelas.kodematkul')->get();
        $i = 1;
        return view('ambilkelas.boot', compact('data','i'));
    }
    public function del(Request $data)
    {
        ambilKelas::where('id',$data['del_id'])->delete();
        return redirect('/viewak');
    }
    public function sav(Request $data)
    {
        $edit = ambilKelas::where('id',$data['edit_id'])->first();
        $edit->uts = $data['uts'];
        $edit->uas = $data['uas'];
        $edit->save();
        return redirect('/viewak');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kls = kelas::pluck('kodekelas','kodekelas');
        $mhs = mhs::pluck('namamhs', 'nrp');
        return view('ambilkelas.create')->with(compact('kls'))->with(compact('mhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        ambilKelas::create($request->all());
        return redirect('/ambilKelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $aks = ambilKelas::findOrFail($id);
        $mhs = mhs::pluck('namamhs', 'nrp');
        $kls = kelas::pluck('kodekelas', 'kodekelas');
        
        return view('ambilKelas.edit')->with(compact('aks'))->with(compact('mhs'))->with(compact('kls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $aks = ambilKelas::findOrFail($id);
        $aks->update($request->all());
        return redirect('/ambilKelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $aks = ambilKelas::findOrFail($id);
        $aks->delete();
        return redirect('/ambilKelas');
    }
}
