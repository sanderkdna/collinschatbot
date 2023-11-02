<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTickets_MensajesRequest;
use App\Http\Requests\UpdateTickets_MensajesRequest;
use App\Models\Tickets_Mensajes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Redirect;

class Tickets_MensajesController extends Controller
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
        return view('tickets.mensajes');
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
     * @param  \App\Http\Requests\StoreTickets_MensajesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTickets_MensajesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tickets_Mensajes  $tickets_Mensajes
     * @return \Illuminate\Http\Response
     */
    public function show(Tickets_Mensajes $tickets_Mensajes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tickets_Mensajes  $tickets_Mensajes
     * @return \Illuminate\Http\Response
     */
    public function edit(Tickets_Mensajes $tickets_Mensajes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTickets_MensajesRequest  $request
     * @param  \App\Models\Tickets_Mensajes  $tickets_Mensajes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTickets_MensajesRequest $request, Tickets_Mensajes $tickets_Mensajes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tickets_Mensajes  $tickets_Mensajes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tickets_Mensajes $tickets_Mensajes)
    {
        //
    }
}
