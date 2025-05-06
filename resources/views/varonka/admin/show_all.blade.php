@extends('layouts.app02')
@section('title','Hisobot')
@section('content')
    <div class="pagetitle">
        <h1>Hisobot</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                <li class="breadcrumb-item">Barcha murojatlar</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title w-100 mb-0 pb-0">
                        Barcha murojatlar
                    </h3>
                </div>
                <div class="col-3" style="text-align:right">
                    <button id='export' class="btn btn-primary mt-3" type="button">Print Excel</button>
                </div>
            </div>
                <div class="table-responsive pt-2">
                    <table class="table table-bordered text-center" id="table" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Murojatchi</th>
                                <th>Telefon raqam</th>
                                <th>Qo'shimcha telefon raqam</th>
                                <th>Manzil</th>
                                <th>Tug'ilgan kuni</th>
                                <th>Status</th>
                                <th>Sotsiol Tarmoq</th>
                                <th>Murojat vaqti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item['user_name'] }}</td>
                                    <td>{{ $item['phone1'] }}</td>
                                    <td>{{ $item['phone2'] }}</td>
                                    <td>{{ $item['address'] }}</td>
                                    <td>{{ $item['birthday'] }}</td>
                                    <td> 
                                        @if($item['status']=='new')
                                        Yangi
                                        @elseif($item['status']=='repeat')
                                        Takroriy murojat
                                        @elseif($item['status']=='pedding')
                                        Kutilmoqda
                                        @elseif($item['status']=='success')
                                        Qabul qilindi
                                        @else 
                                        Bekor qilindi
                                        @endif
                                    </td> 
                                    <td>
                                        @if($item['type_social'] == 'social_telegram')
                                        Telegram
                                        @elseif($item['type_social'] == 'social_facebook')
                                        Facebook
                                        @elseif($item['type_social'] == 'social_youtube')
                                        Youtube
                                        @elseif($item['type_social'] == 'social_banner')
                                        Bannerlar
                                        @elseif($item['type_social'] == 'social_tanish')
                                        Tanishlar
                                        @elseif($item['type_social'] == 'social_boshqa')
                                        Boshqa
                                        @endif
                                    </td>
                                    <td>{{ $item['created_at'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    

@endsection
