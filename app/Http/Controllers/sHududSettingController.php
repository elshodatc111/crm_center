<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;
use App\Http\Requests\StoreHududRequest;
class sHududSettingController extends Controller
{
    public function index(){
        $Social = Social::get();
        return view('admin.setting.social.index',compact('Social'));
    }
    public function store(StoreHududRequest $request){
        Social::create([
            'name' => $request->name,
            'count' => 0,
        ]);
        return redirect()->back()->with('success', 'Hudud muvaffaqiyatli saqlandi!');
    }
    public function destroy($id){
        $hudud = Social::findOrFail($id);
        $hudud->delete();
        return redirect()->back()->with('success', 'Hudud muvaffaqiyatli o‘chirildi!');
    }

}
