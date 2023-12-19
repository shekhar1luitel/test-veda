@foreach ($categories as $category)
    <option value="{{ $category->id }}">
        {!! str_repeat('&nbsp;', $level * 4) !!}│ └──{{ $category->category_name }}
    </option>
    @if ($category->children)
        @include('layouts.partials.categories', [
            'categories' => $category->children,
            'level' => $level + 1,
        ])
    @endif
@endforeach

{{-- @foreach ($categories as $category)
    <option value="{{ $category->id }}">
        {!! str_repeat('&boxur;', $level) !!} {{ $category->category_name }}
    </option>
    @if ($category->children)
        @include('layouts.partials.categories', [
            'categories' => $category->children,
            'level' => $level + 1,
        ])
    @endif
@endforeach --}}

