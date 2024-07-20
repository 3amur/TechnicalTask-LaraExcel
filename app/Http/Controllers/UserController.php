<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport(), 'ExportUsers.xlsx');
    }

    public function importview()
    {
        return view('dashboard.users.add');
    }
    
    public function import(Request $request)
    {
        $request->validate([
            'fileexcel' => 'required',
        ]);
        Excel::import(new UsersImport, $request->file('fileexcel'), null, \Maatwebsite\Excel\Excel::XLSX);

        return back()->with('success', 'File has been Imported Successfully');
    }
}
