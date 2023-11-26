<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Movie' }} - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/head.css') }}">
</head>

<body class="bg-white text-slate-500 antialiased dark:bg-slate-900 dark:text-slate-400" onload="getDim()">

    <x-navigations.navigation></x-navigations.navigation>
    <x-navigations.subnav></x-navigations.subnav>

    <header style="background-image: url('{{ config('constants.originalB') .  $movie->backdrop_path  }}')"
        class="overlay-img container relative isolate bg-cover bg-none-bf md:bg-right-center-bf bg-no-repeat px-[5vw] py-12 bg-[#121212] min-[2368px]:px-[1.5vw]">
        <div class="txt flex flex-col z-30 min-w-full sm:min-w-[500px]">
            <div class="aspc w-52 relative shadow-3xl">
                <div class="block h-full group">
                    <img src="{{ config('constants.300') .  $movie->poster_path }}" alt="Poster" id="poster"
                        crossorigin="anonymous" title="{{ $movie->title }}"
                        class="h-auto max-w-full hover:brightness-105" style="height: inherit" id="image">
                    <a href=""
                        class="absolute inset-0 bg-black/80 backdrop-blur-md flex justify-center items-center text-xl capitalize text-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300">More
                        image</a>
                </div>
            </div>
            <div class="mb-6 mt-4">
                <p
                    class="{{ strlen($movie->title) >= 60 ? 'text-xl' : 'text-2xl' }} mt-3 font-headin font-semibold leading-8 text-white">
                    {{ $movie->title }}
                </p>
                @empty(!$movie->tagline)
                <p class="text-lg mt-3 font-headin italic font-medium leading-8 text-slate-100">
                    {{ $movie->tagline }}
                </p>
                @endempty
                <div class="mt-4 flex space-x-2 text-xs flex-wrap">
                    @foreach ($movie->genres as $count => $genre)
                    @if ($count < count($movie->genres) - 1)
                        <span class="inline-block text-sm text-slate-300 hover:text-slate-100">{{ $genre->name
                            }},</span>
                        @else
                        <span class="inline-block text-sm text-slate-300 hover:text-slate-100">{{ $genre->name }}</span>
                        @endif
                        @endforeach
                        <span class="text-slate-300">|</span>
                        <span class="inline-block text-sm text-slate-300">{{ $movie->runtime }}</span>
                        @unless (is_null($movie->release_date))
                        <span class="text-slate-300">|</span>
                        <span class="inline-block text-sm text-slate-300">{{ date('Y', strtotime($movie->release_date))
                            }}</span>
                        @endunless
                </div>
                <p class="pt-4 text-base font-normal leading-5 text-white max-w-full">
                    {!! Str::limit($movie->overview, 250, '.. <a href="#synopys"
                        class="underline decoration-sky-500/60 underline-offset-4 text-gray-300 hover:decoration-blue-600 hover:decoration-2">read
                        more</a>') !!}</p>
                <a href=""
                    class="bg-[#242424] py-3 min-w-0 group font-semibold w-32 text-center text-sm mt-5 font-headin text-white inline-flex gap-1 items-center justify-center">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 14 16">
                        <path
                            d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                    </svg>
                    <span class="group-hover:underline">Play Trailer</span>
                </a>
            </div>
        </div>
        <div class="header-sec absolute inset-y-0 left-0 w-2/5"></div>
    </header>

    <main class="mx-auto max-w-[1600px] px-[5vw] min-[2368px]:px-[1.5vw]">
        {{ $slot }}
        {{-- <div class="mx-auto mt-16 sm:mt-20 lg:flex lg:max-w-none">
        </div> --}}
        <div class="relative pt-14">
            <div class="mx-auto">
                <h2 class="capitalize text-xl font-semibold mb-3 dark:text-gray-100 text-[#23272a] font-main">Top Billed Cast</h2>
            </div>
            <div id="scroll"
                class="w-full mx-auto overflow-y-hidden overflow-x-scroll flex pb-5 justify-start gap-x-4 items-start content-start relative">
                @foreach(array_slice($movie->credits->cast, 0, 9) as $cast)
                <div
                    class="flex min-w-[138px] w-[138px] bg-[#151515]/90 border border-gray-700 h-full flex-col first:ml-2.5 last:mr-12 items-start overflow-hidden rounded-md shadow-md">
                    <a href="/person/{{ $cast->id }}" title="{{ $cast->name }}" class="min-w-full">
                        <img loading="lazy"
                            class="rounded-ss-md transition-transform object-cover w-full aspect-square bg-gray-900"
                            src="{{ config('constants.92P') . $cast->profile_path }}" alt="">
                    </a>
                    <div class="p-2 w-full">
                        <p class="text-gray-200 text-sm font-semibold pr-px">
                            <a href="/person/{{ $cast->id }}">
                                {{ $cast->name }}
                            </a>
                        </p>
                        <p class="mt-px text-sm font-medium text-gray-300">
                            {{$cast->character}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
            <div id="shd"
                class="w-14 absolute transition-all ease-[cubic-bezier(0.88, 0.27, 0.13, 1.42)] duration-500 right-0 inset-y-0 pointer-events-none bg-gradient-to-l from-white will-change-auto">
            </div>
        </div>
    </main>
</body>

</html>