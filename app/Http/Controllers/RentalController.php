<?php

namespace App\Http\Controllers;

use App\Models\Price; // Pastikan Model Price sudah dibuat
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RentalController extends Controller
{
public function index() {
    $featuredGames = \App\Models\Game::where('is_featured', true)->latest()->take(8)->get();
    $prices = \App\Models\Price::all();
    
    return view('welcome', compact('featuredGames', 'prices'));
}

    public function destroy(Game $game) 
    {
        // Hapus file gambar dari storage
        if ($game->cover_image) {
            Storage::delete('public/' . $game->cover_image);
        }
        
        // Hapus data dari database
        $game->delete();

        return back()->with('success', 'Game berhasil dihapus!');
    }
}