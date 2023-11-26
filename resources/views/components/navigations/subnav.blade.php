@props([
'data' => [['Overview' => ['main', 'alternative titles','cast & crew','release date','translations','watch now']],['Media'=>['backdrops','logos','posters','videos']],['Fandom'],['Share']],
])

<nav class="bg-gray-50 dark:bg-gray-700 z-50 border-b border-gray-300">
  <div class="max-w-screen-xl px-4 py-3 mx-auto">
    <div class="flex items-center justify-center">
      <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
        @foreach ($data as $id => $data)            
        <li>
          <x-navigations.subnav-item href="/" :$id :$data></x-navigations.subnav-item>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</nav>