<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index()
    {
        // Menampilkan halaman dengan form kosong
        return view('ranking', ['result' => null]);
    }

    public function calculate(Request $request)
    {
        // Validasi input
        $request->validate([
            'scores' => 'required|string',
            'gits_scores' => 'required|string',
        ]);

        // Ambil dan proses input
        $scores = explode(',', $request->input('scores'));
        $scores = array_map('intval', $scores); // Ubah menjadi integer

        $gitsScores = explode(',', $request->input('gits_scores'));
        $gitsScores = array_map('intval', $gitsScores); // Ubah menjadi integer

        // Hapus duplikat dan urutkan skor (descending)
        $uniqueScores = array_unique($scores);
        rsort($uniqueScores);

        // Hitung peringkat
        $result = [];
        foreach ($gitsScores as $gitsScore) {
            $rank = 1;
            foreach ($uniqueScores as $score) {
                if ($gitsScore >= $score) {
                    break;
                }
                $rank++;
            }
            $result[] = $rank;
        }

        // Kembalikan hasil ke halaman dengan hasil perhitungan
        return view('ranking', [
            'result' => $result,
            'gitsScores' => $gitsScores,
        ]);
    }
}
