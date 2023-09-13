<?php

namespace App\Http\Controllers\DocProfile\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('clinic.doctorProfile.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('doctor')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('front.doctorProfile.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput(['email']);
    }

    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate('doctor');

    //     $request->session()->regenerate();

    //     return redirect()->route('front.doctorProfile.index');
    // }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('doctor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('doctor.login');
    }
}
