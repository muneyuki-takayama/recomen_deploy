<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function show(string $name)
    {
        $tag = Tag::where('name', $name)->first();

        return view('tags.show', ['tag' => $tag]);
    }

    public function search()
    {
        $registeredTags = Tag::all()->sortByDesc('created_at');

        return view('tags.search', [ 
            'registeredTags' => $registeredTags,
            ]);
    }


}
