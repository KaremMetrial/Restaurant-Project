<?php

    namespace App\Services\Admin;

    use Illuminate\Contracts\Auth\Authenticatable;

    class ProfileService
    {
        public function updateProfile(Authenticatable $user, array $data): bool
        {
            $user->update($data);

            return $user->wasChanged();
        }
    }
