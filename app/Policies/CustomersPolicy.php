<?php

namespace App\Policies;

use App\User;
use App\Customers;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the customers.
     *
     * @param  \App\User  $user
     * @param  \App\Customers  $customers
     * @return mixed
     */
    public function view(User $user, Customers $customers)
    {
        return in_array(
            $user->email,
            [
                'pascal.dls@gmail.com',
                'test@test.com'
            ]
        );
    }

    /**
     * Determine whether the user can create customers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array(
            $user->email,
            [
                'pascal.dls@gmail.com',
                'test@test.com'
            ]
        );
    }

    /**
     * Determine whether the user can update the customers.
     *
     * @param  \App\User  $user
     * @param  \App\Customers  $customers
     * @return mixed
     */
    public function update(User $user, Customers $customers)
    {
        //
    }

    /**
     * Determine whether the user can delete the customers.
     *
     * @param  \App\User  $user
     * @param  \App\Customers  $customers
     * @return mixed
     */
    public function delete(User $user, Customers $customers)
    {
        //
    }

    /**
     * Determine whether the user can restore the customers.
     *
     * @param  \App\User  $user
     * @param  \App\Customers  $customers
     * @return mixed
     */
    public function restore(User $user, Customers $customers)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the customers.
     *
     * @param  \App\User  $user
     * @param  \App\Customers  $customers
     * @return mixed
     */
    public function forceDelete(User $user, Customers $customers)
    {
        //
    }
}
