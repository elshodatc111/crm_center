@extends('layouts.app02')
@section('title','Eslatmalar')
@section('content')
    <div class="pagetitle">
        <h1>Eslatmalar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Eslatmalar</li>
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
                <div class="col-6">Eslatmalar</div>
            </div>
            <div class="table-responsive">
                <table class="table-bordered table table-striped table-hover text-center" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Eslatma matni</th>
                            <th>Eslatma vaqti</th>
                            <th>Meneger</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($array as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td><a href="{{ route('student_show',$item['user_id']) }}">{{ $item['name'] }}</a></td>
                                <td>{{ $item['message'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                                <td>{{ $item['admin'] }}</td>
                                <td>
                                    <form action="{{ route('user_eslatmalar_trash') }}" method="post">
                                        @csrf 
                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                        <button type="submit" class="btn btn-danger p-0 px-1"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan=6 class="text-center">Eslatmalar mavjud emas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
