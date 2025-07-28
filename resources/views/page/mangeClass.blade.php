@extends('layouts.template')

@section('pageTitle')
    Welcome to the best online shop in Cambodia
@endsection

@section('styleBlock')
    <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
    <script src="{{ asset('js/add_class.js') }}"></script>
@endsection

@section('rightTitle')
    Index page
@endsection

@section('content')
    <!-- Start of Manage Class Layout -->``
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <div class="flex flex-wrap items-center justify-between mb-6 gap-4">
            <div class="flex items-center gap-2 flex-grow min-w-[250px]">
                <i class="fas fa-search text-gray-500"></i>
                <input type="text" id="classFilterInput" placeholder="Filter by Class Name..."
                    class="flex-grow p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600">
            </div>
            <button id="addNewClassButton"
                class="px-5 py-2 bg-purple-600 text-white rounded-md shadow-md hover:bg-purple-700 transition-colors duration-200 whitespace-nowrap">
                Add New Class
            </button>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 mt-4" id="classTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Group
                            Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Number of
                            Students</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="classTableBody">
                     
                    @foreach($Groups as $Group)                
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $Group->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $Group->total_Student}}</td>             
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        
                          
                            <button
                                class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 mr-2 edit-button">Edit</button>
                            <button
                                class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors duration-200 delete-button">Delete</button>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- End of Manage Class Layout -->
@endsection

@section('popup')
    <!-- Modal for Add New Class (Vanilla JS controlled) -->
    <div id="addNewClassModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-8 rounded-lg shadow-xl w-11/12 max-w-lg relative">
            <div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-purple-700">Add New Class</h2>
                <button id="closeNewClassModalButton"
                    class="text-gray-500 hover:text-gray-800 text-2xl leading-none cursor-pointer">&times;</button>
            </div>
            <div class="mb-4">
                <label for="new-class-name" class="block text-gray-700 text-sm font-medium mb-2">Class Name:</label>
                <input type="text" id="newClassNameInput"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600"
                    placeholder="e.g., Grade 12B">
            </div>
            <div class="flex justify-end gap-2 pt-4 mt-6 border-t border-gray-200">
                <button id="saveNewClassButton"
                    class="px-4 py-2 bg-green-500 text-white rounded-md font-medium hover:bg-green-600 transition-colors duration-200">Save
                    Class</button>
                <button id="cancelNewClassModalButton"
                    class="px-4 py-2 bg-red-500 text-white rounded-md font-medium hover:bg-red-600 transition-colors duration-200">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Modal for Edit Class (Vanilla JS controlled) -->
    <div id="editClassModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-8 rounded-lg shadow-xl w-11/12 max-w-lg relative">
            <div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-purple-700">Edit Class</h2>
                <button id="closeEditModalButton"
                    class="text-gray-500 hover:text-gray-800 text-2xl leading-none cursor-pointer">&times;</button>
            </div>
            <div class="mb-4">
                <label for="edit-class-name" class="block text-gray-700 text-sm font-medium mb-2">Class Name:</label>
                <input type="text" id="editClassNameInput"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600"
                    placeholder="e.g., Grade 12B">
            </div>
            <div class="flex justify-end gap-2 pt-4 mt-6 border-t border-gray-200">
                <button id="saveEditClassButton"
                    class="px-4 py-2 bg-green-500 text-white rounded-md font-medium hover:bg-green-600 transition-colors duration-200">Save
                    Changes</button>
                <button id="cancelEditModalButton"
                    class="px-4 py-2 bg-red-500 text-white rounded-md font-medium hover:bg-red-600 transition-colors duration-200">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Modal for Delete Confirmation (Vanilla JS controlled) -->
    <div id="deleteConfirmModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-8 rounded-lg shadow-xl w-11/12 max-w-sm relative">
            <div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-red-700">Confirm Deletion</h2>
                <button id="closeDeleteConfirmModalButton"
                    class="text-gray-500 hover:text-gray-800 text-2xl leading-none cursor-pointer">&times;</button>
            </div>
            <div class="mb-4">
                <p class="text-gray-700">Are you sure you want to delete this class? This action cannot be undone.</p>
            </div>
            <div class="flex justify-end gap-2 pt-4 mt-6 border-t border-gray-200">
                <button id="confirmDeleteButton"
                    class="px-4 py-2 bg-red-500 text-white rounded-md font-medium hover:bg-red-600 transition-colors duration-200">Delete</button>
                <button id="cancelDeleteConfirmButton"
                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md font-medium hover:bg-gray-400 transition-colors duration-200">Cancel</button>
            </div>
        </div>
    </div>
@endsection
