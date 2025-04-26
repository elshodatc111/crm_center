@extends('layouts.app03')
@section('title','Kurs video darslar')
@section('content')
    <div class="pagetitle">
        <h1>{{ $cours['cours_name'] }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('setting_cours') }}">Kurs sozlamalari</a></li>
                <li class="breadcrumb-item">Kurs video darslar</li>
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
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Yangi video dars qo'shish</h3> 
                    <form action="{{ route('setting_video_create') }}" method="post">
                        @csrf 
                        <input type="hidden" name="cours_id" value="{{ $cours['id'] }}">
                        <label for="cours_name">Mavzu nomi</label>
                        <input type="text" name="cours_name" required class="form-control my-2">
                        <label for="lessen_number">Tartib raqami</label>
                        <input type="number" name="lessen_number" required class="form-control my-2">
                        <label for="video_url">Youtube video url</label>
                        <input type="text" name="video_url" required class="form-control my-2">
                        <button class="btn btn-primary w-100 mt-2">Darsni saqlash</button>
                    </form>      
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Videodarslar</h3> 
                    <div class="table-responsive">    
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mavzu</th>
                                    <th>Tartib raqami</th>
                                    <th>Video URL</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($video as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item['cours_name'] }}</td>
                                    <td>{{ $item['lessen_number'] }}</td>
                                    <td>{{ $item['video_url'] }}</td>
                                    <td>
                                        <form action="{{ route('setting_video_delete') }}" method="post">
                                            @csrf 
                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                            <button class="btn btn-danger px-1 py-0"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan=5 class="text-center">Video darslar mavjud emas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table> 
                    </div>  
                </div>
            </div>
        </div>
    </div>
    

@endsection
