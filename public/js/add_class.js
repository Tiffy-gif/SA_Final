// document.addEventListener("DOMContentLoaded", function () {
//     // --- Common Modal Functions ---
//     function showModal(modalElement) {
//         modalElement.classList.remove("hidden");
//         modalElement.classList.add("flex");
//     }

//     function hideModal(modalElement) {
//         modalElement.classList.add("hidden");
//         modalElement.classList.remove("flex");
//     }

//     // --- Sidebar Managing Toggle Functionality ---
//     const managingToggleLabel = document.querySelector(".has-submenu > label");
//     const managingSubmenu = document.querySelector(".submenu-content");
//     const managingChevron = document.querySelector(
//         ".has-submenu .chevron-icon"
//     );

//     if (managingToggleLabel && managingSubmenu && managingChevron) {
//         // Initialize submenu state (e.g., open by default as in previous versions)
//         managingSubmenu.style.display = "block";
//         managingChevron.classList.add("rotate-90");

//         managingToggleLabel.addEventListener("click", function () {
//             const isOpen = managingSubmenu.style.display === "block";
//             if (isOpen) {
//                 managingSubmenu.style.display = "none";
//                 managingChevron.classList.remove("rotate-90");
//                 managingChevron.classList.add("rotate-0");
//             } else {
//                 managingSubmenu.style.display = "block";
//                 managingChevron.classList.remove("rotate-0");
//                 managingChevron.classList.add("rotate-90");
//             }
//         });
//     }

//     // --- Add New Class Modal Functionality ---
//     const addNewClassButton = document.getElementById("addNewClassButton");
//     const addNewClassModal = document.getElementById("addNewClassModal");
//     const closeNewClassModalButton = document.getElementById(
//         "closeNewClassModalButton"
//     );
//     const cancelNewClassModalButton = document.getElementById(
//         "cancelNewClassModalButton"
//     );
//     const saveNewClassButton = document.getElementById("saveNewClassButton");
//     const newClassNameInput = document.getElementById("newClassNameInput");
//     const classTableBody = document.getElementById("classTableBody");

//     if (addNewClassButton) {
//         addNewClassButton.addEventListener("click", () =>
//             showModal(addNewClassModal)
//         );
//     }
//     if (closeNewClassModalButton) {
//         closeNewClassModalButton.addEventListener("click", () => {
//             hideModal(addNewClassModal);
//             newClassNameInput.value = ""; // Clear input
//         });
//     }
//     if (cancelNewClassModalButton) {
//         cancelNewClassModalButton.addEventListener("click", () => {
//             hideModal(addNewClassModal);
//             newClassNameInput.value = ""; // Clear input
//         });
//     }

//     if (saveNewClassButton) {
//         saveNewClassButton.addEventListener("click", function () {
//             const className = newClassNameInput.value.trim();
//             if (className) {
//                 const newRow = document.createElement("tr");
//                 newRow.classList.add("hover:bg-gray-100");

//                 newRow.innerHTML = `
//                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">${className}</td>
//                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">0</td>
//                             <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
//                                 <button class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 mr-2 edit-button">Edit</button>
//                                 <button class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors duration-200 delete-button">Delete</button>
//                             </td>
//                         `;
//                 classTableBody.appendChild(newRow);
//                 hideModal(addNewClassModal);
//                 newClassNameInput.value = ""; // Clear input after adding
//             } else {
//                 console.log("Class name cannot be empty."); // Replace with a user-friendly message box in a real app
//             }
//         });
//     }

//     // --- Edit Class Modal Functionality ---
//     const editClassModal = document.getElementById("editClassModal");
//     const closeEditModalButton = document.getElementById(
//         "closeEditModalButton"
//     );
//     const cancelEditModalButton = document.getElementById(
//         "cancelEditModalButton"
//     );
//     const saveEditClassButton = document.getElementById("saveEditClassButton");
//     const editClassNameInput = document.getElementById("editClassNameInput");
//     let currentEditingRow = null; // To keep track of which row is being edited

//     if (closeEditModalButton) {
//         closeEditModalButton.addEventListener("click", () =>
//             hideModal(editClassModal)
//         );
//     }
//     if (cancelEditModalButton) {
//         cancelEditModalButton.addEventListener("click", () =>
//             hideModal(editClassModal)
//         );
//     }

//     if (saveEditClassButton) {
//         saveEditClassButton.addEventListener("click", function () {
//             const newClassName = editClassNameInput.value.trim();
//             if (newClassName && currentEditingRow) {
//                 currentEditingRow.querySelector("td:first-child").textContent =
//                     newClassName;
//                 hideModal(editClassModal);
//                 currentEditingRow = null; // Clear reference
//             } else {
//                 console.log("Class name cannot be empty or no row selected."); // User-friendly message
//             }
//         });
//     }

//     // --- Delete Confirmation Modal Functionality ---
//     const deleteConfirmModal = document.getElementById("deleteConfirmModal");
//     const closeDeleteConfirmModalButton = document.getElementById(
//         "closeDeleteConfirmModalButton"
//     );
//     const cancelDeleteConfirmButton = document.getElementById(
//         "cancelDeleteConfirmButton"
//     );
//     const confirmDeleteButton = document.getElementById("confirmDeleteButton");
//     let rowToDelete = null; // To keep track of which row to delete

//     if (closeDeleteConfirmModalButton) {
//         closeDeleteConfirmModalButton.addEventListener("click", () =>
//             hideModal(deleteConfirmModal)
//         );
//     }
//     if (cancelDeleteConfirmButton) {
//         cancelDeleteConfirmButton.addEventListener("click", () =>
//             hideModal(deleteConfirmModal)
//         );
//     }

//     if (confirmDeleteButton) {
//         confirmDeleteButton.addEventListener("click", function () {
//             if (rowToDelete) {
//                 rowToDelete.remove(); // Remove the row from the table
//                 hideModal(deleteConfirmModal);
//                 rowToDelete = null; // Clear reference
//             }
//         });
//     }

//     // --- Event Delegation for Edit and Delete Buttons ---
//     if (classTableBody) {
//         classTableBody.addEventListener("click", function (event) {
//             const target = event.target;

//             // Handle Edit button click
//             if (target.classList.contains("edit-button")) {
//                 currentEditingRow = target.closest("tr");
//                 const className =
//                     currentEditingRow.querySelector(
//                         "td:first-child"
//                     ).textContent;
//                 editClassNameInput.value = className;
//                 showModal(editClassModal);
//             }

//             // Handle Delete button click
//             if (target.classList.contains("delete-button")) {
//                 rowToDelete = target.closest("tr");
//                 showModal(deleteConfirmModal);
//             }
//         });
//     }

//     // --- Class Filtering Functionality ---
//     const classFilterInput = document.getElementById("classFilterInput");

//     if (classFilterInput) {
//         classFilterInput.addEventListener("keyup", function () {
//             const filterValue = classFilterInput.value.toLowerCase();
//             const rows = classTableBody.getElementsByTagName("tr");

//             for (let i = 0; i < rows.length; i++) {
//                 const classNameCell = rows[i].getElementsByTagName("td")[0]; // First cell is class name
//                 if (classNameCell) {
//                     const classNameText =
//                         classNameCell.textContent || classNameCell.innerText;
//                     if (classNameText.toLowerCase().includes(filterValue)) {
//                         // Changed to includes for better filtering
//                         rows[i].style.display = ""; // Show row
//                     } else {
//                         rows[i].style.display = "none"; // Hide row
//                     }
//                 }
//             }
//         });
//     }
// });


// /* When fetch data use this 
// <script>
//         document.addEventListener('DOMContentLoaded', function() {
//             // --- Common Modal Functions ---
//             function showModal(modalElement) {
//                 modalElement.classList.remove('hidden');
//                 modalElement.classList.add('flex');
//             }

//             function hideModal(modalElement) {
//                 modalElement.classList.add('hidden');
//                 modalElement.classList.remove('flex');
//             }

//             // --- Sidebar Managing Toggle Functionality ---
//             const managingToggleLabel = document.querySelector('.has-submenu > label');
//             const managingSubmenu = document.querySelector('.submenu-content');
//             const managingChevron = document.querySelector('.has-submenu .chevron-icon');

//             if (managingToggleLabel && managingSubmenu && managingChevron) {
//                 // Initialize submenu state (e.g., open by default as in previous versions)
//                 managingSubmenu.style.display = 'block';
//                 managingChevron.classList.add('rotate-90');

//                 managingToggleLabel.addEventListener('click', function() {
//                     const isOpen = managingSubmenu.style.display === 'block';
//                     if (isOpen) {
//                         managingSubmenu.style.display = 'none';
//                         managingChevron.classList.remove('rotate-90');
//                         managingChevron.classList.add('rotate-0');
//                     } else {
//                         managingSubmenu.style.display = 'block';
//                         managingChevron.classList.remove('rotate-0');
//                         managingChevron.classList.add('rotate-90');
//                     }
//                 });
//             }


//             // --- Add New Class Modal Functionality ---
//             const addNewClassButton = document.getElementById('addNewClassButton');
//             const addNewClassModal = document.getElementById('addNewClassModal');
//             const closeNewClassModalButton = document.getElementById('closeNewClassModalButton');
//             const cancelNewClassModalButton = document.getElementById('cancelNewClassModalButton');
//             const saveNewClassButton = document.getElementById('saveNewClassButton');
//             const newClassNameInput = document.getElementById('newClassNameInput');
//             const classTableBody = document.getElementById('classTableBody');

//             if (addNewClassButton) {
//                 addNewClassButton.addEventListener('click', () => showModal(addNewClassModal));
//             }
//             if (closeNewClassModalButton) {
//                 closeNewClassModalButton.addEventListener('click', () => {
//                     hideModal(addNewClassModal);
//                     newClassNameInput.value = ''; // Clear input
//                 });
//             }
//             if (cancelNewClassModalButton) {
//                 cancelNewClassModalButton.addEventListener('click', () => {
//                     hideModal(addNewClassModal);
//                     newClassNameInput.value = ''; // Clear input
//                 });
//             }

//             if (saveNewClassButton) {
//                 saveNewClassButton.addEventListener('click', function() {
//                     const className = newClassNameInput.value.trim();
//                     if (className) {
//                         // --- Database Integration Point: Add New Class ---
//                         // In a real application, you would send this data to your backend API
//                         // Example: fetch('/api/classes', { method: 'POST', body: JSON.stringify({ name: className }) })
//                         // .then(response => response.json())
//                         // .then(data => {
//                         //     // Handle success, maybe refresh the table data from the database
//                         //     console.log('Class added to database:', data);
//                         // })
//                         // .catch(error => console.error('Error adding class:', error));

//                         console.log(`Simulating adding new class: "${className}" to the database.`);

//                         // For now, we are not adding to the DOM directly here
//                         // The table data would typically be reloaded from the database after a successful save.

//                         hideModal(addNewClassModal);
//                         newClassNameInput.value = ''; // Clear input after "saving"
//                     } else {
//                         console.log('Class name cannot be empty.'); // Replace with a user-friendly message box
//                     }
//                 });
//             }

//             // --- Edit Class Modal Functionality ---
//             const editClassModal = document.getElementById('editClassModal');
//             const closeEditModalButton = document.getElementById('closeEditModalButton');
//             const cancelEditModalButton = document.getElementById('cancelEditModalButton');
//             const saveEditClassButton = document.getElementById('saveEditClassButton');
//             const editClassNameInput = document.getElementById('editClassNameInput');
//             let currentEditingRow = null; // To keep track of which row is being edited

//             if (closeEditModalButton) {
//                 closeEditModalButton.addEventListener('click', () => hideModal(editClassModal));
//             }
//             if (cancelEditModalButton) {
//                 cancelEditModalButton.addEventListener('click', () => hideModal(editClassModal));
//             }

//             if (saveEditClassButton) {
//                 saveEditClassButton.addEventListener('click', function() {
//                     const newClassName = editClassNameInput.value.trim();
//                     if (newClassName && currentEditingRow) {
//                         // --- Database Integration Point: Update Class ---
//                         // In a real application, you would send this updated data to your backend API
//                         // Example: const classId = currentEditingRow.dataset.classId; // Assuming you have an ID
//                         // fetch(`/api/classes/${classId}`, { method: 'PUT', body: JSON.stringify({ name: newClassName }) })
//                         // .then(response => response.json())
//                         // .then(data => {
//                         //     // Handle success, maybe refresh the table data from the database
//                         //     console.log('Class updated in database:', data);
//                         // })
//                         // .catch(error => console.error('Error updating class:', error));

