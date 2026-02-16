<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function adminIndex() {
        $games = Game::orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('games'));
    }

    public function create() {
        return view('admin.games.create');
    }

    public function store(Request $request) {
        // HAPUS TOTAL VALIDASI PLATFORM
        $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan gambar
        $path = $request->file('cover_image')->store('covers', 'public');
        
        // SIMPAN KE DATABASE TANPA PLATFORM
        Game::create([
            'title' => $request->title,
            'cover_image' => $path,
            'is_featured' => $request->has('is_featured')
        ]);

        return redirect()->route('dashboard')->with('success', 'Game Berhasil Ditambah!');
    }
}