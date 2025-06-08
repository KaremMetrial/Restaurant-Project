<?php

    namespace App\Services\Admin;

    use App\Models\Slider;
    use App\Traits\FileUploadTrait;
    use Exception;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class SliderService
    {
        use FileUploadTrait;

        public function store(Request $request)
        {
            // Get validated data
            $validated = $request->validated();
            $validated['status'] = $request->has('status');

            // Upload file if exists
            if ($request->hasFile('image')) {
                $validated['image'] = $this->upload($request, 'image', 'sliders', 'public');
            }

            $slider = Slider::create($validated);

            return $slider;
        }

        public function update(Request $request, Slider $slider)
        {
            // Get validated data
            $validated = $request->validated();
            $validated['status'] = $request->has('status');

            // Upload file if exists
            if ($request->hasFile('image')) {
                // delete old image first
                if ($slider->image) {
                    $this->delete($slider->image, 'public');
                }

                // Upload new one
                $validated['image'] = $this->upload($request, 'image', 'sliders', 'public');
            }
            $slider->update($validated);

            return $slider->wasChanged();
        }

        public function destory(Slider $slider)
        {
            try {
                DB::beginTransaction();
                if ($slider->image) {
                    $this->delete($slider->image, 'public');
                }
                DB::commit();
                return $slider->delete();
            } catch (Exception $e) {
                DB::rollBack();
                return false;
            }
        }
    }
