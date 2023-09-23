<div>
    <!-- Content Header (Page header) -->
    <section class="content-header mt-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Simple Tables</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Role List</h3>
                            <a wire:navigate href="<?php echo e(route('app.role.create')); ?>"
                                class="btn btn-primary float-right"><i class="fa fa-plus-circle mr-1"></i> Add New</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card-tools flex">
                                <?php if (isset($component)) { $__componentOriginalaf1f941de664d479b3f002781d93f30f = $component; } ?>
<?php $component = App\View\Components\Table\LiveSearch::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table.live-search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table\LiveSearch::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'searchTerm']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaf1f941de664d479b3f002781d93f30f)): ?>
<?php $component = $__componentOriginalaf1f941de664d479b3f002781d93f30f; ?>
<?php unset($__componentOriginalaf1f941de664d479b3f002781d93f30f); ?>
<?php endif; ?>
                                <div class="row justify-content-left">
                                    <div class="btn-group btn-group-sm mr-1">
                                        <button type="button" class="btn btn-default">Action</button>
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" style="">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-default">Action</button>
                                    </div>
                                </div>
                                <div>

                                </div>
                            </div>
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 3px">#</th>
                                        
                                        <th>Role Nmae</th>
                                        <th>Permission</th>
                                        <th>Status</th>
                                        <th>Created_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody wire:loading.class="text-muted">
                                    <!-- __BLOCK__ --><?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td><?php echo e($loop->index + 1); ?></td>
                                            <td><?php echo e($item->name); ?></td>
                                            <td><?php echo e($item->permissions_count); ?></td>
                                            <td>
                                                <!-- __BLOCK__ --><?php if($item->is_active == true): ?>
                                                    <span class="badge badge-success">Active</span>
                                                <?php else: ?>
                                                    <span class="badge badge-warning">Inactive</span>
                                                <?php endif; ?> <!-- __ENDBLOCK__ -->
                                            </td>
                                            <td>
                                                <?php echo e($item->created_at->diffForhumans()); ?>

                                            </td>
                                            <td>
                                                <!-- __BLOCK__ --><?php if (\Illuminate\Support\Facades\Blade::check('permission', 'role-update')): ?>
                                                    <a href="<?php echo e(route('app.role.edit', $item->id)); ?>">
                                                        <i class="fa fa-edit mr-1"></i>
                                                    </a>
                                                <?php endif; ?> <!-- __ENDBLOCK__ -->
                                                <!-- __BLOCK__ --><?php if($item->deletable == true): ?>
                                                    <!-- __BLOCK__ --><?php if (\Illuminate\Support\Facades\Blade::check('permission', 'role-delete')): ?>
                                                        <a href=""
                                                            wire:click.prevent="deleteConfirm(<?php echo e($item); ?>)">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                    <?php endif; ?> <!-- __ENDBLOCK__ -->
                                                <?php else: ?>
                                                    <span class="badge badge-warning">Not Deletable</span>
                                                <?php endif; ?> <!-- __ENDBLOCK__ -->
                                            </td>
                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div>
                                            <tr class="text-center">
                                                <td colspan="5">No Data Found.</td>
                                            </tr>
                                        </div>
                                    <?php endif; ?> <!-- __ENDBLOCK__ -->
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <?php if (isset($component)) { $__componentOriginal24bedf952d760e511713cfb1cb516c1c = $component; } ?>
<?php $component = App\View\Components\Table\PerPage::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table.per-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table\PerPage::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live.debounce.150ms' => 'perPage']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal24bedf952d760e511713cfb1cb516c1c)): ?>
<?php $component = $__componentOriginal24bedf952d760e511713cfb1cb516c1c; ?>
<?php unset($__componentOriginal24bedf952d760e511713cfb1cb516c1c); ?>
<?php endif; ?>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->

    
</div>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function() {
            $('.module').select2();
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/user/Herd/livewire3/resources/views/livewire/role/role-list.blade.php ENDPATH**/ ?>