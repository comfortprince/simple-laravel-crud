<?php

namespace App\Http\Controllers;

use App\Models\Shark;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class SharkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sharks = Shark::all();

        return view("sharks.index", compact("sharks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("sharks.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd('fsdfasdas');

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:App\Models\Shark',
            'shark_level' => [
                'required',
                'integer',
                'gte:1',
                'lte:3'
            ] 
        ]);

        Shark::create($validated);

        session()->flash('success','New Shark Created Successfully');
        return redirect()->route('shark.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shark = Shark::find($id);
        return view('sharks.show', compact('shark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shark = Shark::find($id);
        return view('sharks.edit', compact('shark'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shark = Shark::find($id);

        //validate request
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' =>  [
                'required',
                'email',
                Rule::unique('sharks')->ignore($shark)
            ],
            'shark_level' => [
                'required',
                'integer',
                'gte:1',
                'lte:3'
            ] 
        ]);
        
        $shark->update($validated);

        session()->flash('success','Successfully Updated The Shark');
        return redirect()->route('shark.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Shark::find(intval($id))->delete();
        session()->flash('success','Successfully deleted a shark');
        return redirect()->route('shark.index');
    }
}
