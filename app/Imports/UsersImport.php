<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return int
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        $row = array_values($row);
        $user = new User([
            'full_name'    => $row[0],
            'phone_number' => $row[1],
            'email'        => $row[2],
        ]);
        return $user;
    }
}
