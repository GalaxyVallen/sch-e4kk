@props([
'navigations' => [
'Movies' => '/movie',
'TV Shows' => '/tv'
]
])

<nav id="header"
  class="{{ request()->is('movie/*') ? 'py-3' : 'sticky top-0 z-20 sm:z-10 py-6' }} supports-backdrop-blur:bg-white/60 w-full flex-none bg-white/95 backdrop-blur transition-all duration-500 dark:border-slate-50/[0.06] dark:bg-transparent lg:z-50 lg:border-b lg:border-slate-900/10">
  <div class="mx-auto flex max-w-[120rem] flex-wrap items-center justify-start md:px-12">
    <a href="/"
      class="flex items-center focus-within:outline-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 md:mr-5">
      <span class="font-headin ml-5 self-center whitespace-nowrap text-xl font-semibold dark:text-white">{{
        config('app.name') }}</span>
    </a>
    <div class="ml-auto flex items-center md:order-2">
      @auth
      <div>
        <span data-popover-target="user"
          class="hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white block cursor-pointer rounded py-2 pl-3 pr-4 text-black duration-150 focus-within:outline-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 md:px-3 md:py-2">{{
          Auth::user()->username }}</span>
      </div>

      <div data-popover id="user" role="tooltip"
        class="absolute z-50 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-150 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        <div class="px-3 py-2">
          <p class="font-semibold font-main">{{ Auth::user()->name }}</p>
          <p>{{ Auth::user()->email }}</p>
        </div>
        <div class="border-t border-r-slate-400 p-2">
          <a href="{{ route('user',Auth::user()->username) }}"
            class="hover:bg-gray-200/60 p-2 duration-150 inline-flex items-center w-full gap-x-2 rounded-sm text-black">
            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 14 18">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
            </svg>
            Your Profile</a>
        </div>
        <div class="p-2">
          <a href="{{ route('logout') }}"
            class="hover:bg-gray-200/60 p-2 duration-150 block full gap-x-2 rounded-sm text-black">
            Logout</a>
        </div>
      </div>

      @else
      <span class="hidden md:flex">
        <div>
          <a href="{{ route('login') }}"
            class="hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white block rounded py-2 pl-3 pr-4 text-black duration-150 focus-within:outline-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 md:px-3 md:py-2">Login</a>
        </div>

        <div>
          <a href="{{ route('register') }}"
            class="hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white block rounded py-2 pl-3 pr-4 text-black duration-150 focus-within:outline-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 md:px-3 md:py-2">Register</a>
          </svg>
        </div>
      </span>
      @endauth
      <button data-collapse-toggle="mobile-menu-2" type="button"
        class="mr-2 inline-flex items-center rounded-lg px-1 py-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
        aria-controls="mobile-menu-2" aria-expanded="false">
        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>

    <div class="hidden w-full items-center justify-between font-main md:order-1 md:flex md:w-auto" id="mobile-menu-2">
      <ul
        class="mt-4 flex flex-col rounded-lg border border-gray-100 dark:border-gray-700 md:mt-0 md:flex-row md:space-x-1 md:border-0 md:text-sm md:font-medium">

        @foreach ($navigations as $name => $url)
        <li>
          <a href="{{ $url }}"
            class="{{ request()->is($url) ? 'bg-gray-900 text-white' : 'hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white' }} block rounded py-2 pl-3 pr-4 text-black duration-150 focus-within:outline-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 md:px-3 md:py-2">{{
            $name }}</a>
        </li>
        @endforeach
        {{-- <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="animTop" data-dropdown-trigger=""
            class="flex w-full items-center justify-between rounded py-2 pl-3 pr-4 text-black duration-150 focus-within:outline-black hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 dark:hover:bg-gray-700 dark:hover:text-white md:px-3 md:py-2">Top
            Anime
            <svg class="ml-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
            </svg></button>
        </li> --}}
        @guest
        <li class="md:hidden">
          <a href="/login"
            class="block rounded py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-white">Login</a>
        </li>
        <li class="md:hidden">
          <a href="/register"
            class="block rounded py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-white">Register</a>
        </li>
        @endguest
      </ul>
    </div>
  </div>
  {{-- <div id="animTop"
    class="z-50 mt-1 hidden w-full border-y border-gray-200 bg-gray-50 shadow-sm dark:border-gray-600 dark:bg-gray-800 max-md:!inset-auto max-md:!transform-none md:w-auto md:bg-white md:shadow-xl">
    <ul class="mx-auto grid gap-1 px-4 py-5 text-gray-900 dark:text-white sm:grid-cols-3 md:max-w-screen-2xl md:px-6">
      @foreach ($topNavigations as $name => $des)
      @if (request('type') == $des[1] && request()->is('topanime'))
      <li>
        <a href="{{ route('top', ['type' => $des[1]]) }}" class="block rounded-lg bg-[#202020] p-3 dark:bg-white">
          <div class="font-semibold text-white">{{ $name }}</div>
          <span class="text-sm text-gray-200 dark:text-gray-400">{{ $des[0] }}</span>
        </a>
      </li>
      @else
      <li>
        <a href="{{ route('top', ['type' => $des[1]]) }}"
          class="block rounded-lg p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
          <div class="font-semibold">{{ $name }}</div>
          <span class="text-sm text-gray-500 dark:text-gray-400">{{ $des[0] }}</span>
        </a>
      </li>
      @endif
      @endforeach
    </ul>
  </div> --}}

</nav>