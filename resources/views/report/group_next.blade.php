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
                        Yuborilgan smslar (Data Start: {{ $start }} - Data End: {{ $end }})
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
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

@endsection
