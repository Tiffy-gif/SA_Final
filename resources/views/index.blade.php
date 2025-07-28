@extends('layouts.template')

@section('pageTitle')
    Welcome to the best online shop in Cambodia
@endsection

@section('styleBlock')
    <link rel="stylesheet" href="{{ asset('css/report.css') }}">
@endsection

@section('rightTitle')
    Index page
@endsection

@section('content')
    <div class="container">
        <h1>Student Attendance Report</h1>

        <!-- Filter Section -->
        <div class="filter-section">
            <!-- Class Name Filter -->
            <div>
                <label for="className">Class Name:</label>
                <select id="className">
                    <option value="">Select Class</option>
                    <option value="10A">10A</option>
                    <option value="10B">10B</option>
                    <option value="11A">11A</option>
                    <option value="12C">12C</option>
                </select>
            </div>

            <!-- Start Date Filter -->
            <div>
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate">
            </div>

            <!-- End Date Filter -->
            <div>
                <label for="endDate">End Date:</label>
                <input type="date" id="endDate">
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <button id="generateReportBtn" class="btnQR">
                Generate Report
            </button>
            <button id="exportReportBtn" class="btnQR">
                Export Report (CSV)
            </button>
        </div>

        <!-- Report Table Section -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Student Name</th>
                        <th scope="col">Class</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody id="attendanceTableBody">
                    <!-- Report data will be inserted here by JavaScript -->
                    <tr>
                        <td colspan="4" class="text-center text-gray-500">
                            Select filters and click "Generate Report" to see attendance data.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Message Box for alerts -->
        <div id="messageBox" class="message-box hidden">
            <div class="message-box-content">
                <p id="messageText"></p>
                <button id="messageBoxCloseBtn">OK</button>
            </div>
        </div>
    </div>
@endsection
