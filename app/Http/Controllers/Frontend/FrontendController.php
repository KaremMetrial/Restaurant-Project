<?php

    namespace App\Http\Controllers\Frontend;

    use App\Http\Controllers\Controller;
    use Illuminate\Contracts\View\View;

    class FrontendController extends Controller
    {
        /**
         * user dashboard
         * @return View
         */
        public function index(): view
        {
            return view('frontend.home.index');
        }
    }
