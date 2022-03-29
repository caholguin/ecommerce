<?php

namespace App\Policies;

use App\Models\Orden;
use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class OrdenPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Orden $orden)
    {
        if ($orden->user_id == $user->id) {
            return true;
        }else{
            return false;
        }
    }

    public function payment(User $user, Orden $orden)
    {
        if ($orden->estado == 2) {
            return false;
        }else{
            return true;
        }
    }
}
