<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FortuneController extends Controller
{
    private $fortunes = [
        "Un gran éxito te espera en tu próximo proyecto",
        "La persistencia es el camino al éxito",
        "Hoy es un buen día para comenzar algo nuevo",
        "Tu código compilará sin errores la primera vez",
        "Una oportunidad única aparecerá pronto",
        "La sabiduría viene de la experiencia",
        "Tus esfuerzos serán recompensados",
        "El mejor momento es ahora",
        "La creatividad fluirá en abundancia",
        "Confía en tu instinto, te guiará bien",
        "Un bug misterioso será resuelto hoy",
        "La documentación será clara y completa"
    ];

    public function index()
    {
        return view('fortune-cookie');
    }

    public function getFortune()
    {
        $randomFortune = $this->fortunes[array_rand($this->fortunes)];
        
        return response()->json([
            'fortune' => $randomFortune,
            'timestamp' => now()
        ]);
    }
}