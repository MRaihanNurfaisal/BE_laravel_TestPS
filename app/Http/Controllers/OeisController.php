<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OeisController extends Controller
{
    public function index()
    {
        return view('oeis.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'input' => 'required|integer|min:1',
        ]);

        $n = $request->input('input');
        $sequence = $this->generateA000124($n);

        return view('oeis.index', compact('sequence', 'n'));
    }

    private function generateA000124($n)
    {
        $sequence = [];
        for ($i = 1; $i <= $n; $i++) {
            $sequence[] = ($i * ($i - 1)) / 2 + 1;
        }
        return $sequence;
    }
}
