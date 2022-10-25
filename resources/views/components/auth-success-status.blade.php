@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-success font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif
