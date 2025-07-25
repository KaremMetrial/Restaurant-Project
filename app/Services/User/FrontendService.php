<?php

    namespace App\Services\User;

    use App\Models\Slider;
    use Illuminate\Database\Eloquent\Collection;

    class FrontendService
    {
        /**
         * Get all sliders.
         * @return Collection
         */
        public function getSliders()
        {
            return Slider::active()->get();
        }
    }
