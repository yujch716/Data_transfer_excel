<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $table = "Applicant";
    public $timestamps = false; //created_at, updated_at 컬럼 사용 안함

    protected $fillable = [
        'applicant_id',
        'enterprise_id',
        'posting_id',
        'step_id',
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'applicant_re_url',
        'applicant_memo',
        'applicant_add_answer',
        'applicant_tag',
        'applicant_file',
        'sort',
        'application_date',
        'application_time',
        'applicant_check',
        'applicant_state',
        'applicant_history',
        'sample_state'
    ];

}
