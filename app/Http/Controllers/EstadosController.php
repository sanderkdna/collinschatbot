<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstadosRequest;
use App\Http\Requests\UpdateEstadosRequest;
use App\Models\Estados;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Session;
use Redirect;

class EstadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = DB::table('estados')->get();
        return view('estados.index', compact('estados'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstadosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstadosRequest $request)
    {
        //
        $estado = Estados::create($request->validated());
        return redirect()->route('estados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function show(Estados $estados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $estado = Estados::find($id);
        #return view('usuario.edit',['user'=>$users]);
        #exit;
        return view('estados.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstadosRequest  $request
     * @param  \App\Models\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstadosRequest $request, $id)
    {
        $estado = Estados::find($id);
        $estado->fill($request->all());
        $estado->save();

        return redirect()->route('estados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $estado = Estados::find($id);
        $estado->delete();

        return redirect()->route('estados.index');
    }
}
