<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function __invoke(Blog $blog)
    {
        return view('blog', ['blog' => $blog]);
    }
}
