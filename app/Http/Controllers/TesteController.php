<?php

namespace App\Http\Controllers;

use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Requests\StoreUpdateSupport;
use App\Http\Resources\SupportResource;
use App\Services\SupportService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TesteController extends Controller
{
    public function __construct(
     protected SupportService $service
    )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd('aqui');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
     //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSupport $request)
    {
    //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
