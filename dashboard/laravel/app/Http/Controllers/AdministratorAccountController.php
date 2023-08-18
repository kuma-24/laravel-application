<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdministratorAccount;
use Illuminate\Support\Facades\Auth;

class AdministratorAccountController extends Controller
{
    public function profile()
    {
        $profiles = AdministratorAccount::with('administrator')->findOrFail(Auth::user()->id);
        return view('dashboard.administrator.account.profile', compact('profiles'));
    }
    
    public function edit()
    {
        $profiles = AdministratorAccount::with('administrator')->findOrFail(Auth::user()->id);
        return view('dashboard.administrator.account.edit', compact('profiles'));
    }
}
