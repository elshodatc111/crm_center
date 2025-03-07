@extends('layouts.app02')
@section('title','Tashrif Statistika')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title w-100 text-center">Hududlardan tashriflar</h5>
                <div id="HududCharts"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#HududCharts"), {
                            series: [
                                @foreach($Hudud as $item)
                                    {{ $item['count'] }},
                                @endforeach
                            ],
                            chart: {
                                height: 320,
                                type: 'pie',
                                toolbar: {
                                    show: true
                                }
                            },
                            labels: [
                                @foreach($Hudud as $item)
                                    "{{ $item['name'] }}",
                                @endforeach
                            ]
                        }).render();
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title w-100 text-center">Sotsial tashriflar</h5>
                <div id="pieChart"></div>
                <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#pieChart"), {
                    series: [
                        {{ $Social['telegram'] }},
                        {{ $Social['instagram'] }},
                        {{ $Social['facebook'] }},
                        {{ $Social['youtube'] }},
                        {{ $Social['bannner'] }},
                        {{ $Social['tanish'] }},
                        {{ $Social['boshqa'] }},
                    ],
                    chart: {
                        height: 320,
                        type: 'pie',
                        toolbar: {
                            show: true
                        }
                    },
                    labels: ['Telegram', 'Instagram', 'Facebook', 'Youtube', 'Banner','Tanishlar','Boshqa']
                    }).render();
                });
                </script>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tashriflar</h4>
                <div id="columnChart"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#columnChart"), {
                        series: [{
                            name: 'Tashriflar',
                            data: [
                                @foreach($tashrif['tashrif'] as $item)
                                    {{$item}},
                                @endforeach
                            ]
                        },{
                            name: 'Guruhga biriktirildi',
                            data: [
                                @foreach($tashrif['group'] as $item)
                                    {{$item}},
                                @endforeach
                            ]
                        }, {
                            name: 'To\'lov qilid',
                            data: [
                                @foreach($tashrif['paymart'] as $item)
                                    {{$item}},
                                @endforeach
                            ]
                        }, {
                            name: 'Aktiv talabalar',
                            data: [
                                @foreach($activeUser as $item)
                                    {{$item}},
                                @endforeach
                            ]
                        }],
                        chart: {
                            type: 'bar',
                            height: 350
                        },
                        plotOptions: {
                            bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: [
                                @foreach($tashrif['data'] as $item)
                                    '{{$item}}',
                                @endforeach
                            ],
                        },
                        yaxis: {
                            title: {
                            text: 'Tashriflar'
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return val
                                }
                            }
                        }
                        }).render();
                    });
                </script>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                @foreach($tashrif['data'] as $item)
                                    <th><b>{{$item}}</b></th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="text-align:left;">Tashriflar</th>
                                @foreach($tashrif['tashrif'] as $item)
                                    <td>{{$item}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="text-align:left;">Guruhga biriktirildi</th>
                                @foreach($tashrif['group'] as $item)
                                    <td>{{$item}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="text-align:left;">To'lov qildi</th>
                                @foreach($tashrif['paymart'] as $item)
                                    <td>{{$item}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="text-align:left;">Aktiv talabalar</th>
                                @foreach($activeUser as $item)
                                    <td>{{$item}}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
