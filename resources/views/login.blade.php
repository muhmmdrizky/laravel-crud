<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  @vite('resources/css/app.css')
</head>

<body>
  
  <div class="m-auto">
    <div class="flex justify-center items-center h-screen w-screen">
     
      <div class="w-4/12 rounded-lg border p-6">
         @if(Session::has('status'))
          <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium">{{ Session::get('message') }}</span>
            </div>
          </div>
          @endif
        <form action="/login" method="POST" class="max-w-sm mx-auto">
          @csrf
          <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-slate-900 dark:text-white">Your Email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-1 focus:ring-blue-500" placeholder="name@email.com" autocomplete="off" required />
          </div>
          <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-slate-900 dark:text-white">Your Password</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-1 focus:ring-blue-500" placeholder="Type your password" autocomplete="off" required />
          </div>
          <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
              <input type="checkbox" id="remember" class="w-4 h-4 border border-gray-50 rounded bg-gray-50" />
            </div>
            <label for="remember" class="ms-2 text-sm font-medium">Remember me</label>
          </div>
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Login</button>
        </form>
      </div>
    </div>
  </div>

  @vite('resources/js/app.js')
</body>

</html>