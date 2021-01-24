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
<div class="row">
    @foreach ($products as $item)
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <canvas id="myChart{{$item->id}}" width="200" height="200"></canvas>
                    <center class="font-weight-bold">
                        800 of 1000 Jam
                    </center>
                </div>
                <a href="{{ route('services', [1, 1]) }}">
                    <div class="card-footer bg-secondary font-weight-lighter">
                        <center>
                            {{ $item->product_name }}
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </center>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>


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

@section('js-bottom')
    <script>
        var ctx = document.getElementById("myChart1");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Total jam kerja"],
                datasets: [{
                    label: '# of Votes',
                    data: [1200, 0],
                    backgroundColor: [
                        'rgba(159, 90, 253, 1)',
                        '#fff'
                    ],
                }]

            },
            options: {
                rotation: 1 * Math.PI,/** This is where you need to work out where 89% is */
                circumference: 1 * Math.PI,/** put in a much smaller amount  so it does not take up an entire semi circle */
                tooltip: {
                    enabled: false
                },
                cutoutPercentage: 60
            }
        });
    </script>
@endsection