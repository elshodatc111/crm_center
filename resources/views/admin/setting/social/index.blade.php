@extends('layouts.app02')
@section('title','Hududlar')
@section('content')
    <div class="pagetitle">
        <h1>Hududlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Hududlar</li>
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
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Hududlar</h3>  
                    <table class="table table-bordered text-center" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hudud nomi</th>
                                <th>Tashriflar soni</th>
                                <th>O'chirish</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($Social as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['count'] }}</td>
                                <td>
                                    <form action="{{ route('social_delete') }}" method="post">
                                        @csrf 
                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                        <button class="btn btn-danger px-1 py-0" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=4 class="text-center">Hududlar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>     
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Yangi hudud</h3>     
                    <form action="{{ route('social_store') }}" method="post">
                        @csrf 
                        <label for="name" class="mb-2">Yangi hudud nomi</label>
                        <input type="text" name="name" class="form-control" required>
                        <button class="btn btn-primary w-100 mt-2">Saqlash</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>

@endsection
