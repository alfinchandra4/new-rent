@extends('layouts.app')

@section('page-title', 'Pesanan detail')
@section('content-title', 'Detail pesanan')

@section('path')
    <a href="{{ route('order.ongoing') }}" /> Pesanan berlangsung</a>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>Detail pesanan</span>
@endsection

@section('css-top')
@endsection

@section('content')
    <div class="row">
        <div class="col-3">
            <ul class="list-group">
                <li class="list-group-item"><span style="font-size: 10pt">Customer:</span>
                    <div class="font-weight-bold">{{ $order->name }}</div>
                </li>
                <li class="list-group-item"><span style="font-size: 10pt">Phone:</span>
                    <div class="font-weight-bold">{{ $order->phone }}</div>
                </li>
                <li class="list-group-item"><span style="font-size: 10pt">Address:</span>
                    <div class="font-weight-bold">{{ $order->shipping_address }}</div>
                </li>
                <li class="list-group-item"><span style="font-size: 10pt">Company:</span>
                    <div class="font-weight-bold">{{ $order->company }}</div>
                </li>
            </ul>
            @php
            $allOrder = App\Models\OrderDetail::where('order_id', $order->id)->where('detail_status', '!=', 3)->get();
            @endphp
            <a href="{{ route('order.aborting', $order->id) }}"
                class="btn btn-danger mt-2 btn-block {{ empty($allOrder) ? '' : 'disabled' }}"
                onclick="return confirm('Hapus pesanan?')">
                <i class="fa fa-ban" aria-hidden="true"></i> &nbsp; Batalkan pesanan</a>
        </div>
        <div class="col-9">
            <div class="card b-t-2x b-t-primary">
                <div class="card-header">Detail alat</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead class="bg-primary">
                            <tr>
                                {{-- <th style="width: 150px">Code</th>
                                --}}
                                <th style="width: 200px">Product</th>
                                <th style="width: 100px">Begin date</th>
                                <th style="width: 100px">End date</th>
                                <th style="width: 200px">Status</th>
                                <th>Pembayaran</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $key => $item)
                                <tr>
                                    <td>
                                        {{ App\Models\Product::where('product_code', $item->product_code)->first()->product_name }}
                                    </td>
                                    <td>{{ date('d/m/y', strtotime($item->date_start)) }}</td>
                                    <td>{{ !$item->date_end ? '-' : date('d/m/y', strtotime($item->date_end)) }}</td>
                                    <td>
                                        @switch($item->detail_status)
                                            @case(1)
                                            <span class="badge badge-warning text-uppercase">
                                                Dalam pengiriman
                                            </span>
                                            @break
                                            @case(2)
                                            <span class="badge badge-danger text-uppercase">
                                                Sedang digunakan
                                            </span>
                                            @break
                                            @case(3)
                                            <span class="badge badge-success text-uppercase">
                                                Selesai digunakan
                                            </span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        @switch($item->paid)
                                            @case(1)
                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                            Lunas
                                            @break
                                            @case(0)
                                            <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                                            Belum lunas
                                            @break
                                            @default

                                        @endswitch
                                    </td>
                                    <td data-item_id={{ $item->id }}>
                                        <div>
                                            {{-- 1 on the way, 2 on waorking, 3 returned
                                            --}}
                                            <div class="item-action dropdown">
                                                <a href="#" data-toggle="dropdown" class="text-muted" aria-expanded="false">
                                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right bg-black" role="menu"
                                                    x-placement="bottom-end"
                                                    style="position: absolute; transform: translate3d(16px, 18px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    @if ($item->detail_status == 1)
                                                        <a class="dropdown-item"
                                                            href="{{ route('order.ongoing.onworking', $item->id) }}">
                                                            Sedang digunakan
                                                        </a>
                                                    @endif
                                                    @if (in_array($item->detail_status, [2]))
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#modal-animate" data-toggle-class="fade-up"
                                                            data-toggle-class-target=".animate" href="#">
                                                            Selesai
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                    @endif
                                                    <a class="dropdown-item"
                                                        href="{{ route('order.ongoing.paid', $item->id) }}">
                                                        Lunas
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('order.ongoing.unpaid', $item->id) }}">
                                                        Belum lunas
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <span class="font-weight-bold">Catatan:</span>
            <form class="form-inline" role="form" method="POST" action="{{ route('product.update', $order->id) }}">
                @csrf
                <input type="text" class="form-control mb-2 mr-sm-2 col-10" value="{{ $order->note }}" name="note">
                <button type="submit" class="btn btn-primary mb-2">Update</button>
            </form>
        </div>
    </div>
@endsection

@section('js-bottom')
    <script>
        let tbody = document.querySelector("table > tbody");
        for (let index = 0; index < tbody.children.length; index++) {
            tbody.children[index].cells[5].addEventListener('click', function() {
                let order_detail_id = this.dataset.item_id;
                document.getElementById('returnedFrm').action = "{{ route('order.ongoing.returned') }}"
                document.getElementById('order_detail_id').value = order_detail_id;
            });

        }

    </script>
@endsection

@section('modal')
    <div id="modal-animate" class="modal fade" data-backdrop="true">
        <div class="modal-dialog animate">
            <div class="modal-content ">
                <div class="modal-header ">
                    <div class="modal-title text-md">Form selesai alat</div>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tanggal selesai</label>
                        <div class="col-sm-8">
                            <form method="post" action="{{ route('order.ongoing.returned') }}" id="returnedFrm">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <input type="hidden" name="order_detail_id" id="order_detail_id">
                                <input type="date" class="form-control" name="date_end">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="returnedFrm">Selesaikan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
@endsection
