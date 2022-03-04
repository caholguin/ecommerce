@props([''])

<li class="nav-item dropdown">
    <a id="" {!! $attributes->merge(['class' => 'nav-link']) !!} role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $trigger }}
    </a>

    <div class="dropdown-menu dropdown-menu-end animate slideIn" aria-labelledby="">
        {{ $content }}
    </div>
</li>