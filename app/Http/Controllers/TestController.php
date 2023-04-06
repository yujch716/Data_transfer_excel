<?php

namespace App\Http\Controllers;

use App\Imports\TestArrayImport;
use App\Imports\TestImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TestController extends Controller
{
    public function testImport()
    {
        Excel::import(new TestImport, 'test.xlsx');

        return '성공';
    }


    public function testArray()
    {
        $array = Excel::toArray(new TestArrayImport, 'test.xlsx');

        return $array;
    }

    public function testCollection()
    {
        $array = Excel::toCollection(new TestArrayImport, 'test.xlsx');

        return $array;
    }

}
