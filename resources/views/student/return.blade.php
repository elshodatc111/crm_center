@extends('layouts.app03')
@section('title','Qaytarilgan to\'lovlar')
@section('content')
    <div class="pagetitle">
        <h1>Qaytarilgan to'lovlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Qaytarilgan to'lovlar</li>
            </ol>
        </nav>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Qaytarilgan to'lovlar</h3>
            <div class="table-responsive">
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Talaba</th>
                            <th>Qaytariladigan to'lov</th>
                            <th>Qaytarish haqida</th>
                            <th>Meneger</th>
                            <th>Qaytarilgan vaqt</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($Refund as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td><a href="{{ route('student_show',$item['user_id']) }}">{{ $item['user_name'] }}</a></td>
                                <td>{{ $item['amonut'] }}</td>
                                <td>{{ $item['description'] }}</td>
                                <td>{{ $item['meneger'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                                <td class="text-center">
                                    <form action="{{ route('all_student_return_del') }}" method="post">
                                        @csrf 
                                        <input type="hidden" name="id" value="{{ $item['refund_id'] }}">
                                        <button class="btn btn-danger p-0 px-1"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan=7 class="text-center">Qaytarilgan to'lovlar mavjud emas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
@endsection
