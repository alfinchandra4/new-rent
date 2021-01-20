<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderSchedule;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class OrderController extends Controller
{
    public function create() {
        return view('order.create');
    }
    
    public function customer() {
        return view('order.customer');
    }

    public function store(Request $request) {
        $request['order_status'] = 1;
        $request['user_id'] = auth()->user()->id;
        $request['order_code'] = time();
        $input = $request->except('date_start');
        $order = Order::create($input);
        if ($order) {
            $lastOrder = Order::where('user_id', Auth::user()->id)->latest()->first();
            $products = session()->get('cart');
            $arrProductCode = [];
            foreach ($products as $key => $value) {
                OrderDetail::create([
                    'order_id' => $lastOrder->id,
                    'product_code' => $value['product_code'],
                    'date_start' => $request->date_start,
                    'detail_status' => 1,
                    'paid' => 0,
                ]);
                $arrProductCode [] = $value['product_code'];
            }
        }
        Product::whereIn('product_code', $arrProductCode)->update(['product_status' => 0]);
        session()->put('cart', []);
        return redirect()->route('order.ongoing')->withSuccess('Berhasil menambah pesanan');
    }

    public function ongoing() {
        return view('order.ongoing');
    }

    public function detail($order_id) {
        $order   = Order::find($order_id);
        $details = OrderDetail::where('order_id', $order_id)->get();
        return view('order.ongoing_detail', [
            'details' => $details,
            'order'   => $order,
        ]);
    }

    public function rmproduct($product_code) {
        $current_cart = session()->get('cart');
        foreach ($current_cart as $key => $value) {
            if ($value['product_code'] == $product_code) {
                unset($current_cart[$key]);
            }
        }
        session()->put('cart', $current_cart);
        return back();
    }

    public function addproduct($product_code) {
        $current_cart = session()->get('cart');
        if ($current_cart != null) {
            foreach ($current_cart as $value) {
                if ($value['product_code'] == $product_code) return back();
            }
        }
        
        $product = Product::where('product_code', $product_code)->first();
        $add_to_cart = [
            'product_code' => $product_code,
            'product_name' => $product->product_name
        ];
        $current_cart [] = $add_to_cart;
        session()->put('cart', $current_cart);
        return back();
    }

    public function onworking ($order_detail_id) {
        DB::table('order_details')->updateOrInsert(
            [
                'id' => $order_detail_id
            ],[
                'detail_status' => 2,
                'date_end' => null
            ]
        );
        return back()->withSuccess('Alat digunakan!');
    }

    public function returned (Request $request) {
        $data = OrderDetail::find($request->order_detail_id);
        $data->detail_status = 3;
        $data->date_end = $request->date_end;
        $data->update();

        $product_code = $data->product_code;

        // set product available
        Product::where('product_code', $product_code)->update(['product_status' => 1]);

        // set order id complete where order details is 
        $order_details = OrderDetail::where('order_id', $request->order_id)->get();
        $complete_order = true;
        foreach ($order_details as $key => $value) {
            if ($value['detail_status'] != 3) {
                $complete_order = false;
            }
        }
        if ($complete_order)  Order::find($request->order_id)->update(['order_status' => 2]); 
        
        return back()->withSuccess('Alat dikembalikan!');
    }

    public function paid($order_detail_id) {
        OrderDetail::find($order_detail_id)->update(['paid' => 1]);
        return back()->withSuccess('Pembayaran lunas');
    }

    public function unpaid ($order_detail_id) {
        OrderDetail::find($order_detail_id)->update(['paid' => 0]);
        return back()->withSuccess('pembayaran tidak terkonfirmasi');
    }

    public function aborting ($order_id) {
        $order_details = OrderDetail::where('order_id', $order_id)->get()->toArray();
        $product_code = [];
        foreach ($order_details as $key => $value) {
            $product_code [] = [ $value['product_code'] ];
        }
        $items = Product::whereIn('product_code', $product_code)->update(['product_status' => 1]);
        $order = Order::find($order_id)->delete();
        return redirect()->route('order.ongoing')->withSuccess('Berhasil hapus pesanan');
    }

    public function comingsoon() {
        return view('order.comingsoon');
    }

    public function scheduling (Request $request) {
        $request['confirm'] = 0;
        OrderSchedule::create($request->all());
        return back()->withSuccess('Penjadwalan alat dibuat');
    }

    public function scheduling_confirm ($order_schedule_id) {
        OrderSchedule::find($order_schedule_id)->update(['confirm' => 1]);
        return back()->withSuccess('Penjadwalan diterima');
    }

    public function scheduling_cancel ($order_schedule_id) {
        OrderSchedule::find($order_schedule_id)->delete();
        return back()->withSuccess('Penjadwalan dibatalkan');
    }

    public function completed () {
        return view('order.completed');
    }
}
