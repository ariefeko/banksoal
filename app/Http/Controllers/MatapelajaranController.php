<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Matapelajaran;
use Input;
use Response;

class MatapelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['matapelajaran'] = Matapelajaran::all();
        return view('matpel.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matpel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Matapelajaran::create($data);
        return redirect('admin/matpel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matapelajaran = \DB::table('matapelajaran')->where('matapelajaran.id','=',$id)->get();
        $data['matapelajaran'] = Matapelajaran::find($id);
        return view('matpel.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['matapelajaran'] = Matapelajaran::find($id);
        return view('matpel.edit',$data);
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
        $matapelajaran = Matapelajaran::find($id)->update(Input::all());
        return redirect('admin/matpel/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matapelajaran = Matapelajaran::find($id);
        $matapelajaran->delete();
        return redirect('admin/matpel');
    }


    /**
    * Create get API Mata Pelajaran
    */
    public function getAll()
    {
        $data = Matapelajaran::all();
        return Response::json($data,200);
    }

    public function getId($id)
    {
        $data = Matapelajaran::find($id);
        if(is_null($data))
        {
             return Response::json("not found",404);
        }
       return Response::json($data,200);
    }

    public function getJenjang($jenjang)
    {
        $data = Matapelajaran::where('jenjang','=',$jenjang)->get();
        if(is_null($data))
        {
             return Response::json("not found",404);
        }
        return Response::json($data,200);
    }

    public function getPelajaran($pelajaran)
    {
        $data = Matapelajaran::where('pelajaran','=',$pelajaran)->get();
        if(is_null($data))
        {
             return Response::json("not found",404);
        }
        return Response::json($data,200);
    }

    public function getTahunAjaran($thnajaran)
    {
        $data = Matapelajaran::where('tahun_ajaran','=',$thnajaran)->get();
        if(is_null($data))
        {
             return Response::json("not found",404);
        }
        return Response::json($data,200);
    }


    /**
    * Create CRUD API mata pelajaran
    */
    public function tambah(Request $request)
    {
        $data = $request->all();
        $success = Matapelajaran::create($data);

        if(!$success)
        {
            return Response::json("error saving",500);
        }
            return Response::json("success",201);
    }

    public function baca($id)
    {
        $data = Matapelajaran::find($id);
        if(is_null($data))
        {
             return Response::json("not found",404);
        }

        return Response::json($data,200);
    }

    public function ubah($id)
    {
        $success = Matapelajaran::find($id)->update(Input::all());
        if(!$success)
        {
            return Response::json("error updating",500);
        }
        return Response::json("success",201);
    }

    public function hapus($id)
    {
        $matapelajaran = Matapelajaran::find($id);
        $success = $matapelajaran->delete();
        if(!$success)
        {
            return Response::json("error deleting",500);
        }
        return Response::json("success",200);
    }
}
