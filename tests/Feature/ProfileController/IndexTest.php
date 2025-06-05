<?php

namespace Tests\Feature\ProfileController;

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

    public function test_non_admin_users_cannot_access_admin_profile_page(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);
        $response = $this->actingAs($user)->get(route('admin.profile.index'));

        $response->assertForbidden();
    }

    public function test_guests_cannot_access_admin_profile_page(): void
    {
        $response = $this->get(route('admin.profile.index'));
        $response->assertRedirect(route('login'));
    }
}
