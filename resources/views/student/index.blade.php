@extends('layouts.app01')
@section('title','Tashriflar')
@section('content')
    <div class="pagetitle">
        <h1>Tashriflar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Tashriflar</li>
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
                <div class="col-6">Tashriflar</div>
                <div class="col-6" style="text-align:right">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVisitModal"><i class="bi bi-plus"></i> Yangi Tashrif</button>
                </div>
            </div>
            <form action="{{ route('all_student') }}" method="get">
                <input type="text" name="search" class="form-control mb-3" placeholder="Ism yoki telefon raqamini kiriting...">
            </form>
            <div id="userTable">
                <table class="table table-bordered" style="font-size:14px;">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Ism</th>
                            <th>Telefon</th>
                            <th>Manzil</th>
                            <th>Balans</th>
                            <th>Guruhlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td class="text-center">{{ $users->firstItem() + $index }}</td>
                                <td><a href="{{ route('student_show', $user->id ) }}">{{ $user->user_name }}</a></td>
                                <td>{{ $user->phone1 }}</td>
                                <td>{{ $user->address }}</td>
                                <td class="text-center">
                                    @if($user['balans']>=0)
                                        <b class="text-success">{{ number_format($user['balans'], 0, '.', ' ') }} so'm</b>
                                    @else
                                        <b class="text-danger">{{ number_format($user['balans'], 0, '.', ' ') }} so'm</b>
                                    @endif
                                </td>
                                <td class="text-center">{{ $user->group_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addVisitModal" tabindex="-1" aria-labelledby="addVisitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVisitModalLabel">Yangi Tashrif qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student_store') }}" method="POST" id="visitForm">
                        @csrf
                        <div class="mb-1">
                            <label for="user_name" class="form-label">Ism Familya</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}" required>
                            @error('user_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="phone1" class="form-label">Telefon raqam 1</label>
                            <input type="text" class="form-control phone" 
                            name="phone1" value="{{ old('phone2')==null?'+998':old('phone2') }}" required id="phone1">
                            @error('phone1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span id="phone1-error" class="text-danger" style="display:none;">Bu telefon raqami oldin ro'yxatdan o'tgan!</span>
                        </div>
                        <div class="mb-1">
                            <label for="phone2" class="form-label">Telefon raqam 2</label>
                            <input type="text" class="form-control phone" name="phone2" value="{{ old('phone2')==null?'+998':old('phone2') }}" id="phone2">
                            @error('phone2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="address" class="form-label">Yashash manzili</label>
                            <select class="form-select" name="address" required>
                                <option value="" disabled selected>Tanlang...</option>
                                <option value="Qarshi_sh" @if(old('address') == 'Qarshi_sh') selected @endif>Qarshi shahar</option>
                                <option value="Shahrisabz_sh" @if(old('address') == 'Shahrisabz_sh') selected @endif>Shahrisabz shahar</option>
                                <option value="Dehqonobod" @if(old('address') == 'Dehqonobod') selected @endif>Dehqonobod tumani</option>
                                <option value="G'uzor" @if(old('address') == "G'uzor") selected @endif>G'uzor tumani</option>
                                <option value="Kasbi" @if(old('address') == 'Kasbi') selected @endif>Kasbi tumani</option>
                                <option value="Kitob" @if(old('address') == 'Kitob') selected @endif>Kitob tumani</option>
                                <option value="Koson" @if(old('address') == 'Koson') selected @endif>Koson tumani</option>
                                <option value="Mirishkor" @if(old('address') == 'Mirishkor') selected @endif>Mirishkor tumani</option>
                                <option value="Muborak" @if(old('address') == 'Muborak') selected @endif>Muborak tumani</option>
                                <option value="Nishon" @if(old('address') == 'Nishon') selected @endif>Nishon tumani</option>
                                <option value="Qamashi" @if(old('address') == 'Qamashi') selected @endif>Qamashi tumani</option>
                                <option value="Yakkabog'" @if(old('address') == "Yakkabog") selected @endif>Yakkabog' tumani</option>
                                <option value="Chiroqchi" @if(old('address') == 'Chiroqchi') selected @endif>Chiroqchi tumani</option>
                                <option value="Shahrisabz" @if(old('address') == 'Shahrisabz') selected @endif>Shahrisabz tumani</option>
                            </select>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="about_me" class="form-label">Biz haqimizda</label>
                            <select class="form-select" name="about_me" required>
                                <option value="" disabled selected>Tanlang...</option>
                                <option value="social_telegram" @if(old('about_me') == 'social_telegram') selected @endif>Telegram</option>
                                <option value="social_instagram" @if(old('about_me') == 'social_instagram') selected @endif>Instagram</option>
                                <option value="social_facebook" @if(old('about_me') == 'social_facebook') selected @endif>Facebook</option>
                                <option value="social_youtube" @if(old('about_me') == 'social_youtube') selected @endif>Youtube</option>
                                <option value="social_banner" @if(old('about_me') == 'social_banner') selected @endif>Bannerlar</option>
                                <option value="social_tanish" @if(old('about_me') == 'social_tanish') selected @endif>Tabishlar</option>
                                <option value="social_boshqa" @if(old('about_me') == 'social_boshqa') selected @endif>Boshqa</option>
                            </select>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="birthday" class="form-label">Tug'ilgan sana</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday') }}" required>
                            @error('birthday')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            
                            <span id="birthday-error" class="text-danger" style="display:none;">Bu foydalanuvchi 10 yoshdan kichik!</span>
                        </div>
                        <div class="mb-1">
                            <label for="about" class="form-label">Tashrif haqida</label>
                            <textarea class="form-control" id="about" name="about">{{ old('about') }}</textarea>
                            @error('about')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100" id="submit-btn">Tashrifni saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script>
        $(".phone").inputmask("+998 99 999 9999");
        $('#phone1').on('blur', function() {
            var phone1 = $(this).val();
            $.ajax({
                url: '{{ route('checkPhoneExist') }}',
                type: 'GET',
                data: { phone1: phone1 },
                success: function(response) {
                    if (response.exists) {
                        $('#phone1-error').show();
                        $('#phone1').addClass('is-invalid');
                    } else {
                        $('#phone1-error').hide();
                        $('#phone1').removeClass('is-invalid');
                    }
                }
            });
        });

        $('#birthday').on('change', function() {
            var birthday = $(this).val();
            var birthDate = new Date(birthday);
            var currentDate = new Date();
            var age = currentDate.getFullYear() - birthDate.getFullYear();
            var m = currentDate.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && currentDate.getDate() < birthDate.getDate())) {
                age--;
            }
            if (age < 10) {
                $('#birthday-error').show();
                $('#submit-btn').prop('disabled', true);
            } else {
                $('#birthday-error').hide();
                $('#submit-btn').prop('disabled', false);
            }
        });
    </script>
@endsection
