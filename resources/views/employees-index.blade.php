@extends('layouts.base-layout')

@section('content')
  <a href="{{ route('employee.create') }}">Add employee</a>
  <ul>
  @foreach ($employees as $employee)
    <li>
      <a href="{{ route('employee.show', $employee->id) }}">
        Employee's full name: {{ $employee->firstName }} {{ $employee->lastName }}
      </a>
      <br>
      Employee's tasks:
      <ul>
        @foreach ($employee->tasks as $task)
        <li>
            <a href="{{ route('employee.removeTaskFromEmployee', [$employee->id, $task->id]) }}">X</a> {{ $task->title }}
        </li>
        @endforeach
      </ul>
      <a href="{{ route('employee.edit', $employee->id) }}">Edit</a>
      <br>
      <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Delete</button>
      </form>
    </a>   
    </li>
    <br>
  @endforeach
  </ul>
@endsection
