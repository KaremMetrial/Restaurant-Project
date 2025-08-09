<?php

    namespace Database\Seeders;

    use App\Models\SectionTitle;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\WhyChooseUs;

    class WhyChooseUsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $sectionTitle = [
                [
                    'key' => 'why_choose_us_top_title',
                    'value' => 'Why Choose Us'
                ],
                [
                    'key' => 'why_choose_us_main_title',
                    'value' => 'Why Choose Us'
                ],
                [
                    'key' => 'why_choose_us_sub_title',
                    'value' => 'lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua'
                ]
            ];

            foreach ($sectionTitle as $section) {
                SectionTitle::updateOrCreate($section);
            }

            WhyChooseUs::factory()->count(4)->create();
        }
    }
