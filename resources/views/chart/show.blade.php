@extends('layouts.app03')
@section('title','To\'lovlar Statistika')
@section('content')
<div class="pagetitle">
    <h1>To'lovlar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('chart_paymart') }}">To'lovlkar statistikasi</a></li>
            <li class="breadcrumb-item">Kunlik to'lovlar</li>
        </ol>
    </nav>
</div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Kunlik to'lovlar ({{ $data }})</h4>
            <div class="table-responsive">
                <table class="table table-bordered text-center" style="font-size:12px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>To'lov summasi</th>
                            <th>To'lov turi</th>
                            <th>To'lov haqida</th>
                            <th>To'lov vaqti</th>
                            <th>Meneger</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($paymart as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td><a href="{{ route('student_show',$item['user_id']) }}">{{ $item['user_name'] }}</a></td>
                            <td>
                                {{ number_format($item['amount'], 0, '.', ' ') }}    
                            </td>
                            <td>
                                @if($item['paymart_type']=='naqt')
                                    <span class="badge bg-success">Naqt</span>
                                @elseif($item['paymart_type']=='plastik')
                                    <span class="badge bg-primary">Plastik</span>
                                @elseif($item['paymart_type']=='chegirma')
                                    <span class="badge bg-warning text-white">Chegirma</span>
                                @elseif($item['paymart_type']=='qaytarildi')
                                    <span class="badge bg-danger">Qaytarildi</span>
                                @endif
                            </td>
                            <td>{{ $item['description'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                            <td>{{ $item['email'] }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan=7 class="text-center">To'lovlar mavjud emas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection
