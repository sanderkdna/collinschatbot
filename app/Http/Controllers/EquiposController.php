<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquiposRequest;
use App\Http\Requests\UpdateEquiposRequest;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Equipos;
use Illuminate\Http\Request;
use Session;
use Redirect;


class EquiposController extends Controller
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
        $equipos = DB::table('equipos')->get();
        return view('equipos.index', compact('equipos'));
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
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEquiposRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquiposRequest $request)
    {
        $equipos = Equipos::create($request->validated());
        return redirect()->route('equipos.index');
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function show(Equipos $equipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipos::find($id);
        #return view('usuario.edit',['user'=>$users]);
        #exit;
        return view('equipos.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEquiposRequest  $request
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquiposRequest $request, $id)
    {
        $equipo = Equipos::find($id);
        $equipo->fill($request->all());
        $equipo->save();

        return redirect()->route('equipos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipos = Equipos::find($id);
        $equipos->delete();

        return redirect()->route('equipos.index');
    }
}
