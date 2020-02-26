<?php

namespace App\Policies;

use App\Bills;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BillPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any bills.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the bills.
     *
     * @param  \App\User  $user
     * @param  \App\Bills  $bills
     * @return mixed
     */
    public function view(User $user, Bills $bills)
    {
        //
    }

    /**
     * Determine whether the user can create bills.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the bills.
     *
     * @param  \App\User  $user
     * @param  \App\Bills  $bills
     * @return mixed
     */
    public function update(User $user, Bills $bills)
    {
        //
    }

    /**
     * Determine whether the user can delete the bills.
     *
     * @param  \App\User  $user
     * @param  \App\Bills  $bills
     * @return mixed
     */
    public function delete(User $user, Bills $bills)
    {
        //
    }

    /**
     * Determine whether the user can restore the bills.
     *
     * @param  \App\User  $user
     * @param  \App\Bills  $bills
     * @return mixed
     */
    public function restore(User $user, Bills $bills)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the bills.
     *
     * @param  \App\User  $user
     * @param  \App\Bills  $bills
     * @return mixed
     */
    public function forceDelete(User $user, Bills $bills)
    {
        //
    }
}
