@extends('layouts.template')

@section('pageTitle')
    Welcome to the best online shop in Cambodia
@endsection

@section('styleBlock')
    <link rel="stylesheet" href="{{asset('css/studentlist.css')}}">
@endsection

@section('rightTitle')
    Index page
@endsection

@section('content')
    <section id="attendance-section" class="content-section">
        <h1>All Students</h1>

    <table border="1" cellpadding="30">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Address</th>
            <th>Status</th>
            <th>Phone</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->gender }}</td>
            <td>{{ $student->dateOfBirth }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->status }}</td>
            <td>{{ $student->phoneNumber }}</td>
        </tr>
        @endforeach
    </table>
    </section>
@endsection
