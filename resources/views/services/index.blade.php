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
      {{ App\Models\Product::find($product_id)->product_name }}
@endsection

@section('btn')
  {{-- <a href="{{ route('services.create', [$category_id, $product_id]) }}" 
     class="btn mb-1 bg-dark-lt">
    <i class="fa fa-plus-circle" aria-hidden="true"></i>
    <span class="d-none d-sm-inline mx-1">Tambah data perawatan</span>
  </a>
</div> --}}
@endsection

@section('content')
<div class="row">
  <div class="col-6">
    <div class="timeline p-4 block mb-4">
      <h4 class="font-weight-bolder"> {{ App\Models\Product::find($product_id)->product_name }} </h4>
      @foreach ($working_hours as $key => $item_work)
      <div class="tl-item {{ $key == 0 ? 'active' : '' }}">
          <div class="tl-dot"></div>
          <div class="tl-date text-muted">
              {{ date('d M Y', strtotime($item_work->last_services)) }}
          </div>
          <div class="tl-content"> 
            {!! $item_work->services !!} 
            <div>
                <a href="{{ route('services.remove', [$item_work->id]) }}">Remove</a>
            </div>
          </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="col-6">
    <div class="card">
      <div class="card-header bg-primary font-weight-bold">
        Data perawatan
      </div>
      <div class="card-body">
          <form action="{{ route('services.store') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{$product_id}}">
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
  </div>
</div>

@endsection