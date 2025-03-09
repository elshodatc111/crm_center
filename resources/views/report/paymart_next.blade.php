@extends('layouts.app02')
@section('title','To\'lovlar')
@section('content')
    <div class="pagetitle">
        <h1>To'lovlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('report_paymart') }}">To'lovlar</a></li>
                <li class="breadcrumb-item">To'lovlar</li>
            </ol>
        </nav>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title w-100 mb-0 pb-0">
                        @if($type=='paymart')
                            Barcha to'lovlar
                        @elseif($type=='kassa_chiqim')
                            Kassadan chiqimlar
                        @elseif($type=='moliya_chiqim')
                            Balansdan chiqimlar
                        @elseif($type=='hodim_paymart')
                            Hodimlarga to'langan ish haqi
                        @elseif($type=='texher_paymart')
                            O'qituvchilarga to'langan ish haqi
                        @endif 
                        (Data Start: {{ $start }} - Data End: {{ $end }})
                    </h3>
                </div>
                <div class="col-3" style="text-align:right">
                    <button id='export' class="btn btn-primary mt-3" type="button">Print Excel</button>
                </div>
            </div>
            @if($type=='paymart')
                <div class="table-responsive pt-2">
                    <table class="table table-bordered text-center" id="table" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Talaba</th>
                                <th>Guruh</th>
                                <th>To'lov summasi</th>
                                <th>To'lov turi</th>
                                <th>To'lov haqida</th>
                                <th>To'lov vaqti</th>
                                <th>Meneger</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($response as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['user_name'] }}</td>
                                <td>{{ $item['group'] }}</td>
                                <td>{{ $item['amount'] }}</td>
                                <td>{{ $item['paymart_type'] }}</td>
                                <td>{{ $item['about'] }}</td>
                                <td>{{ $item['admin'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=8 class="text-center">To'lovlar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @elseif($type=='kassa_chiqim')
                <div class="table-responsive pt-2">
                    <table class="table table-bordered text-center" id="table" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Meneger</th>
                                <th>Chiqim vaqti</th>
                                <th>Chiqim haqida</th>
                                <th>Chiqim summasi</th>
                                <th>Chiqim turi</th>
                                <th>Tasdiqladi</th>
                                <th>Tasdiqlangan vaqt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($response as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['meneger'] }}</td>
                                <td>{{ $item['create'] }}</td>
                                <td>{{ $item['description'] }}</td>
                                <td>{{ $item['amount'] }}</td>
                                <td>{{ $item['type'] }}</td>
                                <td>{{ $item['admin'] }}</td>
                                <td>{{ $item['succes'] }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=8 class="text-center">Kassadn chiqimlar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @elseif($type=='moliya_chiqim')
                <div class="table-responsive pt-2">
                    <table class="table table-bordered text-center" id="table" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Chiqim turi</th>
                                <th>Chiqim summasi</th>
                                <th>Chiqim haqida</th>
                                <th>Meneger</th>
                                <th>Chiqim vaqti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($response as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['type'] }}</td>
                                <td>{{ $item['amount'] }}</td>
                                <td>{{ $item['comment'] }}</td>
                                <td>{{ $item['user_id'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=6 class="text-center">Kassadn chiqimlar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @elseif($type=='hodim_paymart')
                <div class="table-responsive pt-2">
                    <table class="table table-bordered text-center" id="table" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hodim</th>
                                <th>To'lov summasi</th>
                                <th>To'lov turi</th>
                                <th>To'lov haqida</th>
                                <th>Meneger</th>
                                <th>To'lov vaqti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($response as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['hodim'] }}</td>
                                <td>{{ $item['amount'] }}</td>
                                <td>{{ $item['type'] }}</td>
                                <td>{{ $item['description'] }}</td>
                                <td>{{ $item['admin'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=7 class="text-center">Hodimlarga to'langan ish haqi mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @elseif($type=='texher_paymart')
                <div class="table-responsive pt-2">
                    <table class="table table-bordered text-center" id="table" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>O'qituvchi</th>
                                <th>Guruh</th>
                                <th>To'lov summasi</th>
                                <th>To'lov turi</th>
                                <th>To'lov haqida</th>
                                <th>Meneger</th>
                                <th>To'lov vaqti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($response as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['techer'] }}</td>
                                <td>{{ $item['guruh'] }}</td>
                                <td>{{ $item['amount'] }}</td>
                                <td>{{ $item['type'] }}</td>
                                <td>{{ $item['description'] }}</td>
                                <td>{{ $item['admin'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=8 class="text-center">O'qituvchilarga to'langan ish haqi mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif 
            
        </div>
    </div>
    

@endsection
