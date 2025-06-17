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
                <div class="col-6">
                    <h3 class="card-title">Dam olish kunlari</h3>
                </div>
                <div class="col-3 card-title">
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#verticalycentered" type="button"><i class="bi bi-plus"></i> Yangi kun</button>
                </div>
                <div class="col-3 card-title">
                    <form action="{{ route('setting_holiday_update') }}" method="POST">
                        @csrf
                        <button class="btn btn-success w-100" type="submit"><i class="bi bi-upload"></i> Yangilash</button>
                    </form>
                </div>
            </div>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Bayram yoki dam olish kuni</th>
                        <th>Dam olish kuni haqida</th>
                        <th>O'chirish</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($all as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item['date'] }}</td>
                        <td>{{ $item['comment'] }}</td>
                        <td>
                            <form action="{{ route('setting_holiday_delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <button class="btn btn-danger w-100" type="submit"><i class="bi bi-trash"></i> O'chirish</button>
                            </form>
                        </td>
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

    <div class="modal fade" id="verticalycentered" tabindex="-1">
        <form action="{{ route('setting_holiday_create') }}" method="post">
            @csrf
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yangi dam olish kuni</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="date">Dam olish kuni</label>
                    <input type="date" name="date" required class="form-control mt-2">
                    <label for="comment" class="my-2">Dam olish kuni haqida</label>
                    <textarea name="comment" class="form-control" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                </div>
                </div>
            </div>
        </form>
    </div>
@endsection
