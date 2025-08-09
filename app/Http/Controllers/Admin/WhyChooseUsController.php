<?php

    namespace App\Http\Controllers\Admin;

    use App\DataTables\WhyChooseUsDataTable;
    use App\Http\Controllers\Controller;
    use App\Services\Admin\WhyChooseUsService;
    use Illuminate\Http\Request;
    use App\Http\Requests\Admin\WhyChooseUs\StoreRequest;
    use App\Http\Requests\Admin\WhyChooseUs\UpdateRequest;
    use App\Models\WhyChooseUs;

    class WhyChooseUsController extends Controller
    {
        protected WhyChooseUsService $whyChooseUsService;

        public function __construct(WhyChooseUsService $whyChooseUsService)
        {
            $this->whyChooseUsService = $whyChooseUsService;
        }

        public function index(WhyChooseUsDataTable $dataTable)
        {
            $sectionTitle = $this->whyChooseUsService->get();
            return $dataTable->render('admin.why-choose-us.index', compact('sectionTitle'));
        }

        public function updateTitle(Request $request)
        {
            return $this->whyChooseUsService->updateTitle($request);
        }

        public function create()
        {
            return view('admin.why-choose-us.create');
        }

        public function store(StoreRequest $request)
        {
            return $this->whyChooseUsService->store($request);
        }

        public function edit($id)
        {
            $whyChooseUs = WhyChooseUs::findOrFail($id);
            return view('admin.why-choose-us.edit', compact('whyChooseUs'));
        }

        public function update(UpdateRequest $request, $id)
        {
            return $this->whyChooseUsService->update($request, $id);
        }

        public function destroy($id)
        {
            $delete = $this->whyChooseUsService->delete($id);
            return response()->json(
                $delete ? [
                    'status' => 'success',
                    'message' => 'Why Choose Us deleted',
                ] : [
                    'status' => 'warning',
                    'message' => 'Why Choose Us not deleted'
                ]
            );
        }
    }
