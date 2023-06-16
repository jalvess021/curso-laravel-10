<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\{CreateSupportDTO, UpdateSupportDTO};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(
        protected SupportService $service
    ){}

    public function index(Request $request){
        
        $supports = $this->service->paginate(
                                page: $request->get('page', 1), //se nao existir, valor padrao 1
                                totalPerPage: $request->get('per_page', 4), 
                                filter: $request->filter
                            );
        $filters = ['filter'=> $request->get('filter', '')];
        return view('admin/supports/index', compact('supports', 'filters') /*ou ['supports' => $supports]*/);
    }

    public function show(string $id)
    {
        //support::find($id);
        //support::where('id', $id)->first();
        //support::where('id', '=', $id)->first(); Parametro de comparacao
        if (!$support = $this->service->findOne($id)){ //se a variavel n receber um retorno de um id do bd, retorna para a url anterior.
            return back();
        }
        return view('admin/supports/show', compact('support'));
    }

    public function create()
    {    
        return view('admin/supports/create');
    }

    public function edit(string $id)
    {
        if (!$support = $this->service->findOne($id)){ 
            return back();
        }
        return view('admin/supports.edit', compact('support'));
    }

    public function store(StoreUpdateSupport $request)
    {
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );
       return redirect()-> route("supports.index");
    }

    public function update(StoreUpdateSupport $request){
    
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );

        if (!$support){ 
            return back();
        }

        return redirect()-> route('supports.index');
    }

    public function destroy(string $id){
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
