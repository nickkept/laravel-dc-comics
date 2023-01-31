<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function app()
    {
        
        return view("app");
    }

    public function index()
    {
        return view("comics.index");
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comics.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("comics.show");
    }



    public function edit($id)
    {
        $comic = Comic::find($id);

        if (!$comic) {
            // Lancio un messaggio d'errore personalizzato
            abort(406, "Ritenta, sarai più fortunato");
        }
        return view("comics.edit", [
            "comic" => $comic
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if (!key_exists("available", $data)) {
            $data["available"] =  false;
        } else {
            $data["available"] = true;
        }

        $comic = Product::findOrFail($id);
        $comic->name = $data["name"];
        $comic->description = $data["description"];
        $comic->price = (float) $data["price"];
        $comic->available = $data["available"];
        $comic->save();
        $comic->update($data);


        return redirect()->route("comics.show", $comic->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);

        $comic->delete();


        return redirect()->route("comics.index");
    }
}