// public/js/filter.js

// Mock student data for demonstration purposes
// if want to get data from database copy this to AI and ask like this( this code if i use a laravel project i want the data inside get it from database what should i do)
const mockStudentData = {
    "C001": [
        { id: "S001", name: "John Doe", email: "john.doe@example.com", gender: "Male", dateOfBirth: "2000-01-15", address: "123 Main St", status: "Student", phoneNumber: "111-222-3333", password: "password1" },
        { id: "S002", name: "Jane Smith", email: "jane.smith@example.com", gender: "Female", dateOfBirth: "2001-05-20", address: "456 Oak Ave", status: "Student", phoneNumber: "444-555-6666", password: "password2" }
    ],
    "C002": [
        { id: "S003", name: "Peter Jones", email: "peter.jones@example.com", gender: "Male", dateOfBirth: "1999-11-10", address: "789 Pine Ln", status: "Student", phoneNumber: "777-888-9999", password: "password3" },
        { id: "S004", name: "Alice Brown", email: "alice.brown@example.com", gender: "Female", dateOfBirth: "2002-03-25", address: "101 Elm Blvd", status: "Student", phoneNumber: "000-111-2222", password: "password4" }
    ],
    "C003": [
        { id: "S005", name: "Michael Green", email: "michael.green@example.com", gender: "Male", dateOfBirth: "2000-07-01", address: "202 Maple Dr", status: "Student", phoneNumber: "333-444-5555", password: "password5" }
    ],
    "C004": [
        { id: "S006", name: "Sarah Blue", email: "sarah.blue@example.com", gender: "Female", dateOfBirth: "1998-09-12", address: "303 Birch Rd", status: "Student", phoneNumber: "666-777-8888", password: "password6" },
        { id: "S007", name: "David White", email: "david.white@example.com", gender: "Male", dateOfBirth: "2003-02-28", address: "404 Cedar Ct", status: "Student", phoneNumber: "999-000-1111", password: "password7" }
    ],
    "C005": [
        { id: "S008", name: "Emily Clark", email: "emily.clark@example.com", gender: "Female", dateOfBirth: "2001-04-05", address: "505 Willow Way", status: "Student", phoneNumber: "222-333-4444", password: "password8" }
    ],
    "C006": [
        { id: "S009", name: "Robert Hall", email: "robert.hall@example.com", gender: "Male", dateOfBirth: "1997-06-18", address: "606 Spruce St", status: "Student", phoneNumber: "555-666-7777", password: "password9" },
        { id: "S010", name: "Laura King", email: "laura.king@example.com", gender: "Female", dateOfBirth: "2000-10-22", address: "707 Fir Rd", status: "Student", phoneNumber: "888-999-0000", password: "password10" },
        { id: "S011", name: "Chris Lee", email: "chris.lee@example.com", gender: "Other", dateOfBirth: "2002-01-30", address: "808 Poplar Pl", status: "Student", phoneNumber: "123-456-7890", password: "password11" }
    ],
    "C007": [
        { id: "S012", name: "Olivia Taylor", email: "olivia.taylor@example.com", gender: "Female", dateOfBirth: "1999-08-08", address: "909 Larch Ln", status: "Student", phoneNumber: "098-765-4321", password: "password12" }
    ]
};

let currentClassId = null; // Variable to store the ID of the currently selected class

/**
 * Filters the class table based on the input in the filterClassName field.
 * Rows that do not match the filter text are hidden.
 */
