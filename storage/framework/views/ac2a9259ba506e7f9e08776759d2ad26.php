<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['name']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['name']); ?>
<?php foreach (array_filter((['name']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div class="float-left perPage">
    <?php echo e(__('Show')); ?>

    <select name="<?php echo e($name); ?>" <?php echo e($attributes); ?> style="border: 1px solid black;">
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="150">150</option>
        <option value="200">200</option>
    </select>
    <?php dump($name); ?>
</div>
<style>
    .perPage {
        margin-bottom: 0px;
    }
</style>
<?php /**PATH D:\laragon\www\livewire3\resources\views/components/table/per-page.blade.php ENDPATH**/ ?>