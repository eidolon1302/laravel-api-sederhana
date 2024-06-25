<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Film::orderby('judul', 'asc')->get();
        return response()->json([
            'status'=>true,
            'message'=>'Data ditemukan',
            'data'=>$data
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $dataFilm = new Film;

        $rules = [
            'judul'=>'required',
            'sutradara'=>'required',
            'tanggal_rilis'=>'required|date',
            'genre'=>'required',
            'country'=>'required'
        ]; 

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){ 
            return response()->json([
                'status'=>false,
                'message'=>'Gagal menginput data',
                'data'=> $validator->errors()
            ]);
        }
        $dataFilm->judul = $request->judul;
        $dataFilm->sutradara = $request->sutradara;
        $dataFilm->tanggal_rilis = $request->tanggal_rilis;
        $dataFilm->genre = $request->genre;
        $dataFilm->country = $request->country;

        $post = $dataFilm->save();

        return response()->json([
            'status'=>true,
            'message'=>'Sukses menginput data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Film::find($id);
        if($data){
            return response()->json([
                'status'=>true,
                'message'=>'Data ditemukan',
                'data'=>$data
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataFilm = Film::find($id);
        if(empty($dataFilm)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ],404);
        }

        $rules = [
            'judul'=>'required',
            'sutradara'=>'required',
            'tanggal_rilis'=>'required|date',
            'genre'=>'required',
            'country'=>'required'
        ]; 

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){ 
            return response()->json([
                'status'=>false,
                'message'=>'Gagal menginput data',
                'data'=> $validator->errors()
            ]);
        }
        $dataFilm->judul = $request->judul;
        $dataFilm->sutradara = $request->sutradara;
        $dataFilm->tanggal_rilis = $request->tanggal_rilis;
        $dataFilm->genre = $request->genre;
        $dataFilm->country = $request->country;

        $post = $dataFilm->save();

        return response()->json([
            'status'=>true,
            'message'=>'Sukses mengupdate data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataFilm = Film::find($id);
        if(empty($dataFilm)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ],404);
        }
        $post = $dataFilm->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Sukses menghapus data'
        ]);
    }
}
