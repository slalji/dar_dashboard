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
    public function index($title)
    {
        $posts = DB::table('documentation')
                    ->select(DB::raw('*'))
                    ->where('title','=',$title)
                    ->get();
        
        $docs = self::selectAll();
        return view('document', compact('docs','posts'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $title
     * @return \Illuminate\Http\Response
     */
    public function edit($title)
    {
        
        $posts = self::find($title);
        $docs = self::selectAll();
        // Check for correct user
        //die(print_r($doc));
        //return view('documents.edit')->with('doc', $doc);
        return view('documents.edit', compact('docs', 'posts'));
        
    }
    /**
     * Update the form for editing the specified resource.
     *
     * @param  string  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $title = $request->title;
        $required = $request->required;
        $req = $request->body;
        $success = $request->response_success;
        $error = $request->response_error;
         
        //sdie(print_r($success));
        $posts = DB::table('documentation')
            ->where('id', $id)
            ->update(['title' => $title,
            'required' => $required,
            'request_body' => $req,
            'response_success' => $success,
            'response_error' => $error
            ]);
        
        $docs = self::selectAll();
        (print_r($doc));
        return view('document', compact('docs', 'posts'));
        
        
    }
    public function selectAll(){
        $docs = DB::table('documentation')
        ->select(DB::raw('title, description'))
        ->get();
        return $docs;
    }
    public function find($title)
    {
        $doc = DB::table('documentation')
                    ->select(DB::raw('*'))
                    ->where('title','=',$title)
                    ->get();

        //return view('document', compact('docs'));
        //(print_r($doc));
        return $doc;
    }
    
}
