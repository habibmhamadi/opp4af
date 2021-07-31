@props(['status'])

@if ($status && session('success'))
    <div {{ $attributes->merge(['class' => 'text-sm text-green-700 bg-green-100 p-2']) }}>
        {{ $status }}
    </div>
@elseif($status && session('error'))
    <div {{ $attributes->merge(['class' => 'text-sm text-red-700 bg-red-100 p-2']) }}>
        {{ $status }}
    </div>
@endif
