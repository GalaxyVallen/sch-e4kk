<x-error-layout>
  
  <x-slot:title>
    {{ $movie['title'] ?? '' }} 
  </x-slot>

  <x-slot:code>
    {{ $movie['code'] ?? '' }}
  </x-slot>

  <x-slot:msg>
    {{ $movie['message'] ?? '' }}
  </x-slot>

</x-error-layout>