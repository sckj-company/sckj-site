<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function edit()
    {
        return view('admin.conta.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password_atual' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:10', 'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/', 'confirmed', 'different:password_atual'],
        ], [
            'required' => __('admin.val_required'),
            'current_password' => __('admin.val_current_password'),
            'min' => __('admin.val_min'),
            'password.regex' => __('admin.val_regex'),
            'confirmed' => __('admin.val_confirmed'),
            'different' => __('admin.val_different'),
        ]);

        $request->user()->forceFill([
            'password' => Hash::make($request->input('password')),
        ])->save();

        return back()->with('sucesso', __('admin.flash_senha_alterada'));
    }
}
