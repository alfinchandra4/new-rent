@extends('layouts.app')

@section('page-title', 'Buat pesanan')
@section('content-title', 'Daftar alat')

@section('path')
    Daftar alat
@endsection

@section('btn')

    <div>
        <a href="#" class="btn w-sm mb-1 bg-primary-lt" data-toggle="modal" data-target="#modal">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            <span class="d-none d-sm-inline mx-1">Tambah produk</span>
        </a>
    </div>
@endsection

@section('js-bottom')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#example_filter').css("float", "right");
        });

    </script>
@endsection

@section('modal')
    <!-- .modal -->
    <div id="modal" class="modal fade" data-backdrop="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header ">
                    <div class="modal-title text-md">Tambah alat</div>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="p-4">
                        <form action="{{ route('product.store') }}" method="post" id="createProductFrm">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="product">Produk</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="product_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="code">Kode produk</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="product_code" id="code">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="category">Kategory</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="category_id">
                                        @php
                                        $categories = App\Models\Category::all();
                                        @endphp
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->cat_name }}
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="createProductFrm">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
@endsection

@section('content')
    <div class="card b-t-2x b-t-primary">
        <div class="card-header">
            Daftar alat
        </div>
        <div class="card-body">
            <table class="table" id="example">
                <thead class="bg-primary">
                    <tr>
                        <th>#</th>
                        <th>Alat</th>
                        <th>No Seri</th>
                        <th>Status</th>
                        <th>Kategori</th>
                        <th>Histori</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $products = App\Models\Product::orderBy('product_name', 'ASC')->get();
                    @endphp
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->product_code }}</td>
                            <td>
                                @switch($item->product_status)
                                    @case(1)
                                    <span class="badge badge-primary">Available</span>
                                    @break
                                    @case(2)
                                    <span class="badge badge-warning">Maintain</span>
                                    @break
                                    @case(0)
                                    <span class="badge badge-dark">Used</span>
                                    @break
                                @endswitch
                            </td>
                            {{--
                            Code 1 available
                            Code 2 maintain
                            Code 0 Used
                            --}}
                            <td>
                                <a href="{{ route('category.products', $item->category->id) }}"
                                    class="btn btn-outline-default bnt-sm">
                                    {{ $item->category->cat_name }}
                                </a>
                            </td>
                            <td>
                                <i class="fa fa-gear" aria-hidden="true"></i> Under Construction
                            </td>
                            <td>
                                <a href="{{ route('product.delete', $item->id) }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Remove
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
