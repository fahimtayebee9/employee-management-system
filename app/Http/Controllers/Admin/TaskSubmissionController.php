<?php

namespace App\Http\Controllers;

use App\Models\TaskSubmission;
use App\Http\Requests\StoreTaskSubmissionRequest;
use App\Http\Requests\UpdateTaskSubmissionRequest;

class TaskSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskSubmissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskSubmissionRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskSubmission  $taskSubmission
     * @return \Illuminate\Http\Response
     */
    public function show(TaskSubmission $taskSubmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskSubmission  $taskSubmission
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskSubmission $taskSubmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskSubmissionRequest  $request
     * @param  \App\Models\TaskSubmission  $taskSubmission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskSubmissionRequest $request, TaskSubmission $taskSubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskSubmission  $taskSubmission
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskSubmission $taskSubmission)
    {
        //
    }
}
