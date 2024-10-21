<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function audio()
    {
        return view('client.audio.index');
    }
    public function audioEdit()
    {
        return view('client.audio.edit');
    }
}
