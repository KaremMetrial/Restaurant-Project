<?php

    namespace Feature\Admin\ProfileController;

    use App\Models\User;
    use Tests\TestCase;

    class IndexTest extends TestCase
    {
        /**
         * A basic feature test example.
         */
        public function test_admin_can_view_profile_page(): void
        {
            $admin = User::factory()->create([
                'role' => 'admin',
            ]);
            $response = $this->actingAs($admin)->get(route('admin.profile.index'));

            $response->assertSuccessful();
            $response->assertViewIs('admin.profile.index');
        }

        public function test_guests_cannot_access_admin_profile_page(): void
        {
            $response = $this->get(route('admin.profile.index'));
            $response->assertRedirect(route('login'));
        }
    }
