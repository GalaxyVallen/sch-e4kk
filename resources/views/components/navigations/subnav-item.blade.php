<a href="#" class="text-gray-900 dark:text-white hover:underline"
  data-dropdown-toggle="dropOv-{{ $attributes['id'] }}">{{ array_key_first($data) }}</a>
<div id="dropOv-{{ $attributes['id'] }}"
  class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
  <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
    @foreach ($data as $sub)
      @if (is_array($sub))
        @foreach ($sub as $item)
          <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $item }}</a>
          </li>
        @endforeach
      @endif
    @endforeach
  </ul>
</div>