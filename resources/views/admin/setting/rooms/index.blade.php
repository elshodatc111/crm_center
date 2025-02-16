@extends('layouts.app02')
@section('title','Dars xonalari')
@section('content')
    <div class="pagetitle">
        <h1>Dars xonalari</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Dars xonalari</li>
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
                    <h3 class="card-title">Yangi xona qo'shish</h3>
                    <form action="{{ route('setting_room_create') }}" method="post">
                        @csrf 
                        <label for="room_name" class="mb-1">Xona nomi</label>
                        <input type="text" name="room_name" required class="form-control">
                        <button class="btn btn-primary w-100 mt-2">Xonani saqlash</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Xonalar</h3>
                    <table class="table table-bordered text-center" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Xona nomi</th>
                                <th>O'chirish</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rooms as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item['room_name'] }}</td>
                                    <td>
                                        <form action="{{ route('setting_room_delete') }}" method="post">
                                            @csrf 
                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                            <button type="submit" class="btn btn-danger px-1 py-0"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan=3 class="text-center">Xonalar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
