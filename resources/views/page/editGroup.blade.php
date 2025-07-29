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
    <form action="{{ route('group.update', $group->id) }}" method="POST">
    @csrf
    
        <div class="bg-white p-8 rounded-lg shadow-xl w-11/15 relative">
                <div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-purple-700">Edit Class</h2>
                </div>
                <div class="mb-4">
                    <label for="edit-class-name" class="block text-gray-700 text-sm font-medium mb-2">Group Name:</label>
                    <input type="text" name="name" value="{{ $group->name }}" required 
                    id="editClassNameInput"
                        class="w-full p-2 border border-gray-300 rounded-md mb-10 focus:outline-none focus:ring-2 focus:ring-purple-600"
                        placeholder="e.g., Grade 12B">

                    <label for="edit-class-name" class="block text-gray-700 text-sm font-medium mb-2">Number of Students:</label>       
                    <input type="number" name="student_amount" value="{{ $group->total_Student }}" required id="editClassNameInput"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600"
                        placeholder="###">
                        
                </div>
                <div class="flex justify-end gap-2 pt-4 mt-6 border-t border-gray-200">
                    <button id="saveEditClassButton"                
                        class="px-4 py-2 bg-green-500 text-white rounded-md font-medium hover:bg-green-600 transition-colors duration-200">Save
                        Changes</button>
                    {{-- <button id="cancelEditModalButton"
                        class="px-4 py-2 bg-red-500 text-white rounded-md font-medium hover:bg-red-600 transition-colors duration-200">Cancel</button> --}}
                        <a href="{{ url('/manage-class') }}" 
                        class="px-4 py-2 bg-red-500 text-white rounded-md font-medium hover:bg-red-600 transition-colors duration-200">Cancel</a>
                </div>
            </div>
    </form>       
@endsection