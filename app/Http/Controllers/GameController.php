<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    // Halaman Utama untuk Pengunjung (Landing Page)
    public function index() {
        $featuredGames = Game::where('is_featured', true)->take(8)->get();
        $prices = Price::all();
        return view('welcome', compact('featuredGames', 'prices'));
    }

    // Halaman Katalog Lengkap
    public function fullCatalogue() {
        $allGames = Game::all();
        return view('catalogue.index', compact('allGames'));
    }

    // Dashboard Admin (List data game untuk dikelola)
    public function adminIndex() {
        $games = Game::orderBy('created_at', 'desc')->get();
        // Pastikan file view ini ada di resources/views/admin/index.blade.php atau dashboard.blade.php
        return view('dashboard', compact('games')); 
    }

    // MENAMPILKAN FORM TAMBAH (Ini yang tadi hilang)
    public function create() {
        return view('admin.games.create');
    }

    // MENYIMPAN DATA KE DATABASE
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan gambar ke folder storage/app/public/covers
        $path = $request->file('cover_image')->store('covers', 'public');
        
        Game::create([
            'title' => $request->title,
            'cover_image' => $path,
            'is_featured' => $request->has('is_featured')
        ]);

        return redirect()->route('dashboard')->with('success', 'Game berhasil ditambah!');
    }

    public function destroy(Game $game) {
        if ($game->cover_image) {
            Storage::disk('public')->delete($game->cover_image);
        }
        $game->delete();
        return back()->with('success', 'Game berhasil dihapus!');
    }
}