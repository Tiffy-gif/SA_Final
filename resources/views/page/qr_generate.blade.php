@extends('layouts.template')

@section('pageTitle')
    Welcome to the best online shop in Cambodia
@endsection

@section('styleBlock')
    <script src="{{ asset('js/filter.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/qr.css') }}">
    <!-- Tailwind CSS CDN - Ensure this is loaded in your layouts.template if not already -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inter font from Google Fonts - Ensure this is loaded in your layouts.template if not already -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
@endsection

@section('rightTitle')
    Index page
@endsection

@section('content')
    <!-- QR Generator Section (Teacher View) -->
    <div class="container">
        <div class="form-group">
            <div class="form-field">
                <label for="select-date">Select Date:</label>
                <input type="date" id="select-date" value="2025-07-17">
            </div>
            <div class="form-field">
                <label for="select-session">Select Session:</label>
                <select id="select-session">
                    <option value="morning">Morning</option>
                    <option value="afternoon">Afternoon</option>
                    <option value="evening">Evening</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="form-field">
                <label for="select-class">Select Class Name:</label>
                <select id="select-class" class="selection">
                    <option value="grade-9-a">Grade 9 A</option>
                    <option value="grade-9-b">Grade 9 B</option>
                    <option value="grade-10-a">Grade 10 A</option>
                    <option value="grade-10-b">Grade 10 B</option>
                    <option value="grade-11-a">Grade 11 A</option>
                </select>
            </div>
            <div class="form-field">
                <label for="select-mentor">Mentor By (Teacher Name):</label>
                <select id="select-mentor" class="selection">
                    <option value="mr-smith">Mr. Smith</option>
                    <option value="ms-jones">Ms. Jones</option>
                    <option value="dr-williams">Dr. Williams</option>
                    <option value="mrs-davis">Mrs. Davis</option>
                </select>
            </div>
        </div>

        <button class="btnQR">Generate QR Code</button>

        <div class="qr-code-display">
            QR Code will appear here.
        </div>

        <p class="footer-text">Students will "scan" this QR code by manually entering its content.</p>
    </div>
@endsection
