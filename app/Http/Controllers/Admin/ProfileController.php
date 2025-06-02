<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Admin\Profile\UpdateRequest;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;

    class ProfileController extends Controller
    {
        /**
         * Show Profile Page
         * @return view
         */
        public function index(): view
        {
            return view('admin.profile.index');
        }

        /**
         * Update Profile Data
         * @param UpdateRequest $request validated data
         * @return RedirectResponse
         */
        public function update(UpdateRequest $request): RedirectResponse
        {
            // validation data
            $validated = $request->validated();

            // get user instance first
            $user = auth()->user();

            // update data and check changes
            $user->update($validated);

            // check if user was updated
            if (!$user->wasChanged()) {
                // return back with message
                return redirect()->back()->with('warning', 'No changes detected');
            }

            // return back with message
            return redirect()->back()->with('success', 'profile updated');
        }
    }
