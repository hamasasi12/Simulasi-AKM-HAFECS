<?php

namespace App\Http\Controllers\Import;

use Illuminate\Http\Request;
use App\Imports\QuestionsImportSD;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ImportSoalSDController extends Controller
{
    public function import(Request $request) {
        $request->validate([
        'file' => 'required|file|mimes:xlsx,xls',
    ]);

    Excel::import(new QuestionsImportSD, $request->file('file'));
    
    Alert::success('Soal berhasil di-import!');
    return back()->with('success', 'Soal berhasil di-import!');
    }
}
