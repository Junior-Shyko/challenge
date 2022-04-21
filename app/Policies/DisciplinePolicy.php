<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Profile;
use App\Models\Discipline;
use Illuminate\Auth\Access\HandlesAuthorization;

class DisciplinePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Discipline $discipline)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Discipline $discipline)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Discipline $discipline)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Discipline $discipline)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Discipline $discipline)
    {
        //
    }

    /**
     * Verificação para saber se o usuario tem acesso a tudo
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function is_saasAdmin(User $user) {
        $profile = Profile::where('name', 'saasAdmin')->get();
        return $profile[0]->id === $user->profile_id;
    }
}
