@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-sm text-green-700 bg-green-100 p-2']) }}>
        {{ $status }}
    </div>
@endif
