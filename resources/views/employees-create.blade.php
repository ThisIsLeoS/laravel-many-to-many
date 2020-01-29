@extends('layouts.base-layout')

@section('content')
  <form action="{{ route('employee.store') }}" method="POST">
    @csrf
    @method('POST')
    <label>First name:</label>
    <input type="text" name="firstName">
    <br><br>
    <label>Last name:</label>
    <input type="text" name="lastName"> 
    <br><br>
    <label>Tasks:</label>
    <br>
    <select name="tasks[]" multiple>
      @foreach ($tasks as $task)
        <option value="{{ $task->id }}">{{ $task->title }}</option>
      @endforeach
    </select>
    <br><br>
    <button>Create</button>
  </form>
@endsection