//                         console.log(`Simulating updating class to: "${newClassName}" in the database.`);
//                         // For now, we are not updating the DOM directly here
//                         // The table data would typically be reloaded from the database after a successful update.

//                         hideModal(editClassModal);
//                         currentEditingRow = null; // Clear reference
//                     } else {
//                         console.log('Class name cannot be empty or no row selected.'); // User-friendly message
//                     }
//                 });
//             }

//             // --- Delete Confirmation Modal Functionality ---
//             const deleteConfirmModal = document.getElementById('deleteConfirmModal');
//             const closeDeleteConfirmModalButton = document.getElementById('closeDeleteConfirmModalButton');
//             const cancelDeleteConfirmButton = document.getElementById('cancelDeleteConfirmButton');
//             const confirmDeleteButton = document.getElementById('confirmDeleteButton');
//             let rowToDelete = null; // To keep track of which row to delete

//             if (closeDeleteConfirmModalButton) {
//                 closeDeleteConfirmModalButton.addEventListener('click', () => hideModal(deleteConfirmModal));
//             }
//             if (cancelDeleteConfirmButton) {
//                 cancelDeleteConfirmButton.addEventListener('click', () => hideModal(deleteConfirmModal));
//             }

//             if (confirmDeleteButton) {
//                 confirmDeleteButton.addEventListener('click', function() {
//                     if (rowToDelete) {
//                         // --- Database Integration Point: Delete Class ---
//                         // In a real application, you would send a delete request to your backend API
//                         // Example: const classId = rowToDelete.dataset.classId; // Assuming you have an ID
//                         // fetch(`/api/classes/${classId}`, { method: 'DELETE' })
//                         // .then(response => {
//                         //     if (response.ok) {
//                         //         // Handle success, remove the row from the DOM
//                         //         rowToDelete.remove();
//                         //         console.log('Class deleted from database.');
//                         //     } else {
//                         //         console.error('Failed to delete class.');
//                         //     }
//                         // })
//                         // .catch(error => console.error('Error deleting class:', error));

//                         console.log(`Simulating deleting row from database for class: "${rowToDelete.querySelector('td:first-child').textContent}"`);
//                         // For now, we are not removing from the DOM directly here
//                         // The table data would typically be reloaded from the database after a successful delete.

//                         hideModal(deleteConfirmModal);
//                         rowToDelete = null; // Clear reference
//                     }
//                 });
//             }

//             // --- Event Delegation for Edit and Delete Buttons ---
//             // This part remains mostly the same as it handles UI interaction
//             if (classTableBody) {
//                 classTableBody.addEventListener('click', function(event) {
//                     const target = event.target;

//                     // Handle Edit button click
//                     if (target.classList.contains('edit-button')) {
//                         currentEditingRow = target.closest('tr');
//                         const className = currentEditingRow.querySelector('td:first-child').textContent;
//                         editClassNameInput.value = className;
//                         showModal(editClassModal);
//                     }

//                     // Handle Delete button click
//                     if (target.classList.contains('delete-button')) {
//                         rowToDelete = target.closest('tr');
//                         showModal(deleteConfirmModal);
//                     }
//                 });
//             }

//             // --- Class Filtering Functionality ---
//             // This part remains the same as it operates on currently displayed DOM elements
//             const classFilterInput = document.getElementById('classFilterInput');

//             if (classFilterInput) {
//                 classFilterInput.addEventListener('keyup', function() {
//                     const filterValue = classFilterInput.value.toLowerCase();
//                     const rows = classTableBody.getElementsByTagName('tr');

//                     for (let i = 0; i < rows.length; i++) {
//                         const classNameCell = rows[i].getElementsByTagName('td')[0]; // First cell is class name
//                         if (classNameCell) {
//                             const classNameText = classNameCell.textContent || classNameCell.innerText;
//                             if (classNameText.toLowerCase().includes(filterValue)) { // Changed to includes for better filtering
//                                 rows[i].style.display = ''; // Show row
//                             } else {
//                                 rows[i].style.display = 'none'; // Hide row
//                             }
//                         }
//                     }
//                 });
//             }
//         });
// </script>
// */