@extends('layouts.app03')
@section('title','Kurs testlari')
@section('content')
    <div class="pagetitle">
        <h1>{{ $cours['cours_name'] }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('setting_cours') }}">Kurs sozlamalari</a></li>
                <li class="breadcrumb-item">Kurs testlari</li>
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
                    <h3 class="card-title">Yangi test qo'shish</h3> 
                    <form action="{{ route('setting_test_create') }}" method="post">
                        @csrf 
                        <input type="hidden" name="cours_id" value="{{ $cours['id'] }}">
                        <label for="test">Test Savoli</label>
                        <input type="text" name="test" required class="form-control my-2">
                        <label for="javob_true">To'g'ri javob</label>
                        <input type="text" name="javob_true" required class="form-control my-2">
                        <label for="javob_false_first">Noto'g'ri javob</label>
                        <input type="text" name="javob_false_first" required class="form-control my-2">
                        <label for="javob_false_two">Noto'g'ri javob</label>
                        <input type="text" name="javob_false_two" required class="form-control my-2">
                        <label for="javob_false_thre">Noto'g'ri javob</label>
                        <input type="text" name="javob_false_thre" required class="form-control my-2">
                        <button type="submit" class="btn btn-primary w-100 mt-2">Testni saqlash</button>
                    </form>      
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Testlar</h3>    
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Savol</th>
                                <th>To'g'ri javob</th>
                                <th>Noto'g'ri javob</th>
                                <th>Noto'g'ri javob</th>
                                <th>Noto'g'ri javob</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($test as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item['test'] }}</td>
                                    <td>{{ $item['javob_true'] }}</td>
                                    <td>{{ $item['javob_false_first'] }}</td>
                                    <td>{{ $item['javob_false_two'] }}</td>
                                    <td>{{ $item['javob_false_thre'] }}</td>
                                    <td>
                                        <form action="{{ route('setting_test_delete') }}" method="post">
                                            @csrf 
                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                            <button class="btn btn-danger px-1 py-0"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan=7 class="text-center">Testlar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>   
                </div>
            </div>
        </div>
    </div>
    

@endsection
