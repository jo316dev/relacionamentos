<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class DashboardController extends Controller
{
    protected $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function index()
    {
        $brands = $this->brand->all();

        return view('admin.dashboard.index', compact('brands'));
    }
}
