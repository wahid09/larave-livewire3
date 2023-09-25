<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['sortColumnName' => $sortColumnName, 'sortDirection'=>$sortDirection]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['sortColumnName' => $sortColumnName, 'sortDirection'=>$sortDirection]); ?>
<?php foreach (array_filter((['sortColumnName' => $sortColumnName, 'sortDirection'=>$sortDirection]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<span <?php echo e($attributes); ?> class="float-right text-sm" style="cursor: pointer">
    <i class="fa fa-arrow-up <?php echo e($sortColumnName === $sortColumnName && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
    <i class="fa fa-arrow-down <?php echo e($sortColumnName === $sortColumnName && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
</span>
<?php /**PATH D:\laragon\www\larave-livewire3\resources\views/components/table/sort-by.blade.php ENDPATH**/ ?>