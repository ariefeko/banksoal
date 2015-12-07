<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Soal;
use App\Matapelajaran;
use Input;
use DB;
use Response;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['soal'] = Soal::paginate(10);
        return view('soal.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['listmatpel'] = Matapelajaran::select(DB::raw("id, CONCAT(pelajaran,' - ', jenjang) AS text"))->lists('text', 'id');
        return view('soal.create',$data);
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
        $data = $request->all();
        $data = array(
            'mata_pelajaran_id' => Input::get('mata_pelajaran_id'),
            'pertanyaan' => Input::get('pertanyaan'),
            'pilihan_a' => Input::get('pilihan_a'),
            'pilihan_b' => Input::get('pilihan_b'),
            'pilihan_c' => Input::get('pilihan_c'),
            'pilihan_d' => Input::get('pilihan_d'),
            'pilihan_e' => Input::get('pilihan_e'),
            'jawaban' => Input::get('jawaban'),
            'gambar' => $filename,
            'user_created' => Input::get('user_created'));
        Soal::create($data);
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
        $data['listmatpel'] = Matapelajaran::select(DB::raw("id, CONCAT(pelajaran,' - ', jenjang) AS text"))->lists('text', 'id');
        return $data;
        die;
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


    /**
    * Create get API Soal
    */
    public function getId($id)
    {
        $data = Soal::find($id);
        if(is_null($data))
        {
             return Response::json("not found",404);
        }
       return Response::json($data,200);
    }

    public function getMatpelId($matpelid)
    {
        $data = Soal::where('mata_pelajaran_id','=',$matpelid)->get();
        if(is_null($data))
        {
             return Response::json("not found",404);
        }
        return Response::json($data,200);
    }

    public function getJenjang($jenjang)
    {
        $data = Matapelajaran::where('jenjang','=',$jenjang)->get();
        foreach ($data as $n) {
        $matpelsoal = \DB::table('matapelajaran')
                    ->join('soal','soal.mata_pelajaran_id','=','matapelajaran.id')
                    ->where('matapelajaran.jenjang','=',$n->jenjang)
                    ->select('matapelajaran.id', 'matapelajaran.jenjang', 'matapelajaran.pelajaran', 'matapelajaran.tahun_ajaran', 'soal.pertanyaan','soal.jawaban','soal.gambar','soal.user_created')
                    ->get();
        }
        $data['matpelsoal'] = $matpelsoal;
        //dd($data['matpelsoal']);
        //die;
        if(is_null($data))
        {
             return Response::json("not found",404);
        }
        return Response::json($data['matpelsoal'],200);
    }

    public function getPelajaran($pelajaran)
    {
        $data = Matapelajaran::where('pelajaran','=',$pelajaran)->get();
        foreach ($data as $n) {
        $matpelsoal = \DB::table('matapelajaran')
                    ->join('soal','soal.mata_pelajaran_id','=','matapelajaran.id')
                    ->where('matapelajaran.pelajaran','=',$n->pelajaran)
                    ->select('matapelajaran.id', 'matapelajaran.jenjang', 'matapelajaran.pelajaran', 'matapelajaran.tahun_ajaran', 'soal.pertanyaan','soal.jawaban','soal.gambar','soal.user_created')
                    ->get();
        }
        $data['matpelsoal'] = $matpelsoal;
        if(is_null($data))
        {
             return Response::json("not found",404);
        }
        return Response::json($data['matpelsoal'],200);
    }


    /**
    * Create CRUD API soal
    */
    public function tambah(Request $request)
    {
        $filename = Input::file('gambar')->getClientOriginalName();
        Input::file('gambar')->move(public_path().'/gambar/',$filename);
        $data = $request->all();
        $data = array(
            'mata_pelajaran_id' => Input::get('mata_pelajaran_id'),
            'pertanyaan' => Input::get('pertanyaan'),
            'pilihan_a' => Input::get('pilihan_a'),
            'pilihan_b' => Input::get('pilihan_b'),
            'pilihan_c' => Input::get('pilihan_c'),
            'pilihan_d' => Input::get('pilihan_d'),
            'pilihan_e' => Input::get('pilihan_e'),
            'jawaban' => Input::get('jawaban'),
            'gambar' => $filename,
            'user_created' => Input::get('user_created'));
        $success = Soal::create($data);

        if(!$success)
        {
            return Response::json("error saving",500);
        }
        return Response::json("success",201);
    }

    public function baca($id)
    {
        $success = Soal::find($id);
        if(is_null($success))
        {
             return Response::json("not found",404);
        }

        return Response::json($success,200);
    }

    public function ubah($id)
    {

        $soal = Soal::find($id);

        $filename = Input::file('gambar')->getClientOriginalName();
        $path = public_path('gambar/' . $filename);
        Input::file('gambar')->move(public_path().'/gambar/', $filename);
        $soal->gambar = $filename;
        $soal->save();
        $soal = Soal::find($id)->update(Input::except('gambar'));
        if(!$soal)
        {
            return Response::json("error updating",500);
        }
        return Response::json("success",201);
    }

    public function hapus($id)
    {
        $soal = Soal::find($id);
        $success = $soal->delete();
        if(!$success)
        {
            return Response::json("error deleting",500);
        }
        return Response::json("success",200);
    }

}
