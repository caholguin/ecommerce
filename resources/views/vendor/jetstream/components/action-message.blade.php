@props(['on'])

<div class="mt-3 alert alert " role="alert" x-data="{ shown: false, timeout: null }"
     x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
     x-show.transition.opacity.out.duration.1500ms="shown"
     style="display: none;"
        {{ $attributes->merge(['class' => 'small']) }}>
    <div class="alert-body">
        {{ $slot->isEmpty() ? 'Saved.' : $slot }}
    </div>
</div>
