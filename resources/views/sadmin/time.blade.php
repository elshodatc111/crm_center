@extends('layouts.app02')
@section('title','Dars vaqtlari')
@section('content')
    <div class="pagetitle">
        <h1>Dars vaqtlari</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Dars vaqtlari</li>
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
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Dars vaqtlari</h3>
                <table class="table text-center table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Dars vaqti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($LessenTime as $item)
                        <tr>
                            <td>{{ $item['number'] }}</td>
                            <td>{{ $item['time'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Dars vaqtlarini sozlash</h3>
                @if(count($LessenTime)==0)
                <form action="{{ route('sadmin_time_store') }}" method="post">
                    @csrf 
                    <label for="start">Dars boshlanish vaqti</label>
                    <input type="time" name="start" required class="form-control">
                    <label for="time">Dars vaqti(minut)</label>
                    <input type="number" name="time" required class="form-control">
                    <label for="count">Darslar soni</label>
                    <input type="number" name="count" required class="form-control">
                    <button class="btn btn-primary w-100 mt-2" type="submit">Saqlash</button>
                </form>
                @else
                    <form action="{{ route('sadmin_time_delete') }}" method="post">
                        @csrf 
                        <button class="btn btn-danger w-100 mt-2" type="submit">Barcha dars vaqtlarini o'chirish</button>
                    </form>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
