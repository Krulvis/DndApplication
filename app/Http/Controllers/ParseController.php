<?php

namespace App\Http\Controllers;

use App\Parse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// use App\Item;

class ParseController extends Controller
{
    /**
     * Display a listings of the resource.
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $result = [];
        $data = $request->input();
        foreach (array_keys($data) as $key) {

            if (!Schema::hasColumn('parses', $key)) {
                array_push($result, $key);
                Schema::table('parses', function (Blueprint $table) {
                    $table->string($key);
                });
//                DB::statement('ALTER TABLE parses ADD ' . $key . ' VARCHAR(13) );');
            }
        }

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parse $parse
     * @return \Illuminate\Http\Response
     */
    public function show(Parse $parse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parse $parse
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
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Parse $parse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parse $parse)
    {
        $request->validate([
            'body' => 'required',
            'name' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'misc' => 'required',
            'source' => 'required',
            'type' => 'required',
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
     * @param  \App\Parse $parse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parse $parse)
    {
        $parse = Parse::find($parse);
        $parse->delete();

        return redirect('/parse')->with('success', 'Item has been deleted Successfully');
    }

    public function directoryToArray($directory, $recursive = true, $listDirs = false, $listFiles = true, $exclude = '')
    {
        $arrayItems = array();
        $skipByExclude = false;
        $handle = opendir($directory);
        if ($handle) {
            while (false !== ($file = readdir($handle))) {
                preg_match("/(^(([\.]){1,2})$|(\.(svn|git|md))|(Thumbs\.db|\.DS_STORE))$/iu", $file, $skip);
                if ($exclude) {
                    preg_match($exclude, $file, $skipByExclude);
                }
                if (!$skip && !$skipByExclude) {
                    if (is_dir($directory . DIRECTORY_SEPARATOR . $file)) {
                        if ($recursive) {
                            $arrayItems = array_merge($arrayItems, directoryToArray($directory . DIRECTORY_SEPARATOR . $file, $recursive, $listDirs, $listFiles, $exclude));
                        }
                        if ($listDirs) {
                            $file = $directory . DIRECTORY_SEPARATOR . $file;
                            $arrayItems[] = $file;
                        }
                    } else {
                        if ($listFiles) {
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
