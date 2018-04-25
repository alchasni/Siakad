<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\kelas;
use App\dosen;
use App\matkul;

class KelasController extends Controller
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
        $data = DB::table('kelas')->join('dosens','kelas.nip','=','dosens.nip')->join('matkuls','kelas.kodematkul','=','matkuls.kodematkul')->get();
        return view('kelas.index', compact('data'));
    }
    public function search(Request $r)
    {
        $cari = $r->get('search');
        $data = DB::table('kelas')->join('dosens','kelas.nip','=','dosens.nip')->join('matkuls','kelas.kodematkul','=','matkuls.kodematkul')->where('kodekelas', 'LIKE', '%'.$cari.'%')->paginate(100);
        return view('kelas.index', compact('data'));
    }
    public function boot()
    {
        $data = DB::table('kelas')->join('dosens','kelas.nip','=','dosens.nip')->join('matkuls','kelas.kodematkul','=','matkuls.kodematkul')->get();
        $i = 1;
        return view('kelas.boot', compact('data','i'));
    }
    public function del(Request $data)
    {
        kelas::where('kodekelas',$data['del_id'])->delete();
        return redirect('/viewkelas');
    }
    public function sav(Request $data)
    {
        $edit = kelas::where('kodekelas',$data['edit_id'])->first();
        $edit->kodekelas          = $data['kodekelas'];
        $edit->save();
        return redirect('/viewkelas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mks = matkul::pluck('namamatkul', 'kodematkul');
        $dsn = dosen::pluck('namadosen', 'nip');
        return view('kelas.create')->with(compact('dsn'))->with(compact('mks'));
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
        kelas::create($request->all());
        return redirect('/kelas');
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
        $kls = kelas::findOrFail($id);
        $mksnya = matkul::pluck('namamatkul', 'kodematkul');
        $dsnnya = dosen::pluck('namadosen', 'nip');
        return view('kelas.edit')
        ->with(compact('kls'))->with(compact('mksnya'))->with(compact('dsnnya'));
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
        $kls = kelas::findOrFail($id);
        $kls->update($request->all());
        return redirect('/kelas');
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
        $kls = kelas::findOrFail($id);
        $kls->delete();
        return redirect('/kelas');
    }
}
