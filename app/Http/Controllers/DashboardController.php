<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckActiveSession;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckActiveSession::class);
    }

    public function index()
    {
        return view("dashboard");
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect("login")->with("success","sesi telah diakhiri");
    }
}
