<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobilController extends Controller
{
    protected $arrayMobil = [];
    function index()
    {
        $dataMobil = session()->get('dataMobilNew');
        return view('mobil.index', compact('dataMobil'));
    }

    function create()
    {
        return view('mobil.form');
    }

    function store(Request $request)
    {
        $namaMobil = $request->nama_mobil; 
        $merkmobil = $request->merk_mobil;
        $cc = $request->cc;

        //input dari form
        $dataMobilBaru = [
            'namaMobil' => $namaMobil,
            'merkMobil' => $merkmobil,
            'cc' => $cc
        ];

        //push data
        array_push($this->arrayMobil, $dataMobilBaru);
        
        return redirect()->to('/mobil')->with('dataMobilNew',$this->arrayMobil);
    }
}