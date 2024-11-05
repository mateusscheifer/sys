<?php

namespace App\Http\Controllers;

use App\Models\Teste;
use Illuminate\Http\Request;

class PageInfoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|string',
            'title' => 'required|string',
        ]);

        $decodedUrl = urldecode($validated['url']);

        $a = new Teste();
        $a->data = json_encode([
            'title' => $validated['title'],
            'url' => $decodedUrl,
        ]);
        $a->save();

        return response()->json(['message' => 'Dados capturados com sucesso!'], 200);
    }
}
