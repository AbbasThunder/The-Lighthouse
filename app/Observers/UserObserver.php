<?php

namespace App\Observers;

use App\Jobs\DeleteImage;
use App\User;

class UserObserver
{

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $originalAvatar = $user->getOriginal('avatar');
        if ($originalAvatar !== env('NO_IMAGE_NAME') || $originalAvatar != null)
           DeleteImage::dispatchNow($originalAvatar);
    }

    public function deleting(User $user)
    {
        if ($user->has("products"))
            DeleteImage::dispatchNow($user->products()->pluck('image')->all());
    }
    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $originalAvatar = $user->getOriginal('avatar');
        if ($originalAvatar !== env('NO_IMAGE_NAME') || $originalAvatar != null)
            DeleteImage::dispatchNow($originalAvatar);
    }

}
