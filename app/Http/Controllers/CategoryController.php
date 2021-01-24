<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\WorkingHours;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function index () {
        $dt = Carbon::now();
        // dd($a->startOfWeek()->format('d/m/y'), $a->endOfWeek()->format('d/m/Y'), );
        $currentWeek = $dt->weekOfYear;
        $categories = Category::all();
        $data = [];
        // dd($currentWeek);
        foreach ($categories as $key_category => $category) {
            $id = $category->id;
            $products = Product::where('category_id', $id)->select('product_code')->get()->toArray();
            $labels = [];
            $count  = [];
            for ($i = 0; $i <= $currentWeek; $i++) { 
                $a = $dt->setISODate(date('Y'), $i);
                $startOfWeek = $a->startOfWeek()->format('Y-m-d');
                $endOfWeek   = $a->endOfWeek()->format('Y-m-d');
                $orderDetails = OrderDetail::whereIn('product_code', $products)->whereBetween('date_start', [$startOfWeek, $endOfWeek])->get()->count();
                $dateStartFormat = date("d M", strtotime($startOfWeek));
                $dateEndFormat   = date("d M", strtotime($endOfWeek));
                $labels [] = $dateStartFormat." - ".$dateEndFormat;
                $count [] = $orderDetails;
            }
            $data [] =
                [
                    'category_id' => $id,
                    'labels' => ($labels),
                    'count'  => ($count),
                    'name'   => $category->cat_name
                ];
        }
        return view('category.index', [
            'data' => json_encode($data)
        ]);
    }

    public function month($month) {
        $year = Carbon::now()->year;
        $date = Carbon::createFromDate($year,$month);
        $numberOfWeeks = floor($date->daysInMonth / Carbon::DAYS_PER_WEEK);
        $start = [];
        $end = [];
        $j=1;
        for ($i=1; $i <= $date->daysInMonth ; $i++) {
            Carbon::createFromDate($year,$month,$i); 
            $start['Week: '.$j.' Start Date']= (array)Carbon::createFromDate($year,$month,$i)->startOfWeek()->toDateString();
            $end['Week: '.$j.' End Date']= (array)Carbon::createFromDate($year,$month,$i)->endOfweek()->toDateString();
            $i+=7;
            $j++; 
        }
        $result = array_merge($start,$end);
        $result['numberOfWeeks'] = ["$numberOfWeeks"];
        return $result;
    }

    public function products ($category_id) {
        $products = Product::where('category_id', $category_id)->get();
        $a = [];
        foreach ($products as $key => $item) {
            $workingItem = WorkingHours::where('product_id', $item->id)->latest()->first();
            if (! isset($workingItem)) {
                $orderDetails = OrderDetail::where('product_code', $item->product_code)->sum('working_hours');
            } else {
                $last_service_date = $workingItem->last_services;
                $orderDetails = OrderDetail::where('product_code', $item->product_code)->where('date_start', '>', $last_service_date)->sum('working_hours');
                // dd($orderDetails);
            }
        }
        // dd($a);
        return view('category.products', [
            'products' => $products,
            'category_id' => $category_id,
        ]);
    }

}
