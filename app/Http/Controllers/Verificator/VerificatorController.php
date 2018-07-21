<?php

namespace App\Http\Controllers\Verificator;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Verificator;

class VerificatorController extends Controller
{
    public function profile($id)
    {
        $verificator = Verificator::withCount([
            'reviews as reviewed_count',
        ])->find($id);

        Log::debug('Verificator: ', ['verificator' => $verificator->name]);

        $verificator->reviews = $verificator->reviews()->paginate(6);

        return view('verificator.profile', compact('verificator'));
    }

    public function showBiography($id)
    {
        $verificator = Verificator::find($id);
        return view('verificator.biography', compact('verificator'));
    }
}
