@extends('layouts.app')

@section('pgtitle', 'Categories')
@section('content-title', 'Kategori')

@section('path')
    <a href="{{ route('categories') }}" /> Kategori</a>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    @php
    $category = App\Models\Category::find($category_id);
    @endphp
    <span>{{ $category->cat_name }}</span>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Kategori</h4>
            <table class="table" id="example">
                <thead class="bg-primary">
                    <tr>
                        <th>#</th>
                        <th>Alat</th>
                        <th>No Seri</th>
                        <th>Status</th>
                        <th>Histori</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
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
                                <i class="fa fa-gear" aria-hidden="true"></i> Under Construction
                            </td>
                            <td>
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
                                            <a class="dropdown-item"
                                                href="{{ route('order.ongoing.onworking', $item->id) }}">
                                                Tersedia
                                            </a>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal-animate"
                                                data-toggle-class="fade-up" data-toggle-class-target=".animate" href="#">
                                                Sedang digunakan
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
@endsection
