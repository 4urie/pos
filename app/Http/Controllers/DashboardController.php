<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // Check the role of the user and load the respective dashboard view
        if ($user->role == 'admin') {
            return view('dashboard.admin');  // Admin dashboard view
        } elseif ($user->role == 'seller') {
            return view('dashboard.seller'); // Seller dashboard view
        }

        return redirect('/');  // Redirect to home if role is not found
    }
}

