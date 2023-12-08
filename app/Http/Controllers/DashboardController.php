<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $donations = Donation::with('donor', 'recipient')->get();

        return view('admin.dashboard', compact('donations'));
    }
}
