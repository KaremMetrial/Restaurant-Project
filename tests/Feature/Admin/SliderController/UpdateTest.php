<?php

    namespace Tests\Feature\Admin\SliderController;

    use App\Models\Slider;
    use App\Models\User;
    use Illuminate\Http\UploadedFile;
    use Illuminate\Support\Facades\Storage;
    use Tests\TestCase;

    class UpdateTest extends TestCase
    {
        public function test_admin_can_update_slider()
        {
            Storage::fake('public');

            $admin = User::factory()->create([
                'role' => 'admin',
            ]);

            $slider = Slider::factory()->create([
                'title' => 'Original Title',
            ]);

            $data = [
                'title' => 'Updated Title',
                'sub_title' => 'Updated Sub Title',
                'offer' => 'New Offer',
                'short_description' => 'Updated Description',
                'button_text' => 'Click Here',
                'button_link' => 'https://updated.com',
                'status' => true,
                'image' => UploadedFile::fake()->image('new-slider.jpg')
            ];

            $response = $this->actingAs($admin)
                ->put(route('admin.sliders.update', $slider), $data);

            $response->assertRedirect();
            $response->assertSessionHas('success', 'Slider updated');

            $this->assertDatabaseHas('sliders', [
                'id' => $slider->id,
                'title' => 'Updated Title',
            ]);
        }

        public function test_update_validates_required_fields()
        {
            $admin = User::factory()->create([
                'role' => 'admin',
            ]);

            $slider = Slider::factory()->create();

            $response = $this->actingAs($admin)
                ->put(route('admin.sliders.update', $slider), []);

            $response->assertRedirect();
        }

        public function test_guests_cannot_update_slider()
        {
            $slider = Slider::factory()->create();

            $response = $this->put(route('admin.sliders.update', $slider), []);

            $response->assertRedirect(route('login'));
        }
    }
