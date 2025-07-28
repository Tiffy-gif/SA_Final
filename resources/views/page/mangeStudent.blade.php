@extends('layouts.template')

@section('pageTitle')
    Welcome to the best online shop in Cambodia
@endsection

@section('styleBlock')
    <script src="{{ asset('js/filter.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
    <!-- Tailwind CSS CDN - Ensure this is loaded in your layouts.template if not already -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inter font from Google Fonts - Ensure this is loaded in your layouts.template if not already -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
@endsection

@section('rightTitle')
    Index page
@endsection

@section('content')
    
  <div class="container">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Class Management</h1>

        <form class="space-y-6">
            <!-- Filtering Container -->
            <div class="filtering-container bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Filter Classes</h2>
                <div class="flex flex-col sm:flex-row items-stretch sm:items-end gap-4">
                    <div class="flex-grow">
                        <label for="filterClassName" class="block text-sm font-medium text-gray-700 mb-1">Class Name</label>
                        <input type="text" id="filterClassName" name="filterClassName"
                            placeholder="e.g., Mathematics 101"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            onkeyup="filterClasses()">
                    </div>
                    <button type="button" onclick="clearFilter()"
                        class="px-6 py-2 bg-red-500 text-white font-semibold rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                        Clear Filter
                    </button>
                </div>
            </div>

            <!-- Table Container -->
            <div class="table-container mt-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4 px-4 pt-4">All Created Classes</h2>
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- table header --}}
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Class ID</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Class Name</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Instructor</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Capacity</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Schedule</th>
                        </tr>
                    </thead>
                    {{-- table data show --}}
                    <tbody id="classTableBody" class="bg-white divide-y divide-gray-200">
                         @foreach($Groups as $Group) 
                        <!-- Example Class Data (will be filtered by JS) -->
                        <tr data-class-id="C001" data-class-name="Mathematics 101">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">C001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $Group->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Dr. Alice Smith</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">30</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Mon, Wed 09:00 AM</td>
                        </tr>
                        <tr data-class-id="C002" data-class-name="History of Art">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">C002</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $Group->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Prof. Bob Johnson</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">25</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Tue, Thu 01:00 PM</td>
                        </tr>
                        <tr data-class-id="C003" data-class-name="Introduction to Programming">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">C003</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $Group->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Ms. Carol White</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">40</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Mon, Fri 02:00 PM</td>
                        </tr>
                        <tr data-class-id="C004" data-class-name="Advanced Physics">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">C004</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $Group->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Dr. David Green</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">20</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Wed, Fri 10:00 AM</td>
                        </tr>
                        <tr data-class-id="C005" data-class-name="Creative Writing Workshop">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">C005</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $Group->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Mr. Frank Black</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">15</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Tue 03:00 PM</td>
                        </tr>
                        <tr data-class-id="C006" data-class-name="Data Structures and Algorithms">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">C006</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $Group->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Dr. Alice Smith</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">35</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Mon, Thu 11:00 AM</td>
                        </tr>
                        <tr data-class-id="C007" data-class-name="Introduction to Psychology">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">C007</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $Group->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Prof. Emily Davis</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">50</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Tue, Fri 09:00 AM</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
  </div>

  <!-- Student List Modal -->
  <div id="studentListModal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal('studentListModal')">&times;</span>
            <h2 id="modalClassName" class="text-2xl font-bold text-gray-800 mb-6">Students in [Class Name]</h2>

            <div class="table-container mb-6" style="max-height: 300px;">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Student ID</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Student Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody" class="bg-white divide-y divide-gray-200">
                        <!-- Student data will be loaded here by JavaScript -->
                    </tbody>
                </table>
            </div>

            <button type="button" onclick="openAddStudentModal()"
                class="w-full px-6 py-3 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                Add New Student
            </button>
        </div>
  </div>

  <!-- Add Student Form Modal -->
    <div id="addStudentModal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal('addStudentModal')">&times;</span>
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Student</h2>

            <form id="addStudentForm" class="space-y-4">
                <div>
                    <label for="studentName" class="block text-sm font-medium text-gray-700">Student Name</label>
                    <input type="text" id="studentName" name="studentName" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select id="gender" name="gender" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div>
                    <label for="dateOfBirth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" id="dateOfBirth" name="dateOfBirth" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="address" name="address" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select Status</option>
                        <option value="Student">Student</option>
                        <option value="Teacher">Teacher</option>
                    </select>
                </div>
                <div>
                    <label for="phoneNumber" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" id="phoneNumber" name="phoneNumber" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <button type="submit"
                    class="w-full px-6 py-3 bg-green-600 text-white font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                    Save Student
                </button>
            </form>
        </div>
  </div>
  
  <!-- Edit Student Form Modal -->
  <div id="editStudentModal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal('editStudentModal')">&times;</span>
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Student Information</h2>

            <form id="editStudentForm" class="space-y-4">
                <input type="hidden" id="editStudentId" name="editStudentId">
                <div>
                    <label for="editStudentName" class="block text-sm font-medium text-gray-700">Student Name</label>
                    <input type="text" id="editStudentName" name="editStudentName" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="editGender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select id="editGender" name="editGender" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div>
                    <label for="editDateOfBirth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" id="editDateOfBirth" name="editDateOfBirth" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="editAddress" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="editAddress" name="editAddress" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="editStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="editStatus" name="editStatus" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select Status</option>
                        <option value="Student">Student</option>
                        <option value="Teacher">Teacher</option>
                    </select>
                </div>
                <div>
                    <label for="editPhoneNumber" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" id="editPhoneNumber" name="editPhoneNumber" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="editEmail" name="editEmail" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="editPassword" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="editPassword" name="editPassword"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Leave blank to keep current password">
                </div>
                <button type="submit"
                    class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                    Save Changes
                </button>
            </form>
        </div>
  </div>
@endsection
