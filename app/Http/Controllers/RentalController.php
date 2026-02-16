<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index() {
    // Ambil maksimal 8 game yang ditandai sebagai featured
    $featuredGames = \App\Models\Game::where('is_featured', true)->take(8)->get();
    return view('welcome', compact('featuredGames'));
    }
    public function destroy(Game $game) {
    // Hapus file gambar dari storage
    \Storage::delete('public/' . $game->cover_image);
    // Hapus data dari database
    $game->delete();
    return back()->with('success', 'Game berhasil dihapus dari supply!');
}
}