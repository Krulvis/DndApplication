<?php
  
namespace App\Http\Controllers;
  
use App\Item;
use Illuminate\Http\Request;
  
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recaps = Item::latest()->paginate(50);
  
        return view('items.index',compact('recaps'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recaps.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        Recap::create($request->all());
   
        return redirect()->route('recaps.index')
                        ->with('success','Recap created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Recap  $recap
     * @return \Illuminate\Http\Response
     */
    public function show(Recap $recap)
    {
        return view('recaps.show',compact('recap'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recap  $recap
     * @return \Illuminate\Http\Response
     */
    public function edit(Recap $recap)
    {
        return view('recaps.edit',compact('recap'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recap  $recap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recap $recap)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        $recap->update($request->all());
  
        return redirect()->route('recaps.index')
                        ->with('success','Recap updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recap  $recap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recap $recap)
    {
        $recap->delete();
  
        return redirect()->route('recaps.index')
                        ->with('success','Recap deleted successfully');
    }
}