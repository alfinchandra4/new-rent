@extends('layouts.app')

@section('pgtitle', 'Categories')
@section('content-title', 'Daftar kategori')

@section('path')
    Daftar kategori
@endsection

@section('path')
    <a href="{{ route('categories') }}" /> Kategori</a>
@endsection

@section('content')
    <div class="card col-5">
        <div class="card-body">
            <h4>Kategori</h4>
            <div class="list-group">
                @php
                $categories = App\Models\Category::all();
                @endphp
                @foreach ($categories as $cat)
                @php
                    $items = App\Models\Product::where('category_id', $cat->id)->count()
                @endphp
                    <a href="{{ route('category.products', $cat->id) }}" class="list-group-item">
                        [{{$cat->cat_code}}] - {{$cat->cat_name}}
                        <span class="badge badge-primary badge-pill float-right">{{ $items }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
