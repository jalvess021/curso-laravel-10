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

    public function show(string|int $id, Support $support){
        //support::where('id', $id)->first();
        //support::where('id', '=', $id)->first(); Parametro de comparacao
        if (!$support = $support -> find($id)){ //se a variavel n receber um retorno de um id do bd, retorna para a url anterior.
            return back();
        }
        return view('admin/supports/show', compact('support'));
        dd($support);
    }

    public function create(){
        
        return view('admin/supports/create');
    }

    public function edit(string|int $id, Support $support){
        if (!$support = $support -> where('id', '=', $id)->first()){ 
            return back();
        }
        return view('admin/supports.edit', compact('support'));
    }

    public function store(Request $request, Support $support){
     /*dd($request->only(['subject', '_token'])); 
        dd($request->all()); */
        $data = $request -> all();
        $data['status'] = 'a';  
        
       $support = $support -> create($data);
       
       return redirect()-> route("supports.index");
    }

    public function update(Request $request, string $id, Support $support){
    
        if (!$support = $support -> find($id)){ 
            return back();
        }
        $support->update($request->only(['subject', 'body']));
        return redirect()-> route('supports.index');
    }

    public function destroy(string|int $id){
        if (!$support = Support::find($id)){ 
            return back();
        }
        $support->delete();
        return redirect()->route('supports.index');
    }
}
