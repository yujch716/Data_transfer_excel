<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestTable extends Model
{
    use HasFactory;

    protected $table = "Test_table";

    public $timestamps = false; //created_at, updated_at 컬럼 사용 안함

    protected $fillable = [
        'name',
        'nickname',
        'phone',
        'address',
    ];


}
