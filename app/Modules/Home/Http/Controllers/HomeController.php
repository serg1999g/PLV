<?php

namespace App\Modules\Home\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::role('writer')->get();
//        dd($users);
        return view('web.sections.home');
    }
}
