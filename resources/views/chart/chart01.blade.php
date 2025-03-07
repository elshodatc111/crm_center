@extends('layouts.app')
@section('title','Dashboard')
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
                    series: [44, 55, 13, 43, 22],
                    chart: {
                        height: 350,
                        type: 'pie',
                        toolbar: {
                            show: true
                        }
                    },
                    labels: ['Qarshi shaxar', 'Yakkabog tuman', 'Dexqonobod tuman', 'Chiroqchi tuman', 'Muborak tuman']
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
                    series: [44, 55, 13, 43, 22],
                    chart: {
                        height: 350,
                        type: 'pie',
                        toolbar: {
                            show: true
                        }
                    },
                    labels: ['Telegram', 'Instagram', 'Facebook', 'Youtube', 'Banner']
                    }).render();
                });
                </script>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title w-100 text-center">Umumiy murojatlar</h4>
                <div id="umumiyMurojat"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#umumiyMurojat"), {
                        series: [44, 55, 13, 43, 22],
                        chart: {
                            height: 350,
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
                        series: [44, 55, 13, 43, 22],
                        chart: {
                            height: 350,
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
                            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                        },{
                            name: 'Plastik to\'lovlar',
                            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                        }, {
                            name: 'Chegirmalar',
                            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                        }, {
                            name: 'Qaytarilgan to\'lovlar',
                            data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
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
                            categories: ['01-mart', '02-mart', '03-mart', '04-mart', '05-mart', '06-mart', '07-mart', '08-mart', '09-mart'],
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
                <table class="table table-bordered text-center" style="font-size:12px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><a href="#">1-mart</a></th>
                            <th><a href="#">2-mart</a></th>
                            <th><a href="#">3-mart</a></th>
                            <th><a href="#">4-mart</a></th>
                            <th><a href="#">5-mart</a></th>
                            <th><a href="#">6-mart</a></th>
                            <th><a href="#">7-mart</a></th>
                            <th><a href="#">8-mart</a></th>
                            <th><a href="#">9-mart</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="text-align:left;">Naqt to'lovlar</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Plastik to'lovlar</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Qaytarilgan to'lovlar</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Chegirmalar</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                    </tbody>
                </table>
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
                            name: 'Oylik to\'lovlar',
                            data: [44, 55, 57, 56, 61, 58]
                        },{
                            name: 'Plastik to\'lovlar',
                            data: [44, 55, 57, 56, 61, 58]
                        }, {
                            name: 'Chegirmalar',
                            data: [76, 85, 101, 98, 87, 105]
                        }, {
                            name: 'Qaytarilgan to\'lovlar',
                            data: [35, 41, 36, 26, 45, 48]
                        }, {
                            name: 'Exson',
                            data: [35, 41, 36, 26, 45, 48]
                        },{
                            name: 'Xarajatlar',
                            data: [44, 55, 57, 56, 61, 58]
                        },{
                            name: 'Daromad',
                            data: [44, 55, 57, 56, 61, 58]
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
                            categories: ['2025-yanvar', '2025-fevral', '2025-mart', '2025-aprel', '2025-may', '2025-iyun'],
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
                <table class="table table-bordered text-center" style="font-size:12px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><b>2025-yanvar</b></th>
                            <th><b>2025-fevral</b></th>
                            <th><b>2025-mart</b></th>
                            <th><b>2025-aprel</b></th>
                            <th><b>2025-may</b></th>
                            <th><b>2025-iyun</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="text-align:left;">Naqt to'lovlar</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Plastik to'lovlar</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Qaytarilgan to'lovlar</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Chegirmalar</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Exson</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Xarajatlar</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Daromad</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection
