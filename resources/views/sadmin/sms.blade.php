@extends('layouts.app02')
@section('title','SMS paketlari')
@section('content')
    <div class="pagetitle">
        <h1>SMS paketlari</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">SMS paketlari</li>
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
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">SMS paketlari</h3>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Mavjud Paketlar soni</th>
                            <th>Jami yuborilganlar soni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $Setting['message_mavjud'] }}</td>
                            <td>{{ $Setting['message_count'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Yangi SMS paket</h3>
                <form action="{{ route('sadmin_message_mavjud') }}" method="post">
                    @csrf
                    <label for="message_mavjud">SMSlar soni</label>
                    <input type="number" name="message_mavjud" required class="form-control">
                    <button type="submit" class="btn btn-primary w-100 mt-2">O'zgarishlarni saqlash</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">SMS yuborish holati ({{ $Setting['message_status']==1?'Aktive':'Block' }})</h3>
                <form action="{{ route('sadmin_message_status') }}" method="post">
                    @csrf
                    <label for="status">SMS yuborish holatini tanlang</label>
                    <select type="text" name="status" required class="form-select">
                        <option value="">Tanlang</option>
                        <option value='1'>Aktiv</option>
                        <option value='0'>Block</option>
                    </select>
                    <button type="submit" class="btn btn-primary w-100 mt-2">O'zgarishlarni saqlash</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
