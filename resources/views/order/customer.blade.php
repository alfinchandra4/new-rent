@extends('layouts.app')

@section('page-title', 'Buat pesanan')
@section('content-title', 'Customer')

@section('path')
    <a href="{{ route('order.create') }}" /> Pilih alat</a>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>Customer</span>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card b-t-2x b-t-primary">
                <div class="card-header">
                    Form customer
                </div>
                <div class="card-body">
                    <form action="{{ route('order.store') }}" method="post" id="customerfrm">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="company" class="col-sm-3 col-form-label">Company</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="company" placeholder="company" name="company">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="shipping_address" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="shipping_address" placeholder="Lokasi pengiriman"
                                    name="shipping_address" cols="10" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row row-sm">
                            <label class="col-sm-3 col-form-label">Start</label>
                            <div class="col-sm-5">
                                <input name="date_start" type="date" class="form-control" placeholder="Date start" required>
                            </div>
                        </div>
                    </form>
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
                        @foreach (session('cart') as $cart)
                            <div class="list list-row block">
                                <div class="list-item ">
                                    <div class="flex">
                                        <span class="item-author text-color">
                                            {{ $cart['product_name'] }} -
                                            <span class="badge badge-primary text-uppercase">
                                                {{ $cart['product_code'] }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="card b-t-2x b-t-primary">
                <textarea class="form-control" form="customerfrm" name="note" placeholder="Catatan">Jl. Raya Cisauk-Legok No.66, RT.1/RW.3, Sampora, Kec. Cisauk, Tangerang, Banten 15341</textarea>
            </div>
        </div>
    </div>

@endsection

@section('btn')
    <div>
        <button type="submit" class="btn w-sm mb-1 bg-dark-lt" form="customerfrm">
            <i class="fa fa-lg fa-clipboard    "></i>
            <span class="d-none d-sm-inline mx-1">Buat pesanan</span>
        </button>
    </div>
@endsection
