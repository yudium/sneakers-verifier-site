<?php

namespace App\Http\Controllers\Verificator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Verificator;

class VerificatorController extends Controller
{
    public function showBiography($id)
    {
        $verificator = Verificator::find($id);
        return view('verificator.biography', compact('verificator'));
    }
}
