@extends('layouts.app02')
@section('title','Tug\'ilgan kunlar')
@section('content')
    <div class="pagetitle">
        <h1>Tug'ilgan kunlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Tug'ilgan kunlar</li>
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
            <div class="row card-title">
                <div class="col-6">Tug'ilgan kunlar</div>
            </div>
            <div class="table-responsive">
                <table class="table-bordered table table-striped table-hover text-center" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>FIO</th>
                            <th>Lavozim</th>
                            <th>Telefon raqam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item['user_name'] }}</td>
                            <td>
                                @if($item['type'] == 'admin')
                                    Drektor
                                @elseif($item['type'] == 'sAdmin')
                                    Boshqaruvchi
                                @elseif($item['type'] == 'meneger')
                                    Menejeri
                                @elseif($item['type'] == 'techer')
                                    O'qituvchi
                                @elseif($item['type'] == 'student')
                                    Talaba
                                @endif
                            </td>
                            <td>{{ $item['phone1'] }}</td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
