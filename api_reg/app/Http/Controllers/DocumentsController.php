<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DocumentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all Documents.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = DB::table('documentation')
                    ->select(DB::raw('*'))
                    ->where('title','=',$title)
                    ->get();

        return view('document', compact('docs'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $title
     * @return \Illuminate\Http\Response
     */
    public function edit($title)
    {
        $docs = self::find($title);
        // Check for correct user
        //die(print_r($doc));
        //return view('documents.edit')->with('doc', $doc);
        return view('documents.edit', compact('docs'));
        
    }
    /**
     * Update the form for editing the specified resource.
     *
     * @param  string  $title
     * @return \Illuminate\Http\Response
     */
    public function update($title)
    {
        
        return view('documents.edit', compact('docs'));
        
    }
    public function find($title)
    {
        $doc = DB::table('documentation')
                    ->select(DB::raw('*'))
                    ->where('title','=',$title)
                    ->get();

        //return view('document', compact('docs'));
        return $doc;
    }
    
}
