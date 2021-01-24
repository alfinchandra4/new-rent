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
<div class="row">
    @php
    $categories = App\Models\Category::all();
    @endphp
    @foreach ($categories as $key => $cat)
    @php
        $items = App\Models\Product::where('category_id', $cat->id)->count()
    @endphp
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <canvas id="myChart{{$cat->id}}" width="400" height="400"></canvas>
                </div>
                    <a href="{{ route('category.products', $cat->id) }}" style="color: black">
                        <div class="card-footer bg-secondary font-weight-lighter">
                            {{$cat->cat_name}}
                            <span class="badge badge-warning badge-pill float-right">{{ $items }} Units</span>
                        </div>
                    </a>
            </div>
        </div>
    @endforeach

</div>
@endsection

@section('js-bottom')
<script>
    data = '{!! $data !!}';
    data = JSON.parse(data);
    // console.log(data);
    for (const key in data) {
        id = 'myChart'+data[key].category_id;
        console.log(id);
        var ctx = document.getElementById(id).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data[key].labels,
                datasets: [{
                    label: data[key].name+' terpakai',
                    fill: false,
                    data: data[key].count,
                    borderColor: "#23689b",
                    backgroundColor: "#23689b",
                    // pointBackgroundColor: "#55bae7",
                    // borderWidth: 2
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                }
            }
        });
    }
    </script>
@endsection
