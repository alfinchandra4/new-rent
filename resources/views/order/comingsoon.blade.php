@extends('layouts.app')

@section('page-title', 'Coming soon orders')
@section('content-title', 'Daftar pesanan yang akan datang')

@section('path')
    <a href="{{ route('order.ongoing') }}" /> Pesanan berlangsung</a>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>Yang akan datang</span>
@endsection

@section('js-bottom')
@endsection

@section('btn')
    <button type="button" class="btn btn-raised btn-wave mb-2 w-xs bg-primary" data-toggle="modal" data-target="#modal">
        Buat jadwal
    </button>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Pesanan yang akan datang
        </div>
        <div class="card-body">
            <table class="table table-striped" style="width:100%">
                <thead class="bg-primary">
                    <tr>
                        <th>#</th>
                        <th>Tgl kirim</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <Th>Confirm*</Th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $schedules = App\Models\OrderSchedule::orderByDesc('created_at')->paginate(50);
                    @endphp
                    @foreach ($schedules as $item)
                        <tr class={{ $item->confirm == 1 ? 'bg-success' : '' }}>
                            <td>{{ ($schedules->currentpage() - 1) * $schedules->perpage() + $loop->index + 1 }}</td>
                            <td>{{ $item->order_date }}</td>
                            <td>{{ $item->category->cat_name }}</td>
                            <td>{{ $item->customer }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ Str::words($item->shipping_address, 7, '...') }}</td>
                            <td>
                                <a href="{{ route('order.scheduling.confirm', $item->id) }}"
                                    class="btn btn-raised btn-wave btn-icon btn-rounded mb-2 light-green">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-check">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </a>
                                <a href="{{ route('order.scheduling.cancel', $item->id) }}"
                                    class="btn btn-raised btn-wave btn-icon btn-rounded mb-2 red">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $schedules->links() }}
        </div>
    </div>
@endsection

@section('modal')
    <div id="modal" class="modal fade" data-backdrop="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header ">
                    <div class="modal-title text-md">Buat penjadwalan</div>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('order.scheduling') }}" method="post" id="createScheduleFrm">
                        @csrf
                        <div class="form-group">
                            <label for="date">Tanggal pengiriman</label>
                            <input type="date" name="order_date" id="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Pilih alat</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @php
                                $productCategories = App\Models\Category::all();
                                @endphp
                                @foreach ($productCategories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cust">Customer</label>
                            <input type="text" name="customer" id="cust" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" name="company" id="company" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="shipping_address" id="address" cols="10" rows="2" class="form-control"
                                required>Jl. Raya Cisauk-Legok No.66, RT.1/RW.3, Sampora, Kec. Cisauk, Tangerang, Banten 15341</textarea>
                            <small class="text-muted">Alamat pengiriman barang</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="createScheduleFrm">Buat jadwal</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
@endsection
