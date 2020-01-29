@extends('layouts.base-layout')

@section('content')
    <ul>
        <li>
            Employee's full name: {{ $employee->firstName }} {{ $employee->lastName }}
        </li>
        <li>
        Employee's tasks:
            <ul>
                @foreach ($employee->tasks as $task)
                    <li>
                        Task's title: {{ $task->title }} <br>
                    </li>
                    <li>
                        Task's description: {{ $task->description }}
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
@endsection