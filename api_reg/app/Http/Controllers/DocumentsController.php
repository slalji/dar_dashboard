<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$post = Document::find($id);
        // Check for correct user
        if(auth()->user()->isAdmin){
            return  'Unauthorized Page to Edit this page';
        }
        return view('documents.edit')->with('post', $post);
    }
    
}
