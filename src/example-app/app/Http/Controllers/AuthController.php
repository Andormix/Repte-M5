<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Iniciar sessió
    public function login(Request $request)
    {
        // Validar les dades
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Intentar iniciar sessió
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) 
        {
            // Fem un redirect amb un missatge flash
            return redirect()->back()->with('success', 'Benvingut de nou al teu racó del llibre! 📚🏡');
        }
        return redirect()->back()->with('error', 'Ooops! Sembla que hi ha hagut un problema al iniciar sessió. Si us plau, revisa les teves credencials i torna-ho a provar. 🧐');
    }

    // Tancar sessió
    public function logout()
    {
        Auth::logout();
        return redirect()->back()->with('success', 'Has tancat la sessió amb èxit. Fins aviat! 👋');
    }
}