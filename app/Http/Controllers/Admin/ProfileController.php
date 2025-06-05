<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Admin\Profile\UpdatePasswordRequest;
    use App\Http\Requests\Admin\Profile\UpdateRequest;
    use App\Services\Admin\ProfileService;
    use Illuminate\Contracts\View\View;
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
         * Show Profile Page
         */
        public function index(): view
        {
            return view('admin.profile.index');
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
