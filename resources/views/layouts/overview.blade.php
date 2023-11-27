<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }} - Millions of movies, TV shows and people to discover. Explore now</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/load.css') }}">
</head>

<body class="bg-white text-slate-500 antialiased dark:bg-slate-900 dark:text-slate-400">

  <x-navigations.navigation></x-navigations.navigation>
  
  <main class="overflow-hidden px-5 sm:px-10 md:px-28 lg:px-32">
    <div class="container">
      <div
        class="relative isolate my-8 items-center overflow-hidden bg-gray-900 bg-cover pt-16 shadow-xl sm:px-8 md:pb-16 md:pt-28 lg:flex lg:gap-x-20"
        style="background-image: url('{{ config('constants.300') . '/t/p/w1920_and_h600_multi_faces_filter(duotone,00192f,00baff)' . $img }}')">
        <form class="z-20 w-full">
          <div class="-mt-8 mb-14 text-white">
            <h1 class="font-headin text-[3em] font-bold capitalize">Welcome.</h1>
            <h3 class="max-w-prose font-main text-3xl font-semibold tracking-wide">Millions of
              movies, TV shows
              and people to discover. Explore now.</h3>
          </div>
          <label for="anime-search" class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white">Search
            Anime</label>
          <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
              <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
              </svg>
            </div>
            <input type="search" id="anime-search"
              class="block w-full rounded-full border border-gray-300 bg-gray-50 p-4 py-3 pl-10 text-base text-gray-900 placeholder:text-slate-400 focus:ring-blue-800 dark:border-gray-600 dark:bg-white dark:focus:border-blue-500 dark:focus:ring-blue-500"
              placeholder="Search for a movie, tv show, person......" required="">
            <button type="submit"
              class="bbtn absolute bottom-2.5 right-2.5 rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              style="display: none;">Search</button>
          </div>
        </form>
        <div class="absolute left-0 top-0 z-0 h-full w-full bg-gradient-to-r from-[#022945] from-5% dark:from-[#022e4b]">
        </div>
      </div>
    </div>
    <div class="container flex flex-row-reverse flex-wrap gap-x-7">
      {{ $slot }}
    </div>
  </main>
  <x-footer></x-footer>

  <script src="{{ asset('js/access.js') }}"></script>
  @stack('js.main')
</body>

</html>
