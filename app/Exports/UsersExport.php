<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromArray , WithHeadings
{

    public function array():array
    {
        $list = [];
        $users = User::select('full_name', 'email')->get();
        foreach($users as $user){
            $list[] = [$user->full_name,$user->email];
        }
        return $list;
    }
    public function headings(): array
    {
        return [
            'full_name',
            'email',
        ];
    }
}
