<?php

namespace App\Http\Controllers;

use App\Recette;
use Illuminate\Http\Request;

class RecettesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recettes = Recette::all();

        return view('recettes.index')->with('recettes', $recettes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recettes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Recette::create($input);

        return redirect('recette')->with('flash_message', 'Recette Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recette = Recette::find($id);

        return view('recettes.show')->with('recettes', $recette);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recette = Recette::find($id);

        return view('recettes.edit')->with('recettes', $recette);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recette = Recette::find($id);
        $input = $request->all();
        $recette->update($input);
        view()->share('recette', $recette);

        return redirect('recette')->with('flash_message', 'Contact Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recette::destroy($id);

        return redirect('recette')->with('flash_message', 'Contact deleted!');
    }
}
