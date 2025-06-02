<?php

    namespace Tests\Feature\ProfileController;

    use App\Models\User;
    use Tests\TestCase;

    class IndexTest extends TestCase
    {
        /**
         * A basic feature test example.
         */
        public function test_example(): void
        {
            $admin = User::factory()->create([
                'role' => 'admin'
            ]);
            $response = $this->actingAs($admin)->get(route('admin.profile.index'));

            $response->assertSuccessful();
            $response->assertViewIs('admin.profile.index');
        }
    }
