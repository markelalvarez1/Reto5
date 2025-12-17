<?php

namespace App\Http\Controllers;

class LocaleController extends Controller
{
    public function setLocale($locale)
    {
        // Coger el idioma
        // Verificar si es un idioma válido
        if (!in_array($locale, ['es', 'eu', 'en'])) {
            $locale = 'es';
        }
        // Guardarlo en la sesión
        session(['locale' => $locale]);
        \App::setLocale($locale);

        return redirect()->back();
    }
}
