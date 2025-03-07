@extends('layouts.app02')
@section('title','Tashrif Statistika')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Guruhlar Statistikasi</h4>
                <div class="table-responsive">
                    <table class="table table-bordered text-center justify-content-center" style="font-size:12px;">
                        <thead style="font-size:14px;">
                            <tr>
                                <th rowspan=2  class="bg-primary text-white">Guruhlar (Oxirgi 30 kunda yakunlangan guruhlar)</th>
                                <th rowspan=2  class="bg-primary text-white">Guruh talabalari</th>
                                <th colspan=2  class="bg-primary text-white">Dars vaqtlari</th>
                                <th colspan=4  class="bg-primary text-white">Darslarni davom etgan talabalar</th>
                                <th rowspan=2  class="bg-warning text-white">O'qituvchi</th>
                            </tr>
                            <tr>
                                <th class="bg-info text-white">Boshlangan vaqt</th>
                                <th class="bg-info text-white">Yakunlangan vaqti</th>
                                <th class="bg-success text-white">Umumiy soni</th>
                                <th class="bg-success text-white">Umumiy soni (%)</th>
                                <th class="bg-success text-white">To'lov qilganlar</th>
                                <th class="bg-success text-white">To'lov qilganlar(%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="text-align:left;"><a href="">Guruh nomi</a></th>
                                <td>125 000</td>
                                <td>125 000</td>
                                <td>125 000</td>
                                <td>125 000</td>
                                <td>125 000</td>
                                <td>125 000</td>
                                <td>125 000</td>
                                <td><a href="">O'qituvchi</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
