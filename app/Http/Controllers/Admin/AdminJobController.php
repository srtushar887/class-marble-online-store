<?php

namespace App\Http\Controllers\Admin;

use App\apply_job;
use App\Http\Controllers\Controller;
use App\job;
use App\virtual_ture;
use Illuminate\Http\Request;

class AdminJobController extends Controller
{
    public function jobs()
    {
        $jobs = job::orderBy('id','desc')->get();
        return view('admin.job.jobs',compact('jobs'));
    }

    public function jobs_create(Request $request)
    {
        $new_job = new job();
        $new_job->job_title = $request->job_title;
        $new_job->job_exp = $request->job_exp;
        $new_job->posistion_number = $request->posistion_number;
        $new_job->job_skill = $request->job_skill;
        $new_job->job_des = $request->job_des;
        $new_job->save();

        return back()->with('success','Job Successfully Created');

    }

    public function jobs_update(Request $request)
    {
        $job_edit = job::where('id',$request->edit_job_id)->first();
        $job_edit->job_title = $request->job_title;
        $job_edit->job_exp = $request->job_exp;
        $job_edit->posistion_number = $request->posistion_number;
        $job_edit->job_skill = $request->job_skill;
        $job_edit->job_des = $request->job_des;
        $job_edit->save();

        return back()->with('success','Job Successfully Updated');
    }

    public function jobs_delete(Request $request)
    {
        $job_delete = job::where('id',$request->job_delete_id)->first();
        $job_delete->delete();
        return back()->with('success','Job Successfully Deleted');
    }

    public function jobs_applied_user()
    {
        $jobs = apply_job::orderBy('id','desc')->get();
        return view('admin.job.jobsApplied',compact('jobs'));
    }


    public function virtual_tour_user()
    {
        $jobs = virtual_ture::orderBy('id','desc')->get();
        return view('admin.job.virtualToureUser',compact('jobs'));
    }

    public function jobs_applied_user_delete(Request $request)
    {
        $delete_data = apply_job::where('id',$request->apply_job_delete_id)->first();
        $delete_data->delete();
        return back()->with('success','Applied Job Deleted');

    }

    public function virtual_tour_user_delete(Request $request)
    {
        $delete_data = virtual_ture::where('id',$request->virtual_job_delete_id)->first();
        $delete_data->delete();
        return back()->with('success','Virtual Tour User Deleted');
    }





}
