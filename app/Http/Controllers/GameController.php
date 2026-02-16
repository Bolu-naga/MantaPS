<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function index() {
        // Mengambil 8 game populer untuk Landing Page
        $featuredGames = Game::where('is_featured', true)->take(8)->get();
        // Mengambil semua data harga dari database MantaPS
        $prices = Price::all();
        
        return view('welcome', compact('featuredGames', 'prices'));
    }

    public function fullCatalogue() {
        $allGames = Game::all();
        return view('catalogue.index', compact('allGames'));
    }

    public function adminIndex() {
        $games = Game::orderBy('created_at', 'desc')->get();
        return view('admin.index', compact('games'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'platform' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('cover_image')->store('covers', 'public');
        
        Game::create([
            'title' => $request->title,
            'platform' => $request->platform,
            'cover_image' => $path,
            'is_featured' => $request->has('is_featured')
        ]);

        return back()->with('success', 'Data berhasil ditambah!');
    }

    public function destroy(Game $game) {
        if ($game->cover_image) {
            Storage::disk('public')->delete($game->cover_image);
        }
        $game->delete();
        return back();
    }
}