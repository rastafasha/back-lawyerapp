<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Directory;
use Illuminate\Auth\Access\HandlesAuthorization;

class DirectoryPolicy
{
    use HandlesAuthorization;

     /**
     * Puede ver el lista de divisas
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user) {

        // return $user->role == "ADMIN";

        if ($user->role == "ADMIN") {
            return true;
        } elseif($user->role == "SUPERADMIN") {
            return true;
        } elseif($user->role == "MEMBER") {
            return true;
        } else {
            return false;
        }


    }

    /**
     * Puede crear una nueva
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function directoryStore(User $user) {

        return in_array($user->role, [$user->role == "ADMIN", $user->role == "MEMBER"]);

    }

    /**
     * Puede ver la información
     *
     * @param User $user
     * @param Directory $directory
     * @return \Illuminate\Http\Response
     */
    public function directoryShow(User $user, Directory $directory) {

        if( $user->role == 'ADMIN' ){
            return true;
        } elseif($user->role == "SUPERADMIN") {
            return true;
        }elseif( $user->role == 'MEMBER' ){
            return $user->id == $directory->user_id;
        }else{
            return false;
        }

    }

    /**
     * Puede borrar
     *
     * @param User $user
     * @param Directory $directory
     * @return \Illuminate\Http\Response
     */
    public function directoryDestroy(User $user, Directory $directory) {

        if( $user->role == 'ADMIN' ){
            return true;
        } elseif($user->role == "SUPERADMIN") {
            return true;
        }elseif( $user->role == 'MEMBER' && $user->id == $directory->user_id){
            return true;
        }else{
            return false;
        }

    }

    // public function delete (User $user, Post $post) {
    //     return $user->id == $post->user_id;
    // }

    /**
     * Puede ver regsistros borrados
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function indexDeletes(User $user) {

        return $user->role == "ADMIN";

    }

    /**
     * Puede ver el registro borrado
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function directoryDeleteShow(User $user, Directory $directory) {

        return in_array($user->role, [$user->role == "ADMIN"]);

    }

    /**
     * Puede restaurar el resgistro
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function directoryDeleteRestore(User $user, Directory $directory) {

        return in_array($user->role, [$user->role == "SUPERADMIN"]);

    }

    /**
     * Puede borrar el registro del sistema
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function directoryDeleteForce(User $user, Directory $directory) {

        return in_array($user->role, [$user->role == "SUPERADMIN"]);

    }
}
