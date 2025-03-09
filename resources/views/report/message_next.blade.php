@extends('layouts.app02')
@section('title','Yuborilgan sms xabarlar')
@section('content')
    <div class="pagetitle">
        <h1>Hisobot</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('report_message') }}">SMS</a></li>
                <li class="breadcrumb-item">Hisobot</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title w-100 mb-0 pb-0">
                        Yuborilgan smslar (Data Start: {{ $response['start'] }} - Data End: {{ $response['end'] }})
                    </h3>
                </div>
                <div class="col-3" style="text-align:right">
                    <button id='export' class="btn btn-primary mt-3" type="button">Print Excel</button>
                </div>
            </div>
            <div class="table-responsive pt-2">
                <table class="table table-bordered text-center" id="table" style="font-size:12px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Telefon raqam</th>
                            <th>SMS matni</th>
                            <th>Yuborildi</th>
                            <th>Meneger</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($response['message'] as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item['phone'] }}</td>
                            <td>{{ $item['message'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                            <td>{{ $item['admin'] }}</td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan=5 class="text-center">Yuborilgan smslar mavjud emas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

@endsection
