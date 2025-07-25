<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\WhyChooseUsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function index(WhyChooseUsDataTable $dataTable){
        return $dataTable->render('admin.why-choose-us.index');
    }
}
