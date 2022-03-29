@props(['style' => session('flash.bannerStyle', 'success'), 'message' => session('flash.banner')])


<div x-data="{{ json_encode(['show' => true, 'style' => $style, 'message' => $message]) }}"
            
            
            x-show="show && message"
            x-init="
                document.addEventListener('banner-message', event => {
                    style = event.detail.style;
                    message = event.detail.message;
                    show = true;
                });
            ">
    <div class="card-banner" >
        <div class="contenedor-banner">
            <div class="d-flex align-items-center flex-1">
                <span class="d-flex p-2 rounded-lg" style="font-size: 10px">
                    
                </span>

                <p class="m-0 ms-3 font-weight-normal text-white" x-html="message"></p>
            </div>

            <div class="flex-shrink-0">
                <button
                    type="button"
                    class="btn btn-link d-flex p-2 rounded-md"
                    aria-label="Dismiss"
                    x-on:click="show = false">
                    cerrar
                </button>
            </div>
        </div>
    </div>
</div>
