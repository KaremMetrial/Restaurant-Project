<?php

    namespace App\Http\Controllers\Admin;

    use App\DataTables\SlidersDataTable;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\Admin\Slider\StoreRequest;
    use App\Http\Requests\Admin\Slider\UpdateRequest;
    use App\Models\Slider;
    use App\Services\Admin\SliderService;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\RedirectResponse;

    class SliderController extends Controller
    {
        protected SliderService $sliderService;

        /**
         * @param SliderService $sliderService
         * inject ProfileService
         */
        public function __construct(SliderService $sliderService)
        {
            $this->sliderService = $sliderService;
        }

        /**
         * Display a listing of the resource.
         */
        public function index(SlidersDataTable $dataTable)
        {
            return $dataTable->render('admin.slider.index');
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create(): View
        {
            return view('admin.slider.create');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(StoreRequest $request): redirectResponse
        {
            // store data
            $this->sliderService->store($request);

            // return back with message
            return redirect()->back()->with('success', 'Slider created');
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Slider $slider): View
        {
            return view('admin.slider.edit', compact('slider'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(UpdateRequest $request, Slider $slider): redirectResponse
        {
            // update data
            $updated = $this->sliderService->update($request, $slider);

            // return back with message
            return redirect()->back()->with(
                $updated ? 'success' : 'warning',
                $updated ? 'Slider updated' : 'No changes detected'
            );
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Slider $slider): jsonResponse
        {
            // delete data
            $deleted = $this->sliderService->destory($slider);

            // return json response
            return response()->json(
                $deleted ? [
                    'status' => 'success',
                    'message' => 'Slider deleted',
                ] : [
                    'status' => 'warning',
                    'message' => 'Slider not deleted'
                ]
            );
        }
    }
