<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function __invoke(Blog $blog)
    {
        app()->setLocale(request('locale','ar'));
        return view('blog', ['blog' => $blog]);
    }
}
