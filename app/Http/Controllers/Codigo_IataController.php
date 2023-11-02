<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreCodigo_IataRequest;
use App\Http\Requests\UpdateCodigo_IataRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Codigo_Iata;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;
use Redirect;


class Codigo_IataController extends Controller
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
        $codigos = DB::table('codigo__iatas')->get();

        return view('codigos.index', compact('codigos'));
      //return 'hola mundo';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('codigos.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCodigo_IataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCodigo_IataRequest $request)
    {
        $codigo_Iata = Codigo_iata::create($request->validated());
        return redirect()->route('codigo_iata.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Codigo_Iata  $codigo_Iata
     * @return \Illuminate\Http\Response
     */
    public function show(Codigo_Iata $codigo_Iata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Codigo_Iata  $codigo_Iata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $codigo = Codigo_Iata::find($id);
        #return view('usuario.edit',['user'=>$users]);
        #exit;
        return view('codigos.edit', compact('codigo'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCodigo_IataRequest  $request
     * @param  \App\Models\Codigo_Iata  $codigo_Iata
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCodigo_IataRequest $request, $id)
    {
        $codigo = Codigo_iata::find($id);
        $codigo->fill($request->all());
        $codigo->save();

        return redirect()->route('codigo_iata.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Codigo_Iata  $codigo_Iata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $codigo = Codigo_Iata::find($id);
        $codigo->delete();

        return redirect()->route('codigo_iata.index');
    }
}
