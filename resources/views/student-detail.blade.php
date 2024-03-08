@extends('layouts.mainlayout')

@section('title', 'Student Detail')

@section('content')


<nav class="flex mt-5 mb-5" aria-label="Breadcrumb">
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
        <a href="/students" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Student</a>
      </div>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
        </svg>
        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Student Detail</a>
      </div>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
        </svg>
        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{ $studentDetail->name }}</a>
      </div>
    </li>
  </ol>
</nav>

<div class="p-5 border-2 border-gray-200 rounded-lg">
  <div class="flex">
    <span class="w-52 text-gray-500 p-2 font-bold">Name</span>
    <span class="p-2 text-gray-500">:</span>
    <span class="p-2 text-gray-500">{{ $studentDetail->name }}</span>
  </div>
  <div class="flex">
    <span class="w-52 text-gray-500 p-2 font-bold">Student ID</span>
    <span class="p-2 text-gray-500">:</span>
    <span class="p-2 text-gray-500">{{ $studentDetail->student_id }}</span>
  </div>
  <div class="flex">
    <span class="w-52 text-gray-500 p-2 font-bold">Class</span>
    <span class="p-2 text-gray-500">:</span>
    <span class="p-2 text-gray-500">{{ $studentDetail->class->name }}</span>
  </div>
  <div class="flex">
    <span class="w-52 text-gray-500 p-2 font-bold">Gender</span>
    <span class="p-2 text-gray-500">:</span>
    <span class="p-2 text-gray-500">
      @if ($studentDetail->gender == 'M')
      Male
      @else
      Female
      @endif
    </span>
  </div>
  <div class="flex">
    <span class="w-52 text-gray-500 p-2 font-bold">Homeroom Teacher</span>
    <span class="p-2 text-gray-500">:</span>
    <span class="p-2 text-gray-500"> {{ $studentDetail->class->homeroomTeacher->name }}</span>
  </div>
  <div class="flex">
    <span class="w-52 text-gray-500 p-2 font-bold">Extracurricular</span>
    <span class="p-2 text-gray-500">:</span>
    <span class="p-2 text-gray-500">
      <ul class="list-decimal text-gray-500 ml-3">
        @foreach ($studentDetail->extracurriculars as $extracurricular)
        <li>
          {{ $extracurricular->name }}
        </li>
        @endforeach
      </ul>
    </span>
  </div>
  <div class="flex">
    <span class="w-52 text-gray-500 p-2 font-bold">Photo</span>
    <span class="p-2 text-gray-500">:</span>
    <span>  
      @if ($studentDetail->image != "")
      <img class="w-20" src="{{asset('storage/img/'.$studentDetail->image)}}" alt="">
      @else
      <img class="w-20" src="{{asset('img/def.png')}}" alt="">      @endif
    </span>
  </div>
</div>


@endsection