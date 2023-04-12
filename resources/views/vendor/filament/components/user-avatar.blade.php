@props([
    'user' => \Filament\Facades\Filament::auth()->user(),
])

<div
    {{ $attributes->class([
        'w-20 h-20 bg-gray-200 bg-cover bg-center',
        'dark:bg-gray-900' => config('filament.dark_mode'),
    ]) }}
    {{--    style="background-image: url('{{ \Filament\Facades\Filament::getUserAvatarUrl($user) }}')"--}}
    @if ($user->logo_url !== null)
        style="background-image: url('{{ \Illuminate\Support\Facades\Storage::url('/') . $user->logo_url }}')"
    @else
        style="background-image: url('{{ \Filament\Facades\Filament::getUserAvatarUrl($user) }}')"
    @endif
></div>
