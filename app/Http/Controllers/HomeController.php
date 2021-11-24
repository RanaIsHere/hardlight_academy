<?php

namespace App\Http\Controllers;

use App\Models\ActionLogs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function launchHome()
    {
        $logs = ActionLogs::orderBy('id', 'DESC')->paginate(10);
        return view('home', ['page' => 'Home', 'logs' => $logs]);
    }
}
