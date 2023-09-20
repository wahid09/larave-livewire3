@props(['name', 'title'])

<div x-data="{ show : false , name : '{{ $name }}' }" 
    x-show="show"
    x-on:open-modal.window="show = ($event.detail.name === name)" 
    x-on:close-modal.window="show = false"
    x-on:keydown.escape.window="show = false" 
    style="display:none;" class="fixed z-50 inset-0" x-transition.duration>
    

    {{-- Modal Body --}}
    <div class="modal fade" id="form" tabindex="" aria-labelledby="exampleModalLabel" aria-hidden="true"
         wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $title }} ?? 'Modal Title'</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ $body }}
            </div>
        </div>
    </div>
</div>