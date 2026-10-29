<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Category;
use App\Models\LoginHistory;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = request()->category;
        $search = request()->search;

        $builds = Build::where('is_active', true);

        if ($category) {
            $builds->where('category_id', $category);
        }
        if ($search) {
            $builds->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }
        $builds = $builds->get();
        $categories = Category::all();
        return view('builds.index', compact('builds', 'categories', 'category', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loginCount = LoginHistory::where('user_id', Auth::id())->count();

        if ($loginCount < 3) {
            return redirect()->back()->with(
                'error',
                'You must log in at least 3 times before posting a build.'
            );
        }
        $categories = Category::all();
        return view('builds.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);
        $nameOfFile = $request->file('image_url')->storePublicly('builds', 'public');
        $build = new Build();
        $build->title = $request->input('title');
        $build->description = $request->input('description');
        $build->image_url = $nameOfFile;
        $build->user_id = auth()->user()->id;
        $build->category_id = $request->input('category');
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
        $build = Build::findOrFail($id);
        if (auth()->user()->id === $build->user_id || auth()->user()->isAdmin()) {
            return view('builds.edit', compact('build'));
        } else {
            return redirect('/builds')->with('error', 'Unauthorized Page');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $build = Build::findOrFail($id);
        $build->title = $request->input('title');
        $build->description = $request->input('description');
        if ($request->hasFile('image_url')) {
            $nameOfFile = $request->file('image_url')->storePublicly('builds', 'public');
            $build->image_url = $nameOfFile;
        }
        $build->save();


        return redirect()->route('builds-index')->with('success', 'Build updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $build = Build::findOrFail($id);
        $build->delete();

        return redirect()->route('builds-index')->with('success', 'Build deleted successfully.');
    }

    public function popular()
    {
        $builds = Build::where('is_active', true)
            ->withCount('favorites')
            ->orderByDesc('favorites_count')
            ->take(5)
            ->get();

        return view('welcome', compact('builds'));
    }

    public function admin_index()
    {
        $builds = Build::with('user')->get();
        return view('admin.builds', compact('builds'));
    }

    public function admin_toggle(string $id)
    {
        $build = Build::findOrFail($id);

        $build->is_active = !$build->is_active;
        $build->save();

        return back()->with('success', 'Status aangepast.');
    }
}
