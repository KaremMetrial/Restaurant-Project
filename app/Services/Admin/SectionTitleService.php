<?php

    namespace App\Services\Admin;

    use App\Models\SectionTitle;
    use Illuminate\Http\Request;

    class SectionTitleService
    {
        public function get(array $keys): array
        {
            return SectionTitle::whereIn('key', $keys)->pluck('value', 'key')->toArray();
        }

        public function update(array $data): void
        {
            foreach ($data as $key => $value) {
                SectionTitle::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
        }
    }
