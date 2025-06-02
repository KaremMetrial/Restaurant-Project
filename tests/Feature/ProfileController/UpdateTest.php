<?php

    namespace Tests\Feature\ProfileController;

    use App\Models\User;
    use Tests\TestCase;

    class UpdateTest extends TestCase
    {
        /**
         * A basic feature test example.
         */
        public function test_example(): void
        {
            $admin = User::factory()->create([
                'role' => 'admin'
            ]);
            $newData = [
                'name' => 'Updated Name',
                'email' => 'updated@example.com',
            ];

            $response = $this->actingAs($admin)
                ->put(route('admin.profile.update'), $newData);

            $this->assertDatabaseHas('users', [
                'id' => $admin->id,
                'name' => 'Updated Name',
                'email' => 'updated@example.com',
            ]);
            $response->assertRedirect();
            $response->assertSessionHas('success', 'profile updated');
        }
    }