function filterClasses() {
    // Get the input element and its value, converted to lowercase for case-insensitive comparison
    const input = document.getElementById('filterClassName');
    const filter = input.value.toLowerCase();

    // Get the table body and all its rows
    const tableBody = document.getElementById('classTableBody');
    const rows = tableBody.getElementsByTagName('tr');

    // Loop through all table rows
    for (let i = 0; i < rows.length; i++) {
        // Get the class name from the data-class-name attribute (or second td content)
        const classNameCell = rows[i].querySelector('td:nth-child(2)');
        if (classNameCell) {
            const className = classNameCell.textContent || classNameCell.innerText;
            // If the class name includes the filter text, display the row, otherwise hide it
            if (className.toLowerCase().includes(filter)) {
                rows[i].style.display = ''; // Show the row
            } else {
                rows[i].style.display = 'none'; // Hide the row
            }
        }
    }
}

/**
 * Clears the filter input field and shows all rows in the table.
 */
function clearFilter() {
    // Clear the input field
    const input = document.getElementById('filterClassName');
    input.value = '';
    // Re-run the filter function to display all rows
    filterClasses();
}

/**
 * Opens the student list modal and populates it with students for the selected class.
 * @param {string} classId - The ID of the class whose students are to be displayed.
 * @param {string} className - The name of the class to display in the modal title.
 */
