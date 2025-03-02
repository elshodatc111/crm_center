<?php
    use App\Models\Varonka;
    echo count(Varonka::where('status', 'new')->get());
?>