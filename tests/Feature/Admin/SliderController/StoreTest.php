<?php

    namespace Tests\Feature\Admin\SliderController;

    use App\Models\Slider;
    use App\Models\User;
    use Illuminate\Http\UploadedFile;
    use Illuminate\Support\Facades\Storage;
    use Tests\TestCase;

    class StoreTest extends TestCase
    {
        private User $admin;

        protected function setUp(): void
        {
            parent::setUp();
            Storage::fake('public');
            $this->admin = User::factory()->create(['role' => 'admin']);
        }

        public function test_admin_can_create_slider()
        {
            $image = UploadedFile::fake()->image('test-slider.jpg', 800, 600);

            $data = [
                'title' => 'Test Slider',
                'sub_title' => 'Test Sub Title',
                'offer' => '20% Off',
                'short_description' => 'Test Description',
                'link' => 'https://example.com',
                'status' => true,
                'image' => $image
            ];

            $response = $this->actingAs($this->admin)
                ->post(route('admin.sliders.store'), $data);

            $response->assertRedirect()
                ->assertSessionHas('success', 'Slider created');

            $slider = Slider::where('title', 'Test Slider')->first();
        }

        public function test_store_validates_required_fields()
        {
            $response = $this->actingAs($this->admin)
                ->post(route('admin.sliders.store'), []);

            $response->assertSessionHasErrors(['title', 'image']);
        }

        public function test_store_validates_image_file()
        {
            $data = [
                'title' => 'Test Slider',
                'image' => 'not-a-real-image'
            ];

            $response = $this->actingAs($this->admin)
                ->post(route('admin.sliders.store'), $data);

            $response->assertSessionHasErrors(['image']);
        }

        public function test_store_validates_image_mime_type()
        {
            $invalidImage = UploadedFile::fake()->create('document.pdf');

            $data = [
                'title' => 'Test Slider',
                'image' => $invalidImage
            ];

            $response = $this->actingAs($this->admin)
                ->post(route('admin.sliders.store'), $data);

            $response->assertSessionHasErrors(['image']);
        }

        public function test_guests_cannot_create_slider()
        {
            $response = $this->post(route('admin.sliders.store'), []);

            $response->assertRedirect(route('login'));
        }
    }
