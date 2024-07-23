<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;


class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Vacante::class);
        return view('vacante.index');
    }

    public function show(Vacante $vacante)
    {
        return view('vacante.show', [
            'vacante' => $vacante
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', Vacante::class);
        return view('vacante.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        //
        $this->authorize('update', $vacante); //este es un Policy 'VacantePolicy'

        return view('vacante.edit', [
            'vacante' => $vacante
        ]);
    }
}
