<?php
use App\Models\User;
use Carbon\Carbon;
$today = Carbon::today();
echo count(User::whereRaw("DATE_FORMAT(birthday, '%m-%d') = ?", [$today->format('m-d')])->get());