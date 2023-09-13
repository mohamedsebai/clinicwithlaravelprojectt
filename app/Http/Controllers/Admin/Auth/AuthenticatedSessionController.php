<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.login.index');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate('admin');

        $request->session()->regenerate();

        return redirect()->route('admin.panel.home');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Auth::guard('admin')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return redirect()->route('admin.login');

        if(Auth::guard('admin')->check()) // this means that the admin was logged in.
        {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('admin.login');
    }
}
