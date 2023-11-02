<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketsRequest;
use App\Http\Requests\UpdateTicketsRequest;
use App\Models\Tickets;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Redirect;

class TicketsController extends Controller
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
        $tickets = DB::table('tickets')->orderBy('id', 'desc')->get();

        return view('tickets.index', compact('tickets'));
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function show(Tickets $tickets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tickets = DB::table('tickets')->orderBy('id', 'desc')->get();

        $mensajes = DB::table('tickets_mensajes')->where(['ticket_id' => $id])->orderBy('id', 'asc')->get();
        return view('tickets.edit', compact('tickets', 'id', 'mensajes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketsRequest  $request
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketsRequest $request, Tickets $tickets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tickets $tickets)
    {
        //
    }
}
