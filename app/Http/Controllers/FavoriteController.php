<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function index()
    {
        $favorites = Favorite::with('build')
            ->where('user_id', auth()->id())
            ->get();

        return view('favorites.index', compact('favorites'));
    }


    public function store(string $id)
    {
        $favorite = new Favorite();
        $favorite->build_id = $id;
        $favorite->user_id = auth()->id();
        $favorite->save();

        return redirect()->route('favorites-index');
    }

    public function destroy(string $id)
    {
        $favorite = Favorite::where('user_id', auth()->id())
            ->where('build_id', $id);

        if ($favorite) {
            $favorite->delete();
        }
        return redirect()->route('favorites-index');
    }
}
