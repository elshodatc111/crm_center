@extends('layouts.app02')
@section('title','To\'lovlar Statistika')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title w-100 text-center">Umumiy murojatlar</h4>
                <div id="umumiyMurojat"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#umumiyMurojat"), {
                        series: [
                            {{ $allMurojat['new'] }},
                            {{ $allMurojat['pedding'] }},
                            {{ $allMurojat['cancel'] }},
                            {{ $allMurojat['success'] }},
                            {{ $allMurojat['paymart'] }},
                        ],
                        chart: {
                            height: 320,
                            type: 'pie',
                            toolbar: {
                            show: true
                            }
                        },
                        labels: ['Yangi murojat', 'Ko\'rib chiqilmoqda', 'Bekor qilindi', 'Ro\'yhatga olindi', 'To\'lov qildi']
                        }).render();
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title w-100 text-center">Oylik murojatlar</h4>
                <div id="oylikMurojat"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#oylikMurojat"), {
                        series: [
                            {{ $monchMurojat['new'] }},
                            {{ $monchMurojat['pedding'] }},
                            {{ $monchMurojat['cancel'] }},
                            {{ $monchMurojat['success'] }},
                            {{ $monchMurojat['paymart'] }},
                        ],
                        chart: {
                            height: 320,
                            type: 'pie',
                            toolbar: {
                            show: true
                            }
                        },
                        labels: ['Yangi murojat', 'Ko\'rib chiqilmoqda', 'Bekor qilindi', 'Ro\'yhatga olindi', 'To\'lov qildi']
                        }).render();
                    });
                </script>
            </div>
        </div>
    </div>
    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kunlik to'lovlar</h4>
                <div id="columnChart"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#columnChart"), {
                        series: [{
                            name: 'Naqt to\'lovlar',
                            data: [
                                @foreach($DaysChart['naqt'] as $item)
                                    {{ $item['int'] }},
                                @endforeach
                            ]
                        },{
                            name: 'Plastik to\'lovlar',
                            data: [
                                @foreach($DaysChart['plastik'] as $item)
                                    {{ $item['int'] }},
                                @endforeach
                            ]
                        }, {
                            name: 'Chegirmalar',
                            data: [
                                @foreach($DaysChart['chegirma'] as $item)
                                    {{ $item['int'] }},
                                @endforeach
                            ]
                        }, {
                            name: 'Qaytarilgan to\'lovlar',
                            data: [
                                @foreach($DaysChart['qaytarildi'] as $item)
                                    {{ $item['int'] }},
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
                                @foreach($days as $item)
                                    "{{$item['ymd']}}",
                                @endforeach
                            ],
                        },
                        yaxis: {
                            title: {
                            text: 'Kunlik to\'lovlar'
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return val + " So'm"
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
                                @foreach($days as $item)
                                    <th><a href="{{ route('chart_paymart_show',$item['ymd']) }}">{{$item['ymd']}}</a></th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="text-align:left;">Naqt to'lovlar</th>
                                @foreach($DaysChart['naqt'] as $item)
                                    <td>{{ $item['string'] }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="text-align:left;">Plastik to'lovlar</th>
                                @foreach($DaysChart['plastik'] as $item)
                                    <td>{{ $item['string'] }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="text-align:left;">Chegirmalar</th>
                                @foreach($DaysChart['chegirma'] as $item)
                                    <td>{{ $item['string'] }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="text-align:left;">Qaytarilgan to'lovlar</th>
                                @foreach($DaysChart['qaytarildi'] as $item)
                                    <td>{{ $item['string'] }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Oylik to'lovlar</h4>
                <div id="oylikTolovlar"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#oylikTolovlar"), {
                        series: [{
                            name: 'Naqt to\'lovlar',
                            data: [
                                @foreach($MonchChart['naqt'] as $item)
                                    {{ $item['int'] }},
                                @endforeach
                            ]
                        },{
                            name: 'Plastik to\'lovlar',
                            data: [
                                @foreach($MonchChart['plastik'] as $item)
                                    {{ $item['int'] }},
                                @endforeach
                            ]
                        }, {
                            name: 'Chegirmalar',
                            data: [
                                @foreach($MonchChart['chegirma'] as $item)
                                    {{ $item['int'] }},
                                @endforeach
                            ]
                        }, {
                            name: 'Qaytarilgan to\'lovlar',
                            data: [
                                @foreach($MonchChart['qaytarildi'] as $item)
                                    {{ $item['int'] }},
                                @endforeach
                            ]
                        }, {
                            name: 'Exson',
                            data: [
                                @foreach($MonchChart['exson'] as $item)
                                    {{ $item['int'] }},
                                @endforeach
                            ]
                        },{
                            name: 'Xarajatlar',
                            data: [
                                @foreach($MonchChart['xarajat'] as $item)
                                    {{ $item['int'] }},
                                @endforeach
                            ]
                        },{
                            name: 'Ish haqi',
                            data: [
                                @foreach($MonchChart['ishhaqi'] as $item)
                                    {{ $item['int'] }},
                                @endforeach
                            ]
                        },{
                            name: 'Daromad',
                            data: [
                                @foreach($MonchChart['daromad'] as $item)
                                    {{ $item['int'] }},
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
                                @foreach($monch as $item)
                                    "{{$item['yM']}}",
                                @endforeach
                            ],
                        },
                        yaxis: {
                            title: {
                            text: 'Kunlik to\'lovlar'
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return val + " So'm"
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
                                @foreach($monch as $item)
                                    <th><b>{{$item['yM']}}</b></th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="text-align:left;">Naqt to'lovlar</th>
                                @foreach($MonchChart['naqt'] as $item)
                                    <td>{{ $item['string'] }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="text-align:left;">Plastik to'lovlar</th>
                                @foreach($MonchChart['plastik'] as $item)
                                    <td>{{ $item['string'] }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="text-align:left;">Qaytarilgan to'lovlar</th>
                                @foreach($MonchChart['qaytarildi'] as $item)
                                    <td>{{ $item['string'] }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="text-align:left;">Chegirmalar</th>
                                @foreach($MonchChart['chegirma'] as $item)
                                    <td>{{ $item['string'] }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="text-align:left;">Exson</th>
                                @foreach($MonchChart['exson'] as $item)
                                    <td>{{ $item['string'] }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="text-align:left;">Xarajatlar</th>
                                @foreach($MonchChart['xarajat'] as $item)
                                    <td>{{ $item['string'] }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="text-align:left;">To'langan ish haqi</th>
                                @foreach($MonchChart['ishhaqi'] as $item)
                                    <td>{{ $item['string'] }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="text-align:left;">Daromad</th>
                                @foreach($MonchChart['daromad'] as $item)
                                    <td>{{ $item['string'] }}</td>
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
