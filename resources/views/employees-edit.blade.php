@extends('layouts.base-layout')

@section('content')
  <form action="{{ route('employee.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>First name:</label>
    <input type="text" name="firstName" value="{{ $employee->firstName }}"">
    <br><br>
    <label>Last name:</label>
    <input type="text" name="lastName" value="{{ $employee->lastName }}""> 
    <br><br>
    <label>Tasks:</label>
    <br>
    <select name="tasks[]" multiple>
      @foreach ($tasks as $task)
        <option value="{{ $task->id }}"
            @if ($employee->tasks()->find($task->id))
                selected
            @endif
        >{{ $task->title }}</option>
      @endforeach
    </select>
    <br><br>
    <button>Edit</button>
  </form>
@endsection
