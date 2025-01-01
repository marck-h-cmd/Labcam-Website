<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paper;


class PaperController extends Controller
{
    public function index()
    {
        $papers= Paper::all();
        return view('usuario.nosotros.biblioteca', compact('papers'));
    }
}
