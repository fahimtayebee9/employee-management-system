<?php

namespace App\Http\Controllers\Admin;

use App\Models\TaskForm;
use App\Http\Requests\StoreTaskFormRequest;
use App\Http\Requests\UpdateTaskFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\EmployeeRole;
use App\Models\TaskSubmission;

class TaskFormController extends Controller
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
                'menu_active' => 'task-forms',
                'page_title' => 'Task Forms',
                'page_title_description' => 'Manage Forms & Details',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Tasks' => route('admin.tasks.index'),
                    'Task Forms' => '',
                ],
            ]
        );
        $taskForms = TaskForm::all();
        return view('admin.tasks.forms.index', compact('taskForms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(
            [
                'menu_active' => 'task-forms',
                'page_title' => 'Task Forms',
                'page_title_description' => 'Manage Forms & Details',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Tasks' => route('admin.tasks.index'),
                    'Task Forms' => route('admin.tasks.forms.index'),
                    'Create' => '',
                ],
            ]
        );
        $designations = EmployeeRole::all();
        return view('admin.tasks.forms.create', compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskFormRequest $request)
    {
        $taskForm = TaskForm::create([
            'title'         => $request->title,
            'slug'          => Str::slug($request->title),
            'description'   => $request->description,
            'field_1_label' => $request->field_1_label,
            'field_1_type'  => $request->field_1_type,
            'field_2_label' => $request->field_2_label,
            'field_2_type'  => $request->field_2_type,
            'field_3_label' => $request->field_3_label,
            'field_3_type'  => $request->field_3_type,
            'field_4_label' => $request->field_4_label,
            'field_4_type'  => $request->field_4_type,
            'field_5_label' => $request->field_5_label,
            'field_5_type'  => $request->field_5_type,
            'field_6_label' => $request->field_6_label,
            'field_6_type'  => $request->field_6_type,
            'field_7_label' => $request->field_7_label,
            'field_7_type'  => $request->field_7_type,
            'field_8_label' => $request->field_8_label,
            'field_8_type'  => $request->field_8_type,
            'field_9_label' => $request->field_9_label,
            'field_9_type'  => $request->field_9_type,
            'field_10_label'=> $request->field_10_label,
            'field_10_type' => $request->field_10_type,
            'field_11_label'=> $request->field_11_label,
            'field_11_type' => $request->field_11_type,
            'field_12_label'=> $request->field_12_label,
            'field_12_type' => $request->field_12_type,
            'field_13_label'=> $request->field_13_label,
            'field_13_type' => $request->field_13_type,
            'field_14_label'=> $request->field_14_label,
            'field_14_type' => $request->field_14_type,
            'field_15_label'=> $request->field_15_label,
            'field_15_type' => $request->field_15_type,
            'designation_id'=> $request->designation_id,
            'status'        => $request->status,
        ]);

        return redirect()->route('admin.tasks.forms.index')->with([
            'message' => 'Task Form Created Successfully',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskForm  $taskForm
     * @return \Illuminate\Http\Response
     */
    public function show(TaskForm $taskForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskForm  $taskForm
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskForm $taskForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskFormRequest  $request
     * @param  \App\Models\TaskForm  $taskForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $taskForm)
    {
        $formObject = TaskForm::find($taskForm);
        $formObject->title = $request->title;
        $formObject->slug = Str::slug($request->title);
        $formObject->description = $request->description;
        $formObject->field_1_label = $request->field_1_label;
        $formObject->field_1_type = $request->field_1_type;
        $formObject->field_2_label = $request->field_2_label;
        $formObject->field_2_type = $request->field_2_type;
        $formObject->field_3_label = $request->field_3_label;
        $formObject->field_3_type = $request->field_3_type;
        $formObject->field_4_label = $request->field_4_label;
        $formObject->field_4_type = $request->field_4_type;
        $formObject->field_5_label = $request->field_5_label;
        $formObject->field_5_type = $request->field_5_type;
        $formObject->field_6_label = $request->field_6_label;
        $formObject->field_6_type = $request->field_6_type;
        $formObject->field_7_label = $request->field_7_label;
        $formObject->field_7_type = $request->field_7_type;
        $formObject->field_8_label = $request->field_8_label;
        $formObject->field_8_type = $request->field_8_type;
        $formObject->field_9_label = $request->field_9_label;
        $formObject->field_9_type = $request->field_9_type;
        $formObject->field_10_label = $request->field_10_label;
        $formObject->field_10_type = $request->field_10_type;
        $formObject->field_11_label = $request->field_11_label;
        $formObject->field_11_type = $request->field_11_type;
        $formObject->field_12_label = $request->field_12_label;
        $formObject->field_12_type = $request->field_12_type;
        $formObject->field_13_label = $request->field_13_label;
        $formObject->field_13_type = $request->field_13_type;
        $formObject->field_14_label = $request->field_14_label;
        $formObject->field_14_type = $request->field_14_type;
        $formObject->field_15_label = $request->field_15_label;
        $formObject->field_15_type = $request->field_15_type;
        $formObject->designation_id = $request->designation_id;
        $formObject->update();

        return redirect()->route('admin.tasks.forms.index')->with([
            'message' => 'Task Form Updated Successfully',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskForm  $taskForm
     * @return \Illuminate\Http\Response
     */
    public function destroy($taskForm)
    {
        $taskFormObject = TaskForm::find($taskForm);
        // check if form has any submissions in TaskSubmission table
        $taskSubmission = TaskSubmission::where('task_form_id', $taskFormObject->id)->first();
        if ($taskSubmission) {
            return redirect()->route('admin.tasks.forms.index')->with([
                'message' => 'Task Form has submissions and cannot be deleted',
                'alert-type' => 'error'
            ]);
        } else {
            $taskFormObject->delete();
            return redirect()->route('admin.tasks.forms.index')->with([
                'message' => 'Task Form Deleted Successfully',
                'alert-type' => 'success'
            ]);
        }
    }
}
