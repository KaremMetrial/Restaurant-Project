<?php

    namespace Tests\Feature\Admin\SliderController;

    use App\Models\User;
    use Tests\TestCase;

    class IndexTest extends TestCase
    {
        public function test_admin_can_view_sliders_page(): void
        {
            $admin = User::factory()->create([
                'role' => 'admin',
            ]);

            $response = $this->actingAs($admin)
                ->get(route('admin.sliders.index'));

            $response->assertSuccessful();
            $response->assertViewIs('admin.slider.index');
        }

        public function test_guests_cannot_access_sliders_page(): void
        {
            $response = $this->get(route('admin.sliders.index'));

            $response->assertRedirect(route('login'));
        }
    }
