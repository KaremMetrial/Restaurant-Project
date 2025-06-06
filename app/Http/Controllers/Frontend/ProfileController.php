<?php

    namespace App\Http\Controllers\Frontend;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\User\Profile\UpdatePasswordRequest;
    use App\Http\Requests\User\Profile\UpdateRequest;
    use App\Services\User\ProfileService;
    use Illuminate\Http\RedirectResponse;

    class ProfileController extends Controller
    {
        protected ProfileService $profileService;

        /**
         * @param ProfileService $profileService
         * inject ProfileService
         */
        public function __construct(ProfileService $profileService)
        {
            $this->profileService = $profileService;
        }

        /**
         * Update Profile Data
         *
         * @param UpdateRequest $request validated data
         */
        public function update(UpdateRequest $request): RedirectResponse
        {
            // update data and check changes
            $updated = $this->profileService->updateProfile($request);

            // return back with message
            return redirect()->back()->with(
                $updated ? 'success' : 'warning',
                $updated ? 'Profile updated' : 'No changes detected'
            );
        }

        /**
         * Updata Profile Password
         * @param UpdatePasswordRequest $request
         * @return RedirectResponse
         */
        public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
        {
            // update data and check changes
            $updated = $this->profileService->updateProfile($request);

            // return back with message
            return redirect()->back()->with(
                $updated ? 'success' : 'warning',
                $updated ? 'Password updated' : 'No changes detected'
            );
        }
    }
