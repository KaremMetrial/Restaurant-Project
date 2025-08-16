<?php

    namespace App\Services\User;

    use App\Models\Slider;
    use App\Models\SectionTitle;
    use App\Models\WhyChooseUs;
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
        public function getSectionTitles()
        {
            return SectionTitle::all()->pluck('value', 'key')->toArray();
        }
        public function getWhyChooseUs()
        {
            return WhyChooseUs::whereStatus(true)->get();
        }
    }
