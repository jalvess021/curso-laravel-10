<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support /*cria o objeto e injeta na variavel*/){

        $supports = $support -> all();
        //dd($supports);
        return view('admin/supports/index', compact('supports') /*ou ['supports' => $supports]*/);
        //retorna uma variavel com todos os valores que quero listar
    }

    public function create(){
        
        return view('admin/supports/create');
    }

    public function store(Request $request, Support $support){
     /*dd($request->only(['subject', '_token'])); 
        dd($request->all()); */
        $data = $request -> all();
        $data['status'] = 'a';  
        
       $support = $support -> create($data);
       
       return redirect()-> route("supports.index");
    }
}