function openStudentModal(classId, className) {
    currentClassId = classId; // Store the current class ID
    const modal = document.getElementById('studentListModal');
    const modalClassName = document.getElementById('modalClassName');
    const studentTableBody = document.getElementById('studentTableBody');

    modalClassName.textContent = `Students in ${className}`;
    studentTableBody.innerHTML = ''; // Clear previous student data

    const students = mockStudentData[classId] || []; // Get students for the classId, or an empty array if none

    if (students.length > 0) {
        students.forEach(student => {
            const row = studentTableBody.insertRow();
            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${student.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${student.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${student.email}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                    <button type="button" onclick="openEditStudentModal('${student.id}', '${classId}')"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out text-xs">
                        Edit
                    </button>
                </td>
            `;
        });
    } else {
        // Display a message if no students are found
        const row = studentTableBody.insertRow();
        row.innerHTML = `<td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No students found for this class.</td>`;
    }

    modal.style.display = 'flex'; // Show the modal using flex to center content
}

/**
 * Closes a specified modal.
 * @param {string} modalId - The ID of the modal to close.
 */
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'none'; // Hide the modal
}

/**
 * Opens the add student form modal.
 */
function openAddStudentModal() {
    closeModal('studentListModal'); // Close the student list modal first
    const addStudentModal = document.getElementById('addStudentModal');
    document.getElementById('addStudentForm').reset(); // Clear form fields
    addStudentModal.style.display = 'flex'; // Show the add student modal
}

/**
 * Opens the edit student form modal and pre-populates it with student data.
 * @param {string} studentId - The ID of the student to edit.
 * @param {string} classId - The ID of the class the student belongs to.
 */
function openEditStudentModal(studentId, classId) {
    closeModal('studentListModal'); // Close the student list modal first
    const editStudentModal = document.getElementById('editStudentModal');
    const student = mockStudentData[classId].find(s => s.id === studentId);

    if (student) {
        document.getElementById('editStudentId').value = student.id;
        document.getElementById('editStudentName').value = student.name;
        document.getElementById('editGender').value = student.gender;
        document.getElementById('editDateOfBirth').value = student.dateOfBirth;
        document.getElementById('editAddress').value = student.address;
        document.getElementById('editStatus').value = student.status;
        document.getElementById('editPhoneNumber').value = student.phoneNumber;
        document.getElementById('editEmail').value = student.email;
        // Password field is intentionally left blank for security/usability
        document.getElementById('editPassword').value = '';

        editStudentModal.style.display = 'flex'; // Show the edit student modal
    } else {
        alert("Student not found for editing.");
    }
}


/**
 * Handles the submission of the add student form.
 * In a real application, this would send data to a backend.
 */
document.addEventListener('DOMContentLoaded', () => {
    const addStudentForm = document.getElementById('addStudentForm');
    if (addStudentForm) {
        addStudentForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const studentName = document.getElementById('studentName').value;
            const gender = document.getElementById('gender').value;
            const dateOfBirth = document.getElementById('dateOfBirth').value;
            const address = document.getElementById('address').value;
            const status = document.getElementById('status').value;
            const phoneNumber = document.getElementById('phoneNumber').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // For demonstration, log the data and show a message
            console.log("New Student Data:", {
                studentName, gender, dateOfBirth, address, status, phoneNumber, email, password,
                classId: currentClassId // Include the class ID
            });

            // In a real application, you would send this data to your backend
            // and then refresh the student list for the current class.
            // Using alert for simple feedback, consider a custom message box in production
            alert(`Student '${studentName}' added to class ${currentClassId} (mock data).`);

            // Clear the form fields
            this.reset();
            closeModal('addStudentModal'); // Close the add student modal
            // Optionally, re-open the student list modal for the current class to show updated data
            if (currentClassId) {
                const currentClassName = document.querySelector(`[data-class-id="${currentClassId}"]`).dataset.className;
                openStudentModal(currentClassId, currentClassName);
            }
        });
    }

    const editStudentForm = document.getElementById('editStudentForm');
    if (editStudentForm) {
        editStudentForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const studentId = document.getElementById('editStudentId').value;
            const studentName = document.getElementById('editStudentName').value;
            const gender = document.getElementById('editGender').value;
            const dateOfBirth = document.getElementById('editDateOfBirth').value;
            const address = document.getElementById('editAddress').value;
            const status = document.getElementById('editStatus').value;
            const phoneNumber = document.getElementById('editPhoneNumber').value;
            const email = document.getElementById('editEmail').value;
            const password = document.getElementById('editPassword').value; // This might be empty if not changed

            // For demonstration, log the data and show a message
            console.log("Updated Student Data:", {
                studentId, studentName, gender, dateOfBirth, address, status, phoneNumber, email, password,
                classId: currentClassId // Include the class ID
            });

            // In a real application, you would send this data to your backend
            // and then update the mockStudentData or refresh the student list for the current class.

            // Find the student in mock data and update
            const classStudents = mockStudentData[currentClassId];
            if (classStudents) {
                const studentIndex = classStudents.findIndex(s => s.id === studentId);
                if (studentIndex > -1) {
                    classStudents[studentIndex] = {
                        ...classStudents[studentIndex], // Keep existing properties
                        name: studentName,
                        gender: gender,
                        dateOfBirth: dateOfBirth,
                        address: address,
                        status: status,
                        phoneNumber: phoneNumber,
                        email: email,
                        ...(password && { password: password }) // Only update password if provided
                    };
                    alert(`Student '${studentName}' (ID: ${studentId}) updated in class ${currentClassId} (mock data).`);
                }
            }


            // Clear the form fields
            this.reset();
            closeModal('editStudentModal'); // Close the edit student modal
            // Re-open the student list modal for the current class to show updated data
            if (currentClassId) {
                const currentClassName = document.querySelector(`[data-class-id="${currentClassId}"]`).dataset.className;
                openStudentModal(currentClassId, currentClassName);
            }
        });
    }


    // Add event listeners to each class row
    const classRows = document.querySelectorAll('#classTableBody tr');
    classRows.forEach(row => {
        row.addEventListener('click', () => {
            const classId = row.dataset.classId; // Get class ID from data attribute
            const className = row.dataset.className; // Get class name from data attribute
            if (classId && className) {
                openStudentModal(classId, className);
            }
        });
    });

    // Close any modal if the user clicks outside of it
    window.onclick = function(event) {
        const studentListModal = document.getElementById('studentListModal');
        const addStudentModal = document.getElementById('addStudentModal');
        const editStudentModal = document.getElementById('editStudentModal');


        if (event.target == studentListModal) {
            closeModal('studentListModal');
        }
        if (event.target == addStudentModal) {
            closeModal('addStudentModal');
        }
        if (event.target == editStudentModal) {
            closeModal('editStudentModal');
        }
    }
});
