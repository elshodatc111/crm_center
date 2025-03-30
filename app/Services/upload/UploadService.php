<?php

namespace App\Services\upload;

use Maatwebsite\Excel\Facades\Excel;  // <-- Add this line
use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserHistory;
use App\Models\Group;
use App\Models\Kassa;
use App\Models\GroupUser;
use App\Models\SettingPaymart;
use App\Models\Paymart;
use App\Models\UploadUser;
use App\Models\MenegerChart;
use App\Models\SettingChegirma;
use App\Jobs\PaymartMessageWork;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UploadService {

    public function upload(String $text) {
        $filePath = storage_path('app/public/uploads/' . $text); 
        if (!file_exists($filePath)) {
            return "File not found!";
        }
        $data = Excel::toArray([], $filePath);  // <-- This is where you need Excel facade
        $count = 0;
        $success = 0;
        $error = 0;
        foreach ($data as $sheetIndex => $sheetData) {
            foreach ($sheetData as $rowIndex => $row) {
                if ($row[0] > 0) {
                    $count++;
                    $birthday = $row[5];
                    if (is_numeric($birthday)) {
                        $birthday = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($birthday);
                        $birthday = $birthday->format('Y-m-d');
                    }
                    $existingUser = User::where('type', $row[9])
                        ->where('phone1', $row[2])
                        ->first();
                    if (!$existingUser) {
                        $success++;
                        $User = User::create([
                            'user_name' => $row[1],
                            'phone1' => $row[2],
                            'phone2' => $row[3],
                            'address' => $row[4],
                            'birthday' => $birthday,
                            'about' => $row[6],
                            'group_count' => $row[7],
                            'email' => $row[8],
                            'type' => $row[9],
                            'status' => $row[10],
                            'password' => Hash::make('password'),
                            'balans' => $row[11],
                        ]);
                        UserHistory::create([
                            'user_id' => $User->id,
                            'type' => 'visited',
                            'type_commit' => $row[12],
                            'admin_id' => 1,
                        ]);
                    } else {
                        $error++;
                    }
                }
            }
        }
        return "Count: " . $count . ", Success: " . $success . ", Error: " . $error;
    }
    
    public function getFiles(){
        return UploadUser::orderBy('id','desc')->get();
    }

    public function uploadExcel(Request $request){
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls|max:512',
        ]);
        $file = $request->file('excel_file');
        $fileName = 'file_' . now()->format('Y-m-d_H-i-s') . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('uploads', $fileName, 'public');
        UploadUser::create([
            'file_name' => $fileName,
            'admin'=> auth()->user()->user_name,
        ]);
        return $filePath;
    }

    public function trashUplads(int $id){
        $UploadUser = UploadUser::find($id);
        $UploadUser->commint = "bekor qilindi";
        $UploadUser->status = "trash";
        return $UploadUser->save();
    }

    public function runUplads(int $id){
        $UploadUser = UploadUser::find($id);
        $UploadUser->commint = $this->upload($UploadUser->file_name);
        $UploadUser->status = "success";
        return $UploadUser->save();
    }
}
