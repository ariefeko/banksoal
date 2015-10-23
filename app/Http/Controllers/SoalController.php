<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Soal;
use Input;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['soal'] = Soal::all();
        return view('soal.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = Input::file('gambar')->getClientOriginalName();
        Input::file('gambar')->move(public_path().'/gambar/',$filename);
        Soal::create(Input::all());
        return redirect('admin/soal/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $soal = \DB::table('soal')->where('soal.id','=',$id)->get();

        $data['soal'] = $soal;
        $data['soal'] = Soal::find($id);
        return view('soal.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['soal'] = Soal::find($id);
        return view('soal.edit',$data);
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
        $soal = Soal::find($id);

        if($soal->gambar){
            $file = $soal->gambar;
            \File::delete(public_path('gambar/' . $file));
        }

        $filename = Input::file('gambar')->getClientOriginalName();
        $path = public_path('gambar/' . $filename);
        Input::file('gambar')->move(public_path().'/gambar/', $filename);
        $soal->gambar = $filename;
        $soal->save();
        $soal = Soal::find($id)->update(Input::except('gambar'));
        return redirect('admin/soal/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soal = Soal::find($id);
        $soal->delete();
        return redirect('admin/soal');
    }
}
