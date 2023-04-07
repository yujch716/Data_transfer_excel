<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;

    protected $table = "Posting";
    public $timestamps = false; //created_at, updated_at 컬럼 사용 안함

    protected $fillable = [
        'posting_id',
        'enterprise_id',
        'folder_id',
        'posting_title',
        'posting_field',
        'posting_position',
        'posting_work_info',
        'posting_qualification',
        'posting_advantage',
        'posting_benefits_welfare',
        'posting_career',
        'posting_request_file',
        'posting_add_question',
        'posting_deadline',
        'posting_step',
        'posting_member',
        'posting_color',
        'sort',
        'posting_date',
        'posting_time',
        'enterprise_type',
        'hidden_state',
        'close_state',
        'activate_state',
        'sample_state',
        'application_blocking',
        'posting_work_place'
    ];

}
