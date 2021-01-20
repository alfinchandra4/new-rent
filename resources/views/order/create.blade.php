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
        <a href="{{ route('order.create.customer') }}" class="btn w-sm mb-1 bg-primary-lt">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            <span class="d-none d-sm-inline mx-1">Buat jadwal</span>
        </a>
        <a href="{{ route('order.create.customer') }}" class="btn mb-1 bg-primary-lt">
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
