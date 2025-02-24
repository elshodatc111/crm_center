@extends('layouts.app01')
@section('title','O\'qituvchilar')
@section('content')
<div class="pagetitle">
    <h1>O'qituvchilar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item">O'qituvchilar</li>
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


    <div class="card">
        <div class="card-body">
            <div class="row card-title">
                <div class="col-6">O'qituvchilar</div>
                <div class="col-6" style="text-align:right">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVisitModal"><i class="bi bi-plus"></i> Yangi O'qituvchi</button>
                </div>
            </div>
            <table class="table table-bordered text-center" style="font-size:14px">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>O'qituvchi</th>
                        <th>Telefon raqam</th>
                        <th>Login</th>
                        <th>Ishga olindi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($User as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td><a href="{{ route('techer_show',$item['id']) }}">{{ $item['user_name'] }}</a></td>
                            <td>{{ $item['phone1'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                            <td>
                                @if($item['status']=='true')
                                    <span class="bg-danger text-white px-1">Aktiv</b>
                                @elseif($item['status']=='false')
                                    <span class="bg-danger text-white px-1">Bloklangan</b>
                                @else
                                    <span class="bg-danger text-white px-1">Ish faoliyanda emas</b>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan=6 class="text-center">O'qituvchilar mavjud emas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
            
@endsection
