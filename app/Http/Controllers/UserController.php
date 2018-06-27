<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    /**
     * Show user profile page
     *
     */
    public function profile($userid)
    {
        Log::debug('profile() is started', ['userid' => $userid]);
        $user = $this->user->withCount([
            'verification_items as verification_items_count',
            'verification_items as unreviewed_verification_items_count' => function ($query) {
                $query->where('status_review', 0);
            },
        ])->find($userid);

        return view('user.profile', compact('user'));
    }
}

