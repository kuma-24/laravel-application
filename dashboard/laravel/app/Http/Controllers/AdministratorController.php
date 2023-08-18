<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{
    public function registerAuthorizationFlag()
    {
        cache([
            'register_authorization_flag' => true,
            'register_authorization_flag_set_user' => Auth::user()->id,
        ], 600);
        return redirect()->back()->with('success', 'Flag has been set in session.');
    }
    
    public function index()
    {
        $administrators = Administrator::with('administrator_account')->get();
        return view('dashboard.administrator.index', compact('administrators'));
    }

    public function show($id)
    {
        $administrator = Administrator::with('administrator_account')->findOrFail($id);
        return view('dashboard.administrator.show', compact('administrator'));
    }
}
