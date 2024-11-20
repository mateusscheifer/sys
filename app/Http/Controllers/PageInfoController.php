<?php

namespace App\Http\Controllers;

use App\Enums\Page\Status;
use App\Models\ClientUrl;
use App\Models\Page;
use App\Models\Teste;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageInfoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|string',
            'title' => 'required|string',
        ]);

        $decodedUrl = urldecode($validated['url']);
        $origin = $request->headers->get('origin') ?? $request->headers->get('referer');
        $origin = stripslashes($origin);

        $clientUrl = ClientUrl::where('url','LIKE', '%'.$origin.'%')->first();

        if (isset($clientUrl->id)) {
            $page = Page::where('url', $decodedUrl)->where('client_url_id', $clientUrl->id)->first();
            if (isset($page->id)){
                return response()->json($page, 200);
            }else{
                $newPage = new Page();
                $newPage->client_url_id = $clientUrl->id;
                $newPage->title = $validated['title'];
                $newPage->slug = Str::slug($validated['title']);
                $newPage->description = $validated['title'];
                $newPage->url = $decodedUrl;
                $newPage->status = Status::Active;
                $newPage->save();
                return response()->json($newPage, 200);
            }
        }
        return response()->json($decodedUrl, 200);
//        $a = new Teste();
//        $a->data = json_encode([
//            'title' => $validated['title'],
//            'url' => $decodedUrl,
//        ]);
//        $a->data1 = json_encode([
//            'validate' => $origin
//        ]);
//        $a->save();

        return response()->json(['message' => 'Dados capturados com sucesso!'], 200);
    }
}
