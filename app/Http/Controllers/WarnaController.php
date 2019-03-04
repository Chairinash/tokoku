<?php

namespace App\Http\Controllers;

use App\Warna;
use Illuminate\Http\Request;

class WarnaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function insertData(Request $request){
        Warna::create([
            'nama' => $request->nama,
            'type' => $request->type
        ]);
    
        return redirect()->route('warna.index');
    }

    public function allWarna(Request $request){
        if ($request->merek) {
            $warna = Warna::where('merek', 'like', '%'.$request->nama.'%')->paginate(2);
        }else{
            $warna = Warna::paginate(2);
        }            
        return view('warna.index', compact('warna'));
    
    }
    public function cariWarnaId($id){
        $warna = Warna::find($id);
        return $warna;
    }

    public function cariRequest(Request $request){
        $warna = Warna::where('nama', 'like','%'.$request->nama.'%')->get();
    return $warna;
    }

    public function updateWarna(Request $request, $id){
        $warna = Warna::find($id);
    $update = $warna->update([
        'nama' => $request->nama,
        'type' => $request->type
    ]);

    return redirect()->route('warna.index');
    }

    public function createWarna(){
        return view('warna.create');
    }
    public function editWarna($id){
        $warna = Warna::find($id);
        return view('warna.edit', compact('warna'));
    }
    public function deleteWarna($id){
        $warna = Warna::find($id)->delete();
        return redirect()->route('warna.index');
    }
}

