<?php

    namespace App\Services\Admin;

    use Illuminate\Http\Request;
    use App\Models\WhyChooseUs;
    use App\Services\Admin\SectionTitleService;
    use Illuminate\Http\RedirectResponse;

    class WhyChooseUsService
    {
        protected SectionTitleService $sectionTitleService;

        public function __construct(SectionTitleService $sectionTitleService)
        {
            $this->sectionTitleService = $sectionTitleService;
        }

        public function get(): array
        {
            $keys = [
                'why_choose_us_top_title',
                'why_choose_us_main_title',
                'why_choose_us_sub_title'
            ];

            return $this->sectionTitleService->get($keys);
        }

        public function updateTitle(Request $request)
        {
            $validated = $request->validate([
                'why_choose_us_top_title' => 'required',
                'why_choose_us_main_title' => 'required',
                'why_choose_us_sub_title' => 'required',
            ]);

            $this->sectionTitleService->update($validated);
            return back()->with('success', 'Section titles updated successfully.');
        }

        public function store(Request $request): RedirectResponse
        {
            $validated = $request->validated();
            $validated['status'] = $request->has('status');

            $whyChooseUs = WhyChooseUs::create($validated);

            return $whyChooseUs ? redirect()->route('admin.why-choose-us.index')->with('success', 'Why Choose Us created successfully.') : redirect()->back()->with('error', 'Failed to create Why Choose Us.');
        }
        public function update(Request $request, $id): RedirectResponse
        {
            $validated = $request->validated();
            $validated['status'] = $request->has('status');

            $whyChooseUs = WhyChooseUs::findOrFail($id);

            $validated['icon'] = $request->icon ?? $whyChooseUs->icon;

            $whyChooseUs->update($validated);

            return $whyChooseUs ? redirect()->route('admin.why-choose-us.index')->with('success', 'Why Choose Us updated successfully.') : redirect()->back()->with('error', 'Failed to update Why Choose Us.');
        }
        public function delete($id)
        {
            $whyChooseUs = WhyChooseUs::findOrFail($id);

            return $whyChooseUs->delete();
        }
    }
