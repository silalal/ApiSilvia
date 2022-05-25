<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Exception;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Post::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
        return Post::findOrFail($id);
    }

    public function mostraDades($preu){
        return Post::where('Preu', $preu)->pluck('Nom_Barri');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    static public function dadesbarri($id)
    {
        //
      
            $dadesbarri = Post::findOrFail($id);
            $filename = "barris.json";

            $handle = fopen($filename,'w+');
            fputs($handle, $dadesbarri->toJson(JSON_PRETTY_PRINT));
            fclose($handle);
            $headers = array('Content-type'=>'application/json');
            return response()->download($filename, 'barris.json', $headers);

    }
}
