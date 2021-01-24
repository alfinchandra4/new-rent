@extends('layouts.app')

@section('page-title', 'Buat pesanan')
@section('content-title', 'Buat pesanan')

@section('path')
    {{-- <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    --}}
    <span>Pilih alat</span>

@endsection


@section('js-bottom')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#example_filter').css("float", "right");
        });

        $(document).ready(function() {
            $('#search').on('keyup', function(e) {
                $('tbody.list').empty();
                let value = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '/products/',
                    data: {
                        'search': value
                    },
                    success: function(data) {
                        $('tbody.list').html(data);
                    },

                })
            });
        });

    </script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card b-t-2x b-t-primary">
                <div class="card-body">
                    <div class="form-inline ">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i> &nbsp; Pencarian alat
                                </div>
                            </div>
                            <input type="text" id="search" name="search" class="form-control theme search"
                                placeholder="Search products">
                        </div>
                    </div>
                    <table class="table table-theme v-middle">
                        <thead class="bg-primary">
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Opt</th>
                            </tr>
                        </thead>
                        <tbody class="list"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card b-t-2x b-t-primary">
                <div class="card-header">
                    Daftar pesanan
                </div>
                <div class="card-body">
                    @if (session('cart'))
                        <table class="table table-theme v-middle">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Opt</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('cart') as $cart)
                                    <tr>
                                        <td>{{ $cart['product_code'] }}</td>
                                        <td>{{ $cart['product_name'] }}</td>
                                        <td>1 Unit</td>
                                        <td>
                                            <a href="{{ route('order.rmproduct', $cart['product_code']) }}"
                                                class="btn btn-raised btn-wave btn-icon btn-rounded mb-2 red">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('btn')

    <div>
        <a href="#" class="btn w-sm mb-1 bg-primary-lt" data-toggle="modal" data-target="#modal">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            <span class="d-none d-sm-inline mx-1">Buat jadwal</span>
        </a>
        <a href="{{ route('order.ongoing.comingsoon') }}" class="btn mb-1 bg-primary-lt">
            <i class="fa fa-clipboard" aria-hidden="true"></i>
            <span class="d-none d-sm-inline mx-1">Lihat jadwal</span>

        </a>
        &nbsp;
        &nbsp;
        &nbsp;
        <a href="{{ route('order.create.customer') }}" class="btn w-sm mb-1 bg-dark-lt">
            <span class="d-none d-sm-inline mx-1">Selanjutnya</span>
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
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
