<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['name', 'title']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['name', 'title']); ?>
<?php foreach (array_filter((['name', 'title']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data="{ show : false , name : '<?php echo e($name); ?>' }" 
    x-show="show"
    x-on:open-modal.window="show = ($event.detail.name === name)" 
    x-on:close-modal.window="show = false"
    x-on:keydown.escape.window="show = false" 
    style="display:none;" class="fixed z-50 inset-0" x-transition.duration>
    

    
    <div class="modal fade" id="form" tabindex="" aria-labelledby="exampleModalLabel" aria-hidden="true"
         wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e($title); ?> ?? 'Modal Title'</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo e($body); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH /Users/user/Herd/livewire3/resources/views/components/modal.blade.php ENDPATH**/ ?>