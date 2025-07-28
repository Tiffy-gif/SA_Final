@extends('layouts.template')

@section('pageTitle')
    Welcome to the best online shop in Cambodia
@endsection

@section('styleBlock')
    <link rel="stylesheet" href="{{asset('css/attendance.css')}}">
@endsection

@section('rightTitle')
    Index page
@endsection

@section('content')
  <section id="attendance-section" class="content-section">
        <h1>Record Student Attendance</h1>
        <p class="attendance-subtitle">
          Select date and class to mark attendance.
        </p>

        <div class="attendance-controls">
          <div class="control-group">
            <label for="attendance-date">Date:</label>
            <input type="date" id="attendance-date" value="2025-07-13" />
          </div>
          <div class="control-group">
            <label for="attendance-class">Class/Section:</label>
            <select id="attendance-class">
              <option value="">Select a Class</option>
              <option value="grade-10a">Grade 10A</option>
              <option value="grade-10b">Grade 10B</option>
              <option value="grade-11c">Grade 11C</option>
              <option value="grade-12d">Grade 12D</option>
            </select>
          </div>
          <button class="load-students-btn">Load Students</button>
        </div>

        <div class="attendance-list-container">
          <h2>Students for Grade 10A (2025-07-13)</h2>
          <table class="attendance-table">
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Present</th>
                <th>Absent</th>
                <th>Late</th>
                <th>Excused</th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $student)
              <tr>
                <td>{{ $student->name }}</td>
                  <td>
                      <input type="radio" name="{{ $student->id }}-attendance" value="present">
                  </td>
                  <td>
                      <input type="radio" name="{{ $student->id }}-attendance" value="absent">
                  </td>
                  <td>
                      <input type="radio" name="{{ $student->id }}-attendance" value="late">
                  </td>
                  <td>
                      <input type="radio" name="{{ $student->id }}-attendance" value="excused">
                  </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
          <button class="submit-attendance-btn primary">Save Attendance</button>
        </div>

        <div class="past-attendance-view">
          <h2>View Past Attendance</h2>
          <div class="control-group">
            <label for="past-attendance-filter-date-start">Date Range:</label>
            <input type="date" id="past-attendance-filter-date-start" /> -
            <input type="date" id="past-attendance-filter-date-end" />
          </div>
          <button class="filter-past-attendance-btn">Filter</button>
          <table class="past-attendance-table">
            <thead>
              <tr>
                
                <th>Date</th>
                <th>Class</th>
                <th>Student</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $student)
              <tr>                
                <td>{{ $student->dateOfBirth }}</td>
                <td>Grade 10A</td>
                <td>{{ $student->name }}</td>                
                <td>{{ $student->status }}</td>
                <td><button class="edit-btn">Edit</button></td>
              </tr>              
              @endforeach
            </tbody>
          </table>
        </div>
  </section>
@endsection