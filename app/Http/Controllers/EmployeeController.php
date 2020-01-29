<?php

namespace App\Http\Controllers;
use App\Employee;
use App\Task;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees-index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = Task::all();
        return view('employees-create', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $employee = Employee::create($data);
        $tasks = Task::find($data['tasks']);
        $employee
            ->tasks()
            ->attach($tasks);
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees-show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $tasks = Task::all();
        return view('employees-edit', compact('employee', 'tasks'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $employee = Employee::findOrFail($id);
        $employee->update($data);
        $tasks = Task::find($data['tasks']);
        $employee->tasks()->sync($tasks);
        return redirect()->route('employee.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->tasks()->detach();
        $employee->delete();
        return redirect()->route('employee.index');
    }

    public function removeTaskFromEmployee($empId, $tagId) {
        $employee = Employee::findOrFail($empId);
        $task = Task::findOrFail($tagId);
        $employee->tasks()->detach($task);
        return redirect()->route('employee.index');
    }
}
