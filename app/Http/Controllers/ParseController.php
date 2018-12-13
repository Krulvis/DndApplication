<?php

namespace App\Http\Controllers;

use App\Parse;
// use App\Item;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

class ParseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parses = Parse::all();
        return view('parse.index', compact('parses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo('test');l
        // $request->json(validate([
        //     'body'=>'required',
        //     'name'=>'required',
        //     'weight'=>'required',
        //     'price'=>'required',
        //     'misc'=>'required',
        //     'source'=>'',
        //     'type'=>'',
        //   ]));
        //   $parse = new Parse([
        //     'body' => $request->get('body'),
        //     'name'=> $request->get('name'),
        //     'weight'=> $request->get('weight'),
        //     'price'=> $request->get('price'),
        //     'misc'=> $request->get('misc'),
        //     'source'=> $request->get('source'),
        //     'type'=> $request->get('type')
        //   ]);

        // var_dump(file_get_contents('php://input'), true);

        $data = $request->json()->all();
        return response()->json($data);

        // var_dump($data->toArray());
        // Schema::create('')

        //   $parse->save();
        //   return redirect('/parse')->with('success', 'Item has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parse  $parse
     * @return \Illuminate\Http\Response
     */
    public function show(Parse $parse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parse  $parse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parse = Parse::find($id);

        return view('parse.edit', compact('parse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parse  $parse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parse $parse)
    {
        $request->validate([
            'body'=>'required',
            'name'=>'required',
            'weight'=>'required',
            'price'=>'required',
            'misc'=>'required',
            'source'=>'required',
            'type'=>'required',
        ]);
        $parse = Parse::find($parse);
        $parse->body = $request->get('body');
        $parse->name = $request->get('name');
        $parse->weight = $request->get('weight');
        $parse->price = $request->get('price');
        $parse->misc = $request->get('misc');
        $parse->source = $request->get('source');
        $parse->type = $request->get('type');

        $parse->save();
        return redirect('/parse')->with('success', 'Item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parse  $parse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parse $parse)
    {
        $parse = Parse::find($parse);
        $parse->delete();

        return redirect('/parse')->with('success', 'Item has been deleted Successfully');
    }

    public function directoryToArray($directory, $recursive = true, $listDirs = false, $listFiles = true, $exclude = '') {
        $arrayItems = array();
        $skipByExclude = false;
        $handle = opendir($directory);
        if ($handle) {
            while (false !== ($file = readdir($handle))) {
            preg_match("/(^(([\.]){1,2})$|(\.(svn|git|md))|(Thumbs\.db|\.DS_STORE))$/iu", $file, $skip);
            if($exclude){
                preg_match($exclude, $file, $skipByExclude);
            }
            if (!$skip && !$skipByExclude) {
                if (is_dir($directory. DIRECTORY_SEPARATOR . $file)) {
                    if($recursive) {
                        $arrayItems = array_merge($arrayItems, directoryToArray($directory. DIRECTORY_SEPARATOR . $file, $recursive, $listDirs, $listFiles, $exclude));
                    }
                    if($listDirs){
                        $file = $directory . DIRECTORY_SEPARATOR . $file;
                        $arrayItems[] = $file;
                    }
                } else {
                    if($listFiles){
                        $file = $directory . DIRECTORY_SEPARATOR . $file;
                        $arrayItems[] = $file;
                    }
                }
            }
        }
        closedir($handle);
        }
        return $arrayItems;
    }
}
