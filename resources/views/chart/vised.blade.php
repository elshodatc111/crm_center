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
                    series: [44, 55, 13, 43, 22],
                    chart: {
                        height: 320,
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
                        height: 320,
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
                            data: [44, 55, 57, 56, 61, 58]
                        },{
                            name: 'Guruhga biriktirildi',
                            data: [44, 25, 75, 65, 16, 85]
                        }, {
                            name: 'To\'lov qilid',
                            data: [76, 85, 101, 98, 87, 15]
                        }, {
                            name: 'Aktiv talabalar',
                            data: [36, 45, 11, 78, 81, 65]
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
                            categories: ['2025-Yanvar', '2025-Fevral', '2025-Mart', '2025-Aprel', '2025-May', '2025-Iyun'],
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
                <table class="table table-bordered text-center" style="font-size:12px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><b>2025-Yanvar</b></th>
                            <th><b>2025-Fevral</b></th>
                            <th><b>2025-Mart</b></th>
                            <th><b>2025-Aprel</b></th>
                            <th><b>2025-May</b></th>
                            <th><b>2025-Iyun</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="text-align:left;">Tashriflar</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Guruhga biriktirildi</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">To'lov qildi</th>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                            <td>125 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Aktiv talabalar</th>
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
