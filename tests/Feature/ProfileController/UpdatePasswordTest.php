<?php

    namespace Tests\Feature\ProfileController;

    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use Tests\TestCase;

    class UpdatePasswordTest extends TestCase
    {
        public function test_admin_can_update_password()
        {
            $admin = User::factory()->create([
                'role' => 'admin',
                'password' => bcrypt('oldpassword'),
            ]);

            $response = $this->actingAs($admin)->put(route('admin.profile.update.password'), [
                'current_password' => 'oldpassword',
                'password' => 'newsecurepassword',
                'password_confirmation' => 'newsecurepassword',
            ]);

            $response->assertRedirect();
            $response->assertSessionHas('success', 'Password updated');

            $admin->refresh();
            $this->assertTrue(Hash::check('newsecurepassword', $admin->password));
        }


        public function test_update_password_validation_required_current_password()
        {
            $admin = User::factory()->create([
                'role' => 'admin',
            ]);
            $response = $this->actingAs($admin)->put(route('admin.profile.update.password'), [
                'password' => '123456789',
                'password_confirmation' => '123456789',
            ]);
            $response->assertSessionHasErrors(['current_password']);
        }

        public function test_update_password_validation_current_password_confirmation()
        {
            $admin = User::factory()->create([
                'role' => 'admin',
                'password' => bcrypt('correctpassword'),
            ]);

            $response = $this->actingAs($admin)->put(route('admin.profile.update.password'), [
                'current_password' => 'wrongpassword',
                'password' => 'newpassword',
                'password_confirmation' => 'newpassword',
            ]);

            $response->assertSessionHasErrors(['current_password']);
        }


        public function test_update_password_validation_required_password()
        {
            $admin = User::factory()->create([
                'role' => 'admin',
                'password' => bcrypt('correctpassword'),
            ]);

            $response = $this->actingAs($admin)->put(route('admin.profile.update.password'), [
                'current_password' => 'correctpassword',
                'password_confirmation' => 'newpassword',
            ]);

            $response->assertSessionHasErrors(['password']);
        }

        public function test_update_password_validation_password_confirmation()
        {
            $admin = User::factory()->create([
                'role' => 'admin',
                'password' => bcrypt('correctpassword'),
            ]);

            $response = $this->actingAs($admin)->put(route('admin.profile.update.password'), [
                'current_password' => 'correctpassword',
                'password' => 'newpassword',
                'password_confirmation' => 'wrongconfirmation',
            ]);

            $response->assertSessionHasErrors(['password']);
        }

        public function test_guests_cannot_update_password()
        {
            $response = $this->put(route('admin.profile.update.password'), [
                'current_password' => 'correctpassword',
                'password' => 'newpassword',
                'password_confirmation' => 'wrongconfirmation',
            ]);

            $response->assertRedirect(route('login'));
        }

    }
