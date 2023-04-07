<?php

namespace App\Http\Controllers;

use App\Imports\TestArrayImport;
use App\Models\Applicant;
use App\Models\Posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DataTransferController extends Controller
{
    public function applicantImport(Request $request){
        $file_name = $request->file('test')->getClientOriginalName();
        $posting_name = substr($file_name,0,strpos($file_name,'.'));

        $applicant_excel = Excel::toArray(new TestArrayImport, $request->file('test'))[0];
        unset($applicant_excel[0]);
        $array_key_list = $applicant_excel[1];
        $name_key = array_search('이름', $array_key_list);
        $application_key = array_search('작성일자', $array_key_list);
        $history_key = array_search('지원경로', $array_key_list);
        $email_key = array_search('이메일', $array_key_list);
        $phone_key = array_search('핸드폰번호', $array_key_list);
        $final_stage_key = array_search('최종단계', $array_key_list);
        $comment1_key = array_search('1차코멘트',$array_key_list);
        $comment2_key = array_search('2차코멘트',$array_key_list);
        unset($applicant_excel[1]);

        $applicant_sort = Applicant::where([['enterprise_id',$request->input('enterprise-id')],['posting_id',$request->input('posting-id')],['step_id',$request->input('step-id')]])->count();
        //$apply_route_title = array('직접 등록','기타','사람인','로켓펀치','잡코리아','비긴메이트','헤딩','잡플렉스','인크루트','커리어리','임펙트커리어','알바몬','알바천국','점핏','링크스타터','자소설닷컴','슈퍼루키','더팀스','링크드인','원티드','게임잡','네이버카페','카카오영입');
        foreach ($applicant_excel as $applicant){
            $application_date = str_replace('.','',$applicant[$application_key]);
            if (strlen($applicant[$history_key]) < 25){
                $applicant_re_url = $applicant[$history_key];
            }else{
                $applicant_re_url = '기타';
            }
            if ($final_stage_key == null){
                $final_stage = null;
            }else{
                $final_stage = '<p>'.$applicant[$final_stage_key].'</p><br>';
            }
            if ($comment1_key == null){
                $comment1 = null;
            }else{
                $comment1 = '</p><br>'.'<p>'.$applicant[$comment1_key].'</p><br>';
            }
            if($comment2_key == null){
                $comment2 = null;
            }else{
                $comment2 = $applicant[$comment2_key];
            }

            $insert_applicant = Applicant::create([
                'enterprise_id' => $request->input('enterprise-id'),
                'posting_id' => $request->input('posting-id'),
                'step_id' => $request->input('step-id'),
                'applicant_name' => $applicant[$name_key],
                'applicant_email' => $applicant[$email_key],
                'applicant_phone' => $applicant[$phone_key],
                'applicant_re_url' => $applicant_re_url,
                'applicant_memo' => json_encode($final_stage.$comment1.$comment2),
                'applicant_tag' => $posting_name,
                'sort' => $applicant_sort,
                'application_date' => date('Y-m-d',strtotime($application_date)),
                'application_time' => date('H:i:s',strtotime('00:00:00'))
            ]);
            if (!$insert_applicant){
                DB::rollBack();
                return '실패';
            }
            $applicant_sort = $applicant_sort + 1;
        }

        DB::commit();
        return '성공';
    }


    public function transferPosting(){
        DB::beginTransaction();
        $update_applicant = Applicant::where([['enterprise_id',483],['posting_id',1094]])
            ->update([
                'enterprise_id' => 404
            ]);
        if (!$update_applicant){
            DB::rollBack();
            return '실패';
        }

        $update_posting = Posting::where([['enterprise_id',483],['posting_id',1094]])
            ->update([
                'enterprise_id' => 404,
                'posting_member' => 'sffeg789w69weg0wf779few7few97f9',
                'sort' => 2
            ]);
        if (!$update_posting){
            DB::rollBack();
            return  '실패';
        }

        DB::commit();
        return '성공';

    }

}
