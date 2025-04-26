@extends('layouts.app03')
@section('title','Kurs audiolar')
@section('content')
    <div class="pagetitle">
        <h1>{{ $cours['cours_name'] }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('setting_cours') }}">Kurs sozlamalari</a></li>
                <li class="breadcrumb-item">Kurs audiolar</li>
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
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Yangi audio qo'shish</h3> 
                    <form action="{{ route('setting_audio_create') }}" method="post">
                        @csrf 
                        <input type="hidden" name="cours_id" value="{{ $cours['id'] }}">
                        <label for="audio_name">Audio nomi</label>
                        <input type="text" name="audio_name" required class="form-control my-2">
                        <label for="audio_number">Audio tartib raqami</label>
                        <input type="number" name="audio_number" required class="form-control my-2">
                        <label for="audio_url">Audio url manzili</label>
                        <input type="text" name="audio_url" required class="form-control my-2">
                        <button type="submit" class="btn btn-primary w-100 mt-2">Testni saqlash</button>
                    </form>      
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Testlar</h3>
                    <div class="table-responsive">    
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Audio nomi</th>
                                    <th>Audio URL</th>
                                    <th>Audio tartib raqami</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($audio as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item['audio_name'] }}</td>
                                        <td>{{ $item['audio_url'] }}</td>
                                        <td>{{ $item['audio_number'] }}</td>
                                        <td>
                                            <form action="{{ route('setting_audio_delete') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                <button type="submit" class="btn btn-danger p-0 px-1">O'chirish</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Hech qanday audio mavjud emas</td>
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
