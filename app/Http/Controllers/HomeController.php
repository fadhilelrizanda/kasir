<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PostController;
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
        return redirect()->route('/');
    }

    public function manage()
    {
        $controller = new PostController;
        return $controller->manajemen();
    }

    public function input()
    {
        $controller = new PostController;
        return $controller->create();
    }
}
