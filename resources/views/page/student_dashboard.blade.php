@extends('layouts.student')

@section('pageTitle')
    Welcome to the best online shop in Cambodia
@endsection

@section('styleBlock')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="{{ asset('js/calendar.js') }}"></script>
@endsection

@section('rightTitle')
    Index page
@endsection

@section('content')
    <section class="card-row" aria-label="Summary cards">
        {{-- Total Class --}}
        <article class="top-card" tabindex="0" aria-describedby="total-classes-desc">
            <div class="icon" aria-hidden="true">📅</div>
            <h2>03/08</h2>
            <p id="total-classes-desc">Total classes</p>
        </article>
        {{-- Total Student --}}
        <article class="top-card" tabindex="0" aria-describedby="total-students-desc">
            <div class="icon" aria-hidden="true">👩‍🎓</div>
            <h2>02/08</h2>
            <p id="total-students-desc">Total Students</p>
        </article>
        {{-- Total Absent --}}
        <article class="top-card" tabindex="0" aria-describedby="total-lessons-desc">
            <div class="icon" aria-hidden="true">❌</div>
            <h2>40/50</h2>
            <p id="total-lessons-desc">Total Absent</p>
        </article>
        {{-- Total Present --}}
        <article class="top-card" tabindex="0" aria-describedby="total-hours-desc">
            <div class="icon" aria-hidden="true">🙋</div>
            <h2>12/20</h2>
            <p id="total-hours-desc">Total Present</p>
        </article>
    </section>
    <section class="dashboard-body">

        <section class="dashboard-left">
            <section class="teaching-lessons" aria-label="Course Schedule">
                <h3>Course Schedule (as of 31/03/2025)</h3>
                <div class="schedule-table-container">
                    <table class="course-schedule-table" aria-label="Weekly Course Schedule at SETEC">
                        <caption>SETEC Weekly Schedule</caption>
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2"></th>
                                <th scope="col" colspan="6">Days of the Week</th>
                            </tr>
                            <tr>
                                <th scope="col">MONDAY</th>
                                <th scope="col">TUESDAY</th>
                                <th scope="col">WEDNESDAY</th>
                                <th scope="col">THURSDAY</th>
                                <th scope="col">FRIDAY</th>
                                <th scope="col">SATURDAY</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1-2:30PM</th>
                                <td data-class="ENG 6" data-teacher="DS" data-room="3I">ENG 6<br>DS (3I)</td>
                                <td data-class="PP" data-teacher="PIN" data-room="1H">PP<br>PIN (1H)</td>
                                <td data-class="CA I" data-teacher="PISETH" data-room="3E">CA I<br>PISETH (3E)</td>
                                <td data-class="WP" data-teacher="ROM" data-room="1H">WP<br>ROM (1H)</td>
                                <td data-class="O II" data-teacher="SOPHORN" data-room="1H">O II<br>SOPHORN (1H)</td>
                                <td data-class="O II" data-teacher="SOPHORN" data-room="3D">O II<br>SOPHORN (3D)</td>
                            </tr>
                            <tr>
                                <th scope="row">2:30-2:45PM</th>
                                <td colspan="6" class="break-time">BREAK</td>
                            </tr>
                            <tr>
                                <th scope="row">2:45-4:15PM</th>
                                <td data-class="WP" data-teacher="ROM" data-room="3I">WP<br>ROM (3I)</td>
                                <td data-class="J II" data-teacher="PAN" data-room="2D">J II<br>PAN (2D)</td>
                                <td data-class="LIN I" data-teacher="DOM" data-room="2I">LIN I<br>DOM (2I)</td>
                                <td data-class="SA II" data-teacher="KRIS" data-room="3C">SA II<br>KRIS (3C)</td>
                                <td data-class="LIN I" data-teacher="DOM" data-room="2C">LIN I<br>DOM (2C)</td>
                                <td data-class="CND I" data-teacher="SN" data-room="2I">CND I<br>SN (2I)</td>
                            </tr>
                            <tr>
                                <th scope="row">4:15-5:15PM</th>
                                <td data-class="CA I" data-teacher="PISETH" data-room="1F">CA I<br>PISETH (1F)</td>
                                <td data-class="CND I" data-teacher="SN" data-room="2D">CND I<br>SN (2D)</td>
                                <td data-class="J II" data-teacher="PAN" data-room="1D">J II<br>PAN (1D)</td>
                                <td data-class="PP" data-teacher="PIN" data-room="3C">PP<br>PIN (3C)</td>
                                <td data-class="ENG 6" data-teacher="DS" data-room="2I">ENG 6<br>DS (2I)</td>
                                <td data-class="SA II" data-teacher="KRIS" data-room="3C">SA II<br>KRIS (3C)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>

        <aside class="dashboard-right" aria-label="Right column sidebar content">
            <section class="calendar-card" aria-label="Calendar" tabindex="0">
                <h3 id="calendarMonthYear"></h3>
                <div class="calendar-grid" role="grid" aria-readonly="true" aria-label="Calendar days">
                    <div class="calendar-day-name" role="columnheader">Mon</div>
                    <div class="calendar-day-name" role="columnheader">Tue</div>
                    <div class="calendar-day-name" role="columnheader">Wed</div>
                    <div class="calendar-day-name" role="columnheader">Thu</div>
                    <div class="calendar-day-name" role="columnheader">Fri</div>
                    <div class="calendar-day-name" role="columnheader">Sat</div>
                    <div class="calendar-day-name" role="columnheader">Sun</div>
                    <div id="calendarDaysGrid"></div>
                </div>
            </section>
        </aside>
    </section>
@endsection
