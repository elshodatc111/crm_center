@extends('layouts.app02')
@section('title','Tashrif Statistika')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Guruhlar Statistikasi</h4>
                <div class="table-responsive">
                    <table class="table table-bordered text-center justify-content-center" style="font-size:14px;">
                        <thead style="font-size:14px;">
                            <tr>
                                <th rowspan=2>Guruhlar (Oxirgi 30 kunda yakunlangan guruhlar)</th>
                                <th colspan=2>Dars vaqtlari</th>
                                <th rowspan=2>Guruh talabalari</th>
                                <th colspan=2>Darslarni davom etgan talabalar</th>
                                <th rowspan=2>O'qituvchi</th>
                            </tr>
                            <tr>
                                <th>Boshlangan vaqt</th>
                                <th>Yakunlangan vaqti</th>
                                <th>Umumiy soni</th>
                                <th>To'lov qilganlar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($item as $items)
                            <tr>
                                <th><a href="{{ route('create_show',$items['group_id']) }}">{{ $items['group_name'] }}</a></th>
                                <td>{{ $items['lessen_start'] }}</td>
                                <td>{{ $items['lessen_end'] }}</td>
                                <td>{{ $items['user_count'] }}</td>
                                <td>{{ $items['next_count'] }}</td>
                                <td>{{ $items['paymart_count'] }}</td>
                                <td><a href="{{ route('techer_show',$items['techer_id']) }}">{{ $items['techer'] }}</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan=7 class="text-center">30 kun davomida yakunlangan guruhlar mavjud emas.</td>
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
