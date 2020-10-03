<?php

namespace App\Policies;

use App\Camera;
use App\Prenotazioni;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Tests\Fixtures\Post;

class PrenotazionePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function viewAny($user)
    {
        return Gate::any(['root', 'managePrenotazioni'], $user);
    }

    public function view($user, $post)
    {
        return Gate::any(['root', 'managePrenotazioni'], $user);
    }

    public function create($user)
    {
        return Gate::any(['root', 'managePrenotazioni'], $user);
    }

    public function update($user, $post)
    {
        return Gate::any(['root', 'managePrenotazioni'], $user);
    }

    public function delete($user, $post)
    {
        return Gate::any(['root', 'managePrenotazioni'], $user);
    }

    public function restore($user, $post)
    {
        return Gate::any(['root', 'managePrenotazioni'], $user);
    }

    public function forceDelete($user, $post)
    {
        return $user->can('root', $post);
    }

}
