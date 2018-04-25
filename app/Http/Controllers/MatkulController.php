<?php

namespace App\Http\Controllers;

use App\matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
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
        $data = matkul::all();
        return view('matkul.index', compact('data'));
    }
    public function listkelas ($id)
    {
        $data = matkul::where('kodematkul',$id)->firstOrFail();
        return view ('matkul.listkelas',compact('data'));
    }

    public function search(Request $r)
    {
        $cari = $r->get('search');
        $data = matkul::where('namamatkul', 'LIKE', '%'.$cari.'%')->paginate(100);
        return view('matkul.index', compact('data'));
    }
    public function boot()
    {
        $matkul = matkul::all();
        $i = 1;
        return view('matkul.boot', compact('matkul', 'i'));
    }    
    public function del(Request $data)
    {
        matkul::where('kodematkul',$data['del_id'])->delete();
        return redirect('/viewmatkul');
    }
    public function sav(Request $data)
    {
        $edit = matkul::where('kodematkul',$data['edit_id'])->first();
        $edit->kodematkul          = $data['kodematkul'];
        $edit->namamatkul    = $data['namamatkul'];
        $edit->save();
        return redirect('/viewmatkul');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('matkul.create');
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
        matkul::create($request->all());
        return redirect('/matkul');
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
    public function edit(matkul $matkul)
    {
        //
        $data = matkul::findOrFail($matkul);
        return view('matkul.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, matkul $matkul)
    {
        //
        $data = matkul::findOrFail($matkul);
        $data->update($request->all());
        return redirect('/matkul');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(matkul $matkul)
    {
        //
        $data = matkul::findOrFail($matkul);
        $data->delete();
        return redirect('/matkul');
    }
}
