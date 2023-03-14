<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support /*cria o objeto e injeta na variavel*/){

        $supports = $support -> all();
        dd($supports);
        return view('admin/supports/index', compact('supports') /*ou ['supports' => $supports]*/);
        //retorna uma variavel com todos os valores que quero listar
    }
}
