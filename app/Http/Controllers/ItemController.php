<?php

namespace App\Http\Controllers;

use App\Formatters\ItemParseFormatter;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $contents = json_decode($request->all(), true);
        $formatter = new ItemParseFormatter($contents);
        Item::create($formatter->format());

        return redirect()->route('items.index')
            ->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item) {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item) {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item) {

        $formatter = new ItemParseFormatter($request->all());

        $item->update($formatter->format());

        return redirect()->route('items.index')
            ->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Item $item) {
        $item->delete();

        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully');
    }
}