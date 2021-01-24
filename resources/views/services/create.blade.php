@extends('layouts.app')

@section('pgtitle', 'Services')
@section('content-title', 'Perawatan alat')

@section('path')
<a href="{{ route('categories') }}" /> Kategori</a>
<i class="fa fa-angle-double-right" aria-hidden="true"></i>
<a href="{{ route('category.products', $category_id) }}">
  {{ App\Models\Category::find($category_id)->cat_name }}
</a>
<i class="fa fa-angle-double-right" aria-hidden="true"></i>
<a href="{{ route('services', [ $category_id, $product_id]) }}">
  {{ App\Models\Product::find($product_id)->product_name }}
</a>
<i class="fa fa-angle-double-right" aria-hidden="true"></i>
Form tambah perawatan 
@endsection

@section('content')
    <div class="card">
      <div class="card-header bg-primary font-weight-bold">
        Data perawatan
      </div>
      <div class="card-body">
          <form action="{{ route('services.store') }}" method="post">
            @csrf
            <input type="text" name="product_id" value="{{$product_id}}">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" required value="{{ date('Y-m-d') }}" class="form-control" name="last_services">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" id="mytextarea" rows="8" name="services"></textarea>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary">Simpan data</button>
            </div>
          </form>
      </div>
    </div>
@endsection