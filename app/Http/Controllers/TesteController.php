<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index()
    {
        return "Teste";
    }

    public function noauth()
    {
        return "Rota sem auth";
    }
}
