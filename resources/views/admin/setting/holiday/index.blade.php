@extends('layouts.app02')
@section('title','Dam olish kunlari')
@section('content')
    <div class="pagetitle">
        <h1>Dam olish kunlari</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Dam olish kunlari</li>
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
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title">Dam olish kunlari</h3>
                </div>
                <div class="col-3 card-title">
                    <form action="{{ route('setting_holiday_update') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger w-100" type="submit">Yangilash</button>
                    </form>
                </div>
            </div>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Bayram yoki dam olish kuni</th>
                        <th>Dam olish kuni haqida</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($all as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item['date'] }}</td>
                        <td>{{ $item['comment'] }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan=3 class="text-center">Bayram kunlari kiritilmagan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
