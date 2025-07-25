<?php

    namespace Feature\Admin\ProfileController;

    use App\Models\User;
    use Tests\TestCase;

    class UpdateTest extends TestCase
    {
        /**
         * A basic feature test example.
         */
        public function test_admin_can_update_their_profile()
        {
            $admin = User::factory()->create([
                'role' => 'admin',
                'name' => 'Original Name',
                'email' => 'original12222@example.com',
            ]);

            $newData = [
                'name' => 'Updated Name',
                'email' => 'updated12222@example.com',
            ];

            $response = $this->actingAs($admin)
                ->put(route('admin.profile.update'), $newData);

            $this->assertDatabaseHas('users', [
                'id' => $admin->id,
                'name' => 'Updated Name',
                'email' => 'updated12222@example.com',
            ]);
            $response->assertRedirect();
            $response->assertSessionHas('success', 'Profile updated');
        }

        public function test_update_validates_required_fields(): void
        {
            $admin = User::factory()->create([
                'role' => 'admin',
            ]);
            $response = $this->actingAs($admin)->put(route('admin.profile.update'), [
                'name' => 'Updated Name',
                'email' => 'invalid-email',
            ]);
            $response->assertSessionHasErrors(['email']);
        }

        public function test_guests_cannot_update_profile()
        {
            $response = $this->put(route('admin.profile.update'), [
                'name' => 'Guest Test',
                'email' => 'guest@test.com',
            ]);

            $response->assertRedirect(route('login'));
        }
    }
