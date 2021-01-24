@extends('layouts.app')

@section('page-title', 'Daftar pesanan aktif')
@section('content-title', 'Daftar pesanan aktif')

@section('path')
    {{-- <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    --}}
    {{-- <span>Pilih alat</span> --}}

@endsection


@section('js-bottom')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#example_filter').css("float", "right");
        });

    </script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Pesanan berlangsung
            <span class="float-right">
                <a href="{{ route('order.ongoing.comingsoon') }}">Jadwal pesanan besok</a>
            </span>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead class="bg-primary">
                    <tr>
                        <th>#</th>
                        <th>Rent date</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th colspan="">Address</th>
                        <Th></Th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $activeOrders = App\Models\Order::where('order_status', 1)
                    ->get();
                    @endphp
                    @foreach ($activeOrders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @php
                            $details = App\Models\OrderDetail::where('order_id', $order->id)->first();
                            @endphp
                            <td>{{ date('d/m/y', strtotime($details->date_start)) }}</td>
                            <td>
                                @foreach ($order->orderdetail as $item)
                                    @if (in_array($item->detail_status, [1, 2]))
                                        {{ App\Models\Product::where('product_code', $item->product_code)->first()->product_name }}
                                        </br>
                                    @endif
                                @endforeach
                            </td>

                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td style="width: 250px">{{ Str::words($order->shipping_address, 7, '...') }}
                            </td>
                            <td class="float-right">
                                <a href="{{ route('order.ongoing.detail', $order->id) }}"
                                    class="btn w-sm mb-1 btn-outline-info">
                                    INV-{{ $order->order_code }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('btn')

@endsection
