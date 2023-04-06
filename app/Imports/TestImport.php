<?php

namespace App\Imports;

use App\Models\TestTable;
use Maatwebsite\Excel\Concerns\ToModel;

class TestImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TestTable([
            'name'     => $row[0],
            'nickname'     => $row[1],
            'phone'     => $row[2],
            'address'     => $row[3],
        ]);
    }
}
