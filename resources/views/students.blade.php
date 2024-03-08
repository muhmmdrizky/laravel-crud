@extends('layouts.mainlayout')

@section('title', 'Students')

@section('content')

<div class="flex justify-between items-center pt-3 mt-2 ">
  <nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <li class="inline-flex items-center">
        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
          <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
          </svg>
          Home
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
          </svg>
          <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Students</a>
        </div>
      </li>
    </ol>
  </nav>
  <a href="/student-add">
    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add New Student</button>
  </a>
</div>


<form class="flex items-start max-w-sm" method="get">
  <label for="simple-search" class="sr-only">Search</label>
  <div class="relative w-full">
    <input type="text" name="keyword" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Keywords" required />
  </div>
  <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
    </svg>
    <span class="sr-only">Search</span>
  </button>
</form>


@if(Session::has('status'))
<div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
  </svg>
  <span class="sr-only">Info</span>
  <div>
    <span class="font-medium">{{ Session::get('message') }}</span>
  </div>
</div>
@endif

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          #
        </th>
        <th scope="col" class="px-6 py-3">
          Name
        </th>
        <th scope="col" class="px-6 py-3">
          Student ID
        </th>
        <th scope="col" class="px-6 py-3 text-center">
          Gender
        </th>
        <th scope="col" class="px-6 py-3 text-center">
          Class
        </th>
        <th scope="col" class="px-6 py-3 text-right">
          Action
        </th>
      </tr>
    </thead>
    @foreach ($studentList as $student)

    <tbody>
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          {{ $loop->iteration }}
        </th>
        <td class="px-6 py-4">
          {{ $student->name }}
        </td>
        <td class="px-6 py-4">
          {{ $student->student_id }}
        </td>
        <td class="px-6 py-4 text-center">
          @if ($student->gender == 'M')
          Male
          @else
          Female
          @endif
        </td>
        <td class="px-6 py-4">
          {{ $student->class->name }}
        </td>
        <td class="px-6 py-4 text-right">
          <a href="student-detail/{{$student->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a> |
          <a href="student-edit/{{$student->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> |
          <form action="student-destroy/{{$student->id}}" class="inline-block" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="deleteData()" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
          </form>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
  <nav aria-label="Page navigation example" class="flex justify-center mt-4 mb-5">
    <ul class="inline-flex -space-x-px text-sm">
      {{$studentList->withQueryString()->links()}}
    </ul>
  </nav>
</div>
<script>
  function deleteData() {
    // Show confirmation
    if (!confirm('Are you sure you want to delete this data?')) {
      return;
    }

    // Send request delete data using AJAX
    $.ajax({
      url: "student-destroy/{{$student->id}}",
      method: "DELETE",
      success: function() {
        // Show success message
        alert('Data has been delete.');
      },
      error: function() {
        // Show error message
        alert('There is something wrong.');
      }
    });
  }
</script>

@endsection
@vite('resources/js/app.js')