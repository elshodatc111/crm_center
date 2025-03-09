@extends('layouts.app02')
@section('title','Guruhlar')
@section('content')
    <div class="pagetitle">
        <h1>To'lovlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('report_group') }}">Guruhlar</a></li>
                <li class="breadcrumb-item">Guruhlar</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title w-100 mb-0 pb-0">
                        @if($type=='all')
                            Barcha Guruhlar
                        @elseif($type=='test')
                            Test natijalari
                        @endif 
                    </h3>
                </div>
                <div class="col-3" style="text-align:right">
                    <button id='export' class="btn btn-primary mt-3" type="button">Print Excel</button>
                </div>
            </div>
            @if($type=='all')
                <div class="table-responsive pt-2">
                    <table class="table table-bordered text-center" id="table" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kurs nomi</th>
                                <th>Guruh nomi</th>
                                <th>To'lov summasi</th>
                                <th>To'lov uchun chegirma</th>
                                <th>Admin uchun chegirma</th>
                                <th>Hafta kuni</th>
                                <th>Darslar soni</th>
                                <th>Dars xonasi</th>
                                <th>Dars vaqti</th>
                                <th>O'qituvchi</th>
                                <th>O'qituvchiga to'lov</th>
                                <th>O'qituvchiga bonus</th>
                                <th>Boshlanish vaqti</th>
                                <th>Yakunlanish vaqti</th>
                                <th>Meneger</th>
                                <th>Guruh Status</th>
                                <th>Guruh yaratildi</th>
                                <th>Guruh yangilandi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($response as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item['Cours'] }}</td>
                                    <td>{{ $item['group_name'] }}</td>
                                    <td>{{ $item['amount'] }}</td>
                                    <td>{{ $item['chegirma'] }}</td>
                                    <td>{{ $item['admin_chegirma'] }}</td>
                                    <td>{{ $item['weekday'] }}</td>
                                    <td>{{ $item['lessen_count'] }}</td>
                                    <td>{{ $item['xona'] }}</td>
                                    <td>{{ $item['lessen_times_id'] }}</td>
                                    <td>{{ $item['techer'] }}</td>
                                    <td>{{ $item['techer_paymart'] }}</td>
                                    <td>{{ $item['techer_bonus'] }}</td>
                                    <td>{{ $item['lessen_start'] }}</td>
                                    <td>{{ $item['lessen_end'] }}</td>
                                    <td>{{ $item['meneger'] }}</td>
                                    <td>{{ $item['next'] }}</td>
                                    <td>{{ $item['created_at'] }}</td>
                                    <td>{{ $item['updated_at'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan=19 class="text-center">Guruhlar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @elseif($type=='test')
                <div class="table-responsive pt-2">
                    <table class="table table-bordered text-center" id="table" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Talaba</th>
                                <th>Kurs</th>
                                <th>Guruh</th>
                                <th>Testlar soni</th>
                                <th>Urinishlar soni</th>
                                <th>To'g'ri javob</th>
                                <th>Noto'g'ri javob</th>
                                <th>Ball</th>
                                <th>Birinchi urinish vaqti</th>
                                <th>Oxirgi urinish vaqti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($response as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item['user'] }}</td>
                                    <td>{{ $item['kurs'] }}</td>
                                    <td>{{ $item['guruh'] }}</td>
                                    <td>15</td>
                                    <td>{{ $item['urinishlar'] }}</td>
                                    <td>{{ $item['tugri'] }}</td>
                                    <td>{{ $item['notugri'] }}</td>
                                    <td>{{ $item['ball'] }}</td>
                                    <td>{{ $item['first'] }}</td>
                                    <td>{{ $item['end'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan=10 class="text-center">Test natijalari mavjud emas.</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            @endif 
            
        </div>
    </div>
    

@endsection
