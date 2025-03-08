@extends('layouts.app')
@section('title','Dashboard')
@section('content')

<div class="card">
    <div class="card-body">
        <h3 class="card-title w-100 text-center mb-0 pb-0">Dars Jadvali</h3>
        <div class="accordion accordion-flush" id="faq-group-2">
            @forelse($jadval as $key => $value)
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button {{ $key==0?'':'collapsed' }}" data-bs-target="#faqsTwo-{{ $key }}" type="button" data-bs-toggle="collapse">
                    {{ $value['date'] }} | {{ $value['day'] }}
                </button>
                </h2>
                <div id="faqsTwo-{{ $key }}" class="accordion-collapse {{ $key==0?'':'collapse' }}" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Guruh</th>
                                        <th>Dars Xonasi</th>
                                        <th>Dars vaqt</th>
                                        <th>O'quvchilar soni</th>
                                        <th>O'qituvchi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($value['item'] as $item)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td><a href="{{ route('create_show',$item['group_id']) }}">{{ $item['group_name'] }}</a></td>
                                        <td>{{ $item['room'] }}</td>
                                        <td>{{ $item['time'] }}</td>
                                        <td>{{ $item['count'] }}</td>
                                        <td><a href="{{ route('techer_show',$item['techer_id']) }}">{{ $item['techer_name'] }}</a></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan=6 class="text-center">Darslar mavjud emas.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @empty

            @endforelse
        </div>
    </div>
</div>

@endsection
