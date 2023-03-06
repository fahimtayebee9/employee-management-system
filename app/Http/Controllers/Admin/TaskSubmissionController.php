<?php

namespace App\Http\Controllers\Admin;

use App\Models\TaskSubmission;
use App\Http\Requests\StoreTaskSubmissionRequest;
use App\Http\Requests\UpdateTaskSubmissionRequest;
use App\Models\Employee;
use App\Models\TaskForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeRole;
use App\Models\User;
use PhpParser\Node\Expr\Cast\Object_;

class TaskSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(
            [
                'menu_active' => 'task-submissions',
                'page_title' => 'Task Submissions',
                'page_title_description' => 'Manage and View Submissions',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Tasks' => ''
                ],
            ]
        );

        $taskForms = TaskForm::all();
        $taskSubmissions = TaskSubmission::orderby('id', 'desc')->paginate(10);
        $employees = Employee::all();
        $designations = EmployeeRole::all();
        return view('admin.tasks.index', compact('taskSubmissions', 'employees', 'taskForms', 'designations'));
    }

    public function getByDate($request)
    {
        $taskSubmissions = TaskSubmission::orderby('id', 'desc')->whereDate('created_at', $request)->get();
        $employees = Employee::all();
        $taskForms = TaskForm::all();
        $designations = EmployeeRole::all();

        return response()->json([
            'taskSubmissions' => $taskSubmissions,
            'employees' => $employees,
            'taskForms' => $taskForms,
            'users' => User::all(),
            'designations' => $designations,
        ]);
    }

    public function getbyDesignation($request)
    {
        $taskSubmissions = TaskSubmission::orderby('id', 'desc')->get();
        
        // filter by designation
        $tasks_by_designation = [];
        foreach ($taskSubmissions as $task) {
            if($request == $task->employee->designation_id){
                $tasks_by_designation[] = $task;
            }
        }
        $taskSubmissions = collect($tasks_by_designation);
        $employees = Employee::all();
        $taskForms = TaskForm::all();
        $designations = EmployeeRole::all();

        return response()->json([
            'taskSubmissions' => $taskSubmissions,
            'employees' => $employees,
            'taskForms' => $taskForms,
            'users' => User::all(),
            'designations' => $designations,
        ]);
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
