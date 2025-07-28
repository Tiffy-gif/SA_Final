function generateCalendar() {
    const today = new Date();
    const currentMonth = today.getMonth();
    const currentYear = today.getFullYear();

    const monthYearHeader = document.getElementById("calendarMonthYear");
    const calendarDaysGrid = document.getElementById("calendarDaysGrid");

    // Clear any existing calendar days
    calendarDaysGrid.innerHTML = "";

    // Set the month and year header
    const monthNames = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    monthYearHeader.textContent = `${monthNames[currentMonth]} ${currentYear}`;

    // Get the first day of the month (0 = Sunday, 1 = Monday, etc.)
    const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
    // Adjust for Monday start (0 for Monday, 6 for Sunday)
    const startDayIndex = firstDayOfMonth === 0 ? 6 : firstDayOfMonth - 1;

    // Get the number of days in the current month
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

    // Add empty cells for the days before the 1st of the month
    for (let i = 0; i < startDayIndex; i++) {
        const emptyDay = document.createElement("span");
        emptyDay.classList.add("calendar-day", "empty");
        // Calculate the day from the previous month to display
        const daysInPreviousMonth = new Date(
            currentYear,
            currentMonth,
            0
        ).getDate();
        emptyDay.textContent = daysInPreviousMonth - (startDayIndex - 1 - i);
        emptyDay.setAttribute("role", "gridcell");
        calendarDaysGrid.appendChild(emptyDay);
    }

    // Add actual days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const daySpan = document.createElement("span");
        daySpan.classList.add("calendar-day");
        daySpan.textContent = day;
        daySpan.setAttribute("role", "gridcell");
        daySpan.setAttribute("tabindex", "-1");

        // Highlight the current day
        if (
            day === today.getDate() &&
            currentMonth === today.getMonth() &&
            currentYear === today.getFullYear()
        ) {
            daySpan.classList.add("active");
            daySpan.setAttribute("aria-current", "date");
            daySpan.setAttribute("tabindex", "0");
        }

        calendarDaysGrid.appendChild(daySpan);
    }

    // Add empty cells for the days after the last day of the month to complete the week rows
    const totalDaysDisplayed = startDayIndex + daysInMonth;
    const remainingCells = 42 - totalDaysDisplayed; // A calendar typically has 6 rows * 7 days = 42 cells

    for (let i = 1; i <= remainingCells; i++) {
        const emptyDay = document.createElement("span");
        emptyDay.classList.add("calendar-day", "empty");
        emptyDay.textContent = i;
        emptyDay.setAttribute("role", "gridcell");
        calendarDaysGrid.appendChild(emptyDay);
    }
}

// Call the function to generate the calendar when the page loads
document.addEventListener("DOMContentLoaded", generateCalendar);
