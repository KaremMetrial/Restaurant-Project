<?php

    namespace App\Services\User;

    use App\Traits\FileUploadTrait;
    use Illuminate\Http\Request;

    class ProfileService
    {
        use FileUploadTrait;

        public function updateProfile(Request $request): bool
        {
            // Get validated data
            $validated = $request->validated();

            // Get user
            $user = auth()->user();

            // Upload file if exists
            if ($request->hasFile('avatar')) {
                // delete old avatar first
                if ($user->avatar) {
                    $this->delete($user->avatar, 'public');
                }

                // Upload new one
                $validated['avatar'] = $this->upload($request, 'avatar', 'users/avatar', 'public');
            }

            $user->update($validated);

            return $user->wasChanged();
        }
    }
