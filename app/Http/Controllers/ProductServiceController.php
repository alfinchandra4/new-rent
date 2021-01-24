<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\WorkingHours;
use Illuminate\Http\Request;

class ProductServiceController extends Controller
{
    public function index ($category_id, $product_id) {
        $workingHours = WorkingHours::where('product_id', $product_id)->orderByDesc('last_services')->limit(10)->get();
        $category = Category::find($category_id);
        return view('services.index', [
            'working_hours' => $workingHours,
            'category_id' => $category->id,
            'product_id'  => $product_id,
        ]);
    }

    public function store (Request $request) {
        WorkingHours::create($request->all());
        return redirect()->back()->withSuccess('Data perawatan berhasil dibuat');
    }

    public function create ($category_id, $product_id) {
        return view('services.create', [
            'category_id' => $category_id,
            'product_id' => $product_id,
        ]);
    }

    public function remove ($working_hours_id) {
        WorkingHours::find($working_hours_id)->delete();
        return redirect()->back()->withSuccess('Data perawatan dihapus');
    }
}
