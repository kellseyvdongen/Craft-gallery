<?php

namespace App\Http\Controllers;

use App\Models\Build;
use Illuminate\Http\Request;

class BuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $builds = Build::all();
        return view('builds.index', compact('builds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('builds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        $nameOfFile = $request->file('image_url')->storePublicly('builds', 'public');
        $build = new Build();
        $build->title = $request->input('title');
        $build->description = $request->input('description');
        $build->image_url = $nameOfFile;
        $build->user_id = '1';
        $build->category_id = $request->input('category_id') ?? '1';
        $build->save();

        return redirect()->route('builds-index')->with('success', 'Build created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $build = Build::findOrFail($id);
        return view('builds.show', compact('build'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
//        $build = Build::findOrFail($id);
//        return view('builds.edit', compact('build'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
