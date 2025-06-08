<?php

    namespace Tests\Feature\Admin\SliderController;

    use App\Models\Slider;
    use App\Models\User;
    use Tests\TestCase;

    class DestroyTest extends TestCase
    {
        public function test_admin_can_delete_slider()
        {
            $admin = User::factory()->create([
                'role' => 'admin',
            ]);

            $slider = Slider::factory()->create();

            $response = $this->actingAs($admin)
                ->delete(route('admin.sliders.destroy', $slider));

            $response->assertJson([
                'status' => 'success',
                'message' => 'Slider deleted'
            ]);

            $this->assertDatabaseMissing('sliders', [
                'id' => $slider->id
            ]);
        }

        public function test_guests_cannot_delete_slider()
        {
            $slider = Slider::factory()->create();

            $response = $this->delete(route('admin.sliders.destroy', $slider));

            $response->assertRedirect(route('login'));
        }
    }
