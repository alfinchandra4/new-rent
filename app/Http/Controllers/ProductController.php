<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index () {
        return view('product.index');
    }

    public function history ($product_id) {
        return view('product.history');
    }

    public function store (Request $request) {
        $request['product_status'] = 1;
        Product::create($request->all());
        return back()->withSuccess('New product created!');
    }

    public function delete ($product_id) {
        Product::find($product_id)->delete();
        return back()->withSuccess('Product deleted!');
    }

    public function update (Request $request, $order_id) {
        Order::find($order_id)->update([
            'note' => $request->note
        ]);
        return back()->withSuccess('Note updated!');
    }


    /////////////////////////////
    public function ajax_search_product(Request $request) {
        if ($request->ajax()) {
            if ($request->search != '') {
                $products = Product::where('product_status', 1)->where('product_name','LIKE','%'.$request->search."%")->get();
                $output = '';
                foreach ($products as $prd) {
                    $url = route('order.addproduct', $prd->product_code);
                    $output .= 
                    '<tr>
                        <td>'.$prd->product_code.'</td>
                        <td>'.$prd->product_name.'</td>
                        <td>1 Unit</td>
                        <td>
                            <a href="'.$url.'" class="btn btn-raised btn-wave btn-icon btn-rounded mb-2 light-green">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>';
                }
            }
            return response($output);
        }
    }

}
