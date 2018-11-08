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
    public function index($id)
    {
       
        $post = self::find($id)->first();
        $docs = self::selectAll();
        $params = self::selectParams($id);
       
        return view('document', compact('docs','post','params'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $title
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $post = self::find($id)->first();
        $docs = self::selectAll();
        $params = self::selectParams($id);
         
        return view('documents.edit', compact('docs', 'post','params'));
        
    }
    /**
     * Update the form for editing the specified resource.
     *
     * @param  string  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        
       
        $posts = DB::table('documentation')
            ->where('id', $request->id)
            ->update(['title' => $request->title, 
            'description' => $request->description,            
            'request_body' => $request->request_body,
            'response_success' => $request->response_success,
            'response_error' => $request->response_error
            ]);
            
        $docs = self::selectAll();
        $posts = self::find($request->id);
        $post = $posts[0];
        $params = self::selectParams($request->id);
         
        return view('document', compact('docs', 'post', 'params'));
        
        
    }
    public function selectAll(){
        $docs = DB::table('documentation')
        ->select(DB::raw('id, title, description'))
        ->get();
        return $docs;
    }
    public function find($id)
    {
        $doc = DB::table('documentation')
                    ->select(DB::raw('*'))
                    ->where('id','=',$id)
                    ->get();

        //return view('document', compact('docs'));
        //(print_r($doc));
        return $doc;
    }
    /**
     * Select parameter for specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function selectParams($id){
        
        $params = DB::table('parameters')
        ->select(DB::raw('*'))
        ->where('doc_id','=',$id)
        ->get();
       
        return $params;
        
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $title
     * @return \Illuminate\Http\Response
     */
    public function editParams($id){
        
        $posts = self::find($id);
        $docs = self::selectAll();
        $params = selectParams($id);
        $param = $params[0];
        // Check for correct user
        //die(print_r($doc));
        //return view('documents.edit')->with('doc', $doc);
        return view('documents.edit', compact('docs', 'posts','param'));
        
    }
    /**
     * Update the form for editing the specified resource.
     *
     * @param  string  $title
     * @return \Illuminate\Http\Response
     */
    public function updateParams(Request $request, $id) {
       
        $rows = $request->request;
        
        $keys = null;
        $values = null;
        $i=-1;
        
        //unset($rows['_token']);
       // print("<pre>".print_r($rows,true)."</pre>");
       foreach($rows as $row ) {
          $i++;
            $keys[0][] = $row[0];
            $keys[1][] = $row[1];
            $keys[2][] = $row[2];
            $keys[3][] = $row[3];
            $keys[4][] = $row[4];
           // $keys[4][] = $row[$i];
           
           // print_r(json_encode($row));
           // $where .= json_encode ('doc_id = '.$row[0]).', ';
            //$sql .= json_encode (' name = '.$row[1]).', ';
        }
        //print_r( ($keys));
        for($i=0;$i<5;$i++){
             
            //print("<pre>".print_r($keys[$i] ,true)."</pre>");
            $values = $keys[$i];
             $posts = DB::table('parameters')
            ->where('id', $values[0])
            ->update(['name' => $values[1], 
            'datatype' => $values[2],            
            'required' => $values[3],
            'description' => $values[4] 
            ]); 
        }
        //die(print_r($request->request));
        $posts = self::find($request->title);
      
        $docs = self::selectAll();
        $params = self::selectParams($request->id);
        $param = $params[0];           
        return back();
    
    }
    /**
     * Update the form for editing the specified resource.
     *
     * @param  string  $title
     * @return \Illuminate\Http\Response
     */
    public function addParams(Request $request,$id) {
       
        //$rows = $request->request;
         
        $posts = DB::table('parameters')->insert(
            ['doc_id' => $id, 'name' => $request->name, 'datatype' => $request->datatype, 'required' => $request->required, 'description' => $request->description]
        );
        
             
        return back();
    
    }
    
    
}
