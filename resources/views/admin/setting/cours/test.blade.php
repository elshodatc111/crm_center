@extends('layouts.app03')
@section('title','Kurs sozlamalari')
@section('content')
    <div class="pagetitle">
        <h1>Kurs sozlamalari</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('setting_cours') }}">Kurs sozlamalari</a></li>
                <li class="breadcrumb-item">Kurs sozlamalari</li>
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
                    <h3 class="card-title">Yangi kurs qo'shish</h3> 
                    <form action="{{ route('setting_cours_create') }}" method="post">
                        @csrf 
                        <label for="cours_name">Kursning nomi</label>
                        <input type="text" name="cours_name" required class="form-control my-2">
                        <button class="btn btn-primary w-100 mt-2">Kursni saqlash</button>
                    </form>      
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Kurslar</h3>    
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kurs nomi</th>
                                <th>Video Darslar soni</th>
                                <th>Testlar Soni</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>   
                </div>
            </div>
        </div>
    </div>
    

@endsection
