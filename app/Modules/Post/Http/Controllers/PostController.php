<?php

namespace App\Modules\Post\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('web.posts.index');
    }
}
