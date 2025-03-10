@props(['href' => '#', 'class' => 'btn-primary'])

<a href="{{ $href }}" class="btn {{ $class }} d-inline-flex align-items-center justify-content-center"
   style="height: 45px; width: auto; min-width: 100px;">
   {{ $slot }}
</a>
