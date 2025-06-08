<?php

    namespace App\Http\Controllers\Frontend;

    use App\Http\Controllers\Controller;
    use App\Services\User\FrontendService;
    use Illuminate\Contracts\View\View;

    class FrontendController extends Controller
    {
        /**
         * @var FrontendService
         */
        private FrontendService $frontendService;

        /**
         * FrontendController constructor.
         *
         * @param FrontendService $frontendService
         */
        public function __construct(FrontendService $frontendService)
        {
            $this->frontendService = $frontendService;
        }

        /**
         * Display the homepage with sliders
         *
         * @return View
         */
        public function index(): View
        {
            return view('frontend.home.index', [
                'sliders' => $this->frontendService->getSliders()
            ]);
        }

    }
