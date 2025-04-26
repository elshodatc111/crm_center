@extends('layouts.app02')
@section('title','Kitoblar')
@section('content')
    <div class="pagetitle">
        <h1>Guruhlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Kitoblar</li>
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
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Kitoblar
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" style="font-size:14px;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kitob nomi</th>
                                    <th>Kitob url</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($Book as $item)    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->book_name }}</td>
                                        <td>{{ $item->booh_url }}</td>
                                        <td>
                                            <form action="{{ route('setting_book_delete') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}"> 
                                                <button class="btn btn-danger btn-sm">O'chirish</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Hech narsa topilmadi</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Yangi kitob qo'shish
                    </div>
                    <form action="{{ route('setting_book_create') }}" method="post">
                        @csrf 
                        <label for="book_name" class="mb-2">Kitob nomi</label>
                        <input type="text" required name="book_name" class="form-control">
                        <label for="booh_url" class="my-2">Kitob URL</label>
                        <input type="text" required name="booh_url" class="form-control">
                        <button class="btn btn-primary w-100 mt-2">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>

@endsection
