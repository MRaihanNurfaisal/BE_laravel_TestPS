<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BracketController extends Controller
{
    // Menampilkan halaman form
    public function index()
    {
        return view('bracket', ['result' => null]);
    }

    // Memeriksa apakah bracket seimbang
    public function check(Request $request)
    {
        // Validasi input
        $request->validate([
            'input' => 'required|string',
        ]);

        $input = $request->input('input');

        // Logika pemeriksaan balanced bracket
        $result = $this->isBalanced($input) ? 'YES' : 'NO';

        // Kembalikan hasil ke view
        return view('bracket', [
            'result' => $result,
            'input' => $input,
        ]);
    }

    // Fungsi untuk memeriksa apakah bracket seimbang
    private function isBalanced($str)
    {
        $stack = [];
        $bracketPairs = [
            ')' => '(',
            '}' => '{',
            ']' => '[',
        ];

        // Iterasi setiap karakter dalam string
        for ($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];

            // Jika karakter adalah opening bracket, tambahkan ke stack
            if (in_array($char, ['(', '{', '['])) {
                array_push($stack, $char);
            }
            // Jika karakter adalah closing bracket, periksa kecocokan
            elseif (isset($bracketPairs[$char])) {
                if (empty($stack) || array_pop($stack) !== $bracketPairs[$char]) {
                    return false; // Tidak cocok
                }
            }
        }

        // Jika stack kosong, semua bracket seimbang
        return empty($stack);
    }
}
