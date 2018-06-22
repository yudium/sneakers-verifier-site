<?php

namespace App\Http\Controllers;

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
        $user = $this->user->find($userid);

        $user_num_verif_item = $user->verification_items->count();
        $user_num_unreviewed_verif_item = 
            $user->verification_items()->where('status_review', 0)->count();

        return view('user.profile', compact(
            'user',
            'user_num_verif_item',
            'user_num_unreviewed_verif_item'
        ));
    }
}

