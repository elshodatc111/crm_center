@extends('layouts.app02')
@section('title','Guruh Statistika')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">O'qituvchi talabalar</h4>
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-striped justify-content-center" style="font-size:14px;">
                        <thead style="font-size:14px;">
                            <tr>
                                <th rowspan=2>#</th>
                                <th rowspan=2>O'qituvchi</th>
                                <th colspan=2>O'tgan davr ({{ $return['oldMonth'] }})</th>
                                <th colspan=2>Hozirgi davr ({{ $return['nowMonth'] }})</th>
                            </tr>
                            <tr>
                                <th>Guruhlar soni</th>
                                <th>Talabalar soni</th>
                                <th>Guruhlar soni</th>
                                <th>Talabalar soni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($return['teachers'] as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['techer'] }}</td>
                                <td>{{ $item['old']['group_count'] }}</td>
                                <td>{{ $item['old']['user_count'] }}</td>
                                <td>{{ $item['now']['group_count'] }}</td>
                                <td>{{ $item['now']['user_count'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
