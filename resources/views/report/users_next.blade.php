@extends('layouts.app02')
@section('title','Talabalar')
@section('content')
    <div class="pagetitle">
        <h1>Hisobot</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('report_users') }}">Talabalar</a></li>
                <li class="breadcrumb-item">Hisobot</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h3 class="card-title w-100 mb-0 pb-0">
                        @if($type=='all')
                            Barcha Talabalar
                        @elseif($type=='debet')
                            Qarzdor Talabalar
                        @elseif($type=='active')
                            Aktiv talabalar ({{ $active['count'] }})
                        @endif
                    </h3>
                </div>
                <div class="col-6" style="text-align:right">
                    <button id='export' class="btn btn-primary mt-3" type="button">Print Excel</button>
                </div>
            </div>
            <div class="table-responsive pt-2">
                @if($type=='all')
                    <table class="table table-bordered text-center" id="table" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Talaba FIO</th>
                                <th>Telefon raqami</th>
                                <th>Telefon raqami</th>
                                <th>Address</th>
                                <th>Tug'ilgan kun</th>
                                <th>Talaba haqida</th>
                                <th>Guruhlar soni</th>
                                <th>Login</th>
                                <th>Balans</th>
                                <th>Ro'yhatga olindi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($all as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['phone1'] }}</td>
                                <td>{{ $item['phone2'] }}</td>
                                <td>{{ $item['address'] }}</td>
                                <td>{{ $item['birthday'] }}</td>
                                <td>{{ $item['about'] }}</td>
                                <td>{{ $item['group_count'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['balans'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=11 class="text-center">Talabalar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                @elseif($type=='debet')
                    <table class="table table-bordered text-center" id="table" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Talaba FIO</th>
                                <th>Telefon raqami</th>
                                <th>Telefon raqami</th>
                                <th>Address</th>
                                <th>Tug'ilgan kun</th>
                                <th>Talaba haqida</th>
                                <th>Guruhlar soni</th>
                                <th>Login</th>
                                <th>Qarzdorlik</th>
                                <th>Ro'yhatga olindi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($debit as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['phone1'] }}</td>
                                <td>{{ $item['phone2'] }}</td>
                                <td>{{ $item['address'] }}</td>
                                <td>{{ $item['birthday'] }}</td>
                                <td>{{ $item['about'] }}</td>
                                <td>{{ $item['group_count'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['balans'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=11 class="text-center">Qarzdor talabalar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                @elseif($type=='active')
                    <table class="table table-bordered text-center" id="table" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Guruh</th>
                                <th>Guruh boshlanish vaqti</th>
                                <th>Guruh yakunlanish vaqti</th>
                                <th>Talaba FIO</th>
                                <th>Talaba haqida</th>
                                <th>Talaba balansi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($active['users'] as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['group_name'] }}</td>
                                <td>{{ $item['lessen_start'] }}</td>
                                <td>{{ $item['lessen_end'] }}</td>
                                <td>{{ $item['user_name'] }}</td>
                                <td>{{ $item['about'] }}</td>
                                <td>{{ $item['balans'] }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=7 class="text-center">Joriy oyda active talabalar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                @endif
                
            </div>
        </div>
    </div>
    

@endsection
