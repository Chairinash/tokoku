<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function insertData(Request $request){
        Barang::create([
            'merek' => $request->merek,
            'stock' => $request->stock,
            'ukuran' => $request->ukuran
            ]);
            
            return redirect()->route('barang.index');
        }
        
        public function cariBarangId($id){
            $barang = Barang::find($id);
            return $barang;
        }
        
        public function allBarang(Request $request){
            
            if ($request->merek) {
                $barang = Barang::where('merek', 'like', '%'.$request->merek.'%')->paginate(2);
            }else{
                $barang = Barang::paginate(2);
            }            
            return view('barang.index', compact('barang')); 
        }
        
        public function cariRequest(Request $request){
            $barang = Barang::where('merek', 'like','%'.$request->merek.'%')->get();
            return $barang;
        }
        
        public function updateBarang(Request $request, $id){
            $barang = Barang::find($id)->update([
                'merek' => $request->merek,
                'stock' => $request->stock,
                'ukuran' => $request->ukuran
                ]);
                return redirect()->route('barang.index');
            }
            
            public function createBarang(){
                return view('barang.create');
            }   
            
            public function editBarang($id){
                $barang = Barang::find($id);
                return view('barang.edit', compact('barang'));
            }
            public function deleteBarang($id){
                $barang = Barang::find($id)->delete();

                return redirect()->route('barang.index');
            }
        }
        