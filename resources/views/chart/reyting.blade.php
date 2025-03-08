@extends('layouts.app02')
@section('title','O\'qituvchi Reyting')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">O'qituvchilar reytingi</h4>
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-striped" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th rowspan="2">#</th>
                                <th rowspan="2">O‘qituvchi</th>
                                <th rowspan="2">Guruhlar soni</th>
                                <th colspan="3">Bitiruvchilar</th>
                                <th rowspan="2">Reyting</th>
                            </tr>
                            <tr>
                                <th>Guruhdagi talabalar soni</th>
                                <th>Darslarni davom ettirgan talabalar soni</th>
                                <th>Darslarni davom ettirib, to‘lov qilgan talabalar soni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($techer as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td style="text-align:left"><a href="{{ route('techer_show',$item['techer_id']) }}">{{ $item['techer'] }}</a></td>
                                <td>{{ $item['group_count'] }}</td>
                                <td>{{ $item['count_user'] }}</td>
                                <td>{{ $item['next_count_user'] }}</td>
                                <td>{{ $item['paymart_count_user'] }}</td>
                                <td>{{ $item['reyting'] }} %</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=7 class="text-center">O'qituvchilar mavjud emas.</td>
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
