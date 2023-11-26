<x-overview-layout :img="$randImg">

  <div class="mt-3 flex w-full flex-col items-center py-12 md:flex-row">
    <section class="max-w-full">
      <div class="cc relative">
        <h4 class="my-2 mb-3 font-headin text-xl font-bold capitalize text-black dark:text-white">Trending
        </h4>
        <div
          class="seasonContent grid max-h-[27rem] grid-cols-2 gap-3 overflow-hidden px-1 py-2 sm:grid-cols-3 lg:grid-cols-4 lg:gap-y-7 xl:grid-cols-5 min-[1400px]:grid-cols-6 min-[2366px]:grid-cols-7">
          @foreach ($trending->results as $tren)
            <a href="{{ $tren->media_type . '/' . $tren->id }}">
              <div
                class="group relative flex h-auto w-full flex-col items-center overflow-hidden shadow-sm ring-blue-800 duration-200 hover:ring-2 focus:ring-2 active:scale-[.98] dark:bg-gray-900">
                <img class="h-full w-full bg-gray-900 object-cover transition-transform group-hover:brightness-105"
                  src="" data-src="{{ config('constants.300') . $tren->poster_path }}" alt=""
                  loading="lazy">
              </div>
              <div class="p-2">
                <p
                  class="pr-px text-sm font-semibold text-gray-800 decoration-2 underline-offset-2 hover:underline hover:decoration-blue-700 dark:text-white">
                  {{ isset($tren->name) ? ucfirst($tren->name) : ucfirst($tren->title) }}</p>
                <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                  {{ isset($tren->release_date) ? date('M d Y', strtotime($tren->release_date)) : date('M d Y', strtotime($tren->first_air_date)) }}
                </p>
              </div>
            </a>
          @endforeach
        </div>
        <div
          class="moree pointer-events-none absolute inset-x-0 bottom-0 z-10 flex justify-center bg-gradient-to-t from-white pb-8 pt-32 dark:from-[#121212]">
          <button
            class="more pointer-events-auto relative flex h-12 items-center rounded-md bg-[#202020] px-6 text-sm font-semibold text-white duration-200 hover:bg-slate-900 dark:hover:bg-[#181818]">Show
            more...</button>
        </div>
      </div>
    </section>
  </div>

  <div class="mt-3 flex w-full flex-col items-center py-12 md:flex-row">
    <section class="max-w-full">
      <div class="cc relative">
        <h4 class="my-2 mb-3 font-headin text-xl font-bold capitalize text-black dark:text-white">Now Playing Movies
        </h4>
        <div
          class="seasonContent grid max-h-[27rem] grid-cols-2 gap-3 overflow-hidden px-1 py-2 sm:grid-cols-3 lg:grid-cols-4 lg:gap-y-7 xl:grid-cols-5 min-[1400px]:grid-cols-6 min-[2366px]:grid-cols-7">
          @foreach ($nowPlayMovie->results as $now)
            <a href="{{ 'movie/' . $now->id }}">
              <div
                class="group relative flex h-auto w-full flex-col items-center overflow-hidden shadow-sm ring-blue-800 duration-200 hover:ring-2 focus:ring-2 active:scale-[.98] dark:bg-gray-900">
                <img class="h-full w-full bg-gray-900 object-cover transition-transform group-hover:brightness-105"
                  src="" data-src="{{ config('constants.300') . $now->poster_path }}" alt=""
                  loading="lazy">
              </div>
              <div class="p-2">
                <p
                  class="pr-px text-sm font-semibold text-gray-800 decoration-2 underline-offset-2 hover:underline hover:decoration-blue-700 dark:text-white">
                  {{ ucfirst($now->title) }}</p>
                <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                  {{ date('M d Y', strtotime($now->release_date)) }}
                </p>
              </div>
            </a>
          @endforeach
        </div>
        <div
          class="moree pointer-events-none absolute inset-x-0 bottom-0 z-10 flex justify-center bg-gradient-to-t from-white pb-8 pt-32 dark:from-[#121212]">
          <button
            class="more pointer-events-auto relative flex h-12 items-center rounded-md bg-[#202020] px-6 text-sm font-semibold text-white duration-200 hover:bg-slate-900 dark:hover:bg-[#181818]">Show
            more...</button>
        </div>
      </div>
    </section>
  </div>

  @push('js.main')
    <script>
      const btnMore = document.querySelectorAll('.more');
      const moreWrap = document.querySelectorAll('.moree');
      const moreContent = document.querySelectorAll('.seasonContent');
      const ssa = document.querySelectorAll('.cc');
      let hFull = true;

      btnMore.forEach((btn, index) => {
        btn.addEventListener('click', () => {
          hFull = !hFull; // Membalikkan nilai hFull
          const actionText = hFull ? "Show more..." : "Show less...";

          btn.textContent = actionText;
          if (!hFull) {
            moreContent[index].classList.remove('max-h-[27rem]');
            ssa[index].classList.remove('pb-24');
            moreWrap[index].classList.remove('pt-32', 'bottom-0');
            moreWrap[index].classList.remove('pb-8');
            moreWrap[index].classList.add('-bottom-12');
          } else {
            moreContent[index].classList.add('max-h-[27rem]');
            // ssa[index].classList.add('pb-24');
            moreWrap[index].classList.add('pt-32', 'bottom-0');
            moreWrap[index].classList.remove('-bottom-12');
          }
        });
      });

      [].forEach.call(document.querySelectorAll('img[data-src]'), function(img) {
        img.setAttribute('src', img.getAttribute('data-src'));
        img.onload = function() {
          img.removeAttribute('data-src');
        };
      });
    </script>
  @endpush
</x-overview-layout>
