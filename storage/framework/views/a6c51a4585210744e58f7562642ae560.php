<div>

    <?php $__env->startSection('title'); ?>
        Permission
    <?php $__env->stopSection(); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Permissions</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a wire:navigate href="<?php echo e(route('app.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Permission</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0 float-left">Permission Management</h5>
                            <!-- __BLOCK__ --><?php if (\Illuminate\Support\Facades\Blade::check('permission', 'permission-create')): ?>
                            
                            <button wire:click.prevent="addNewPermission" class="btn btn-primary float-right"><i
                                    class="fa fa-plus-circle mr-1"></i> Add New
                            </button>
                            <?php endif; ?> <!-- __ENDBLOCK__ -->
                        </div>
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
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>
                                        Name
                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table.sort-by','data' => ['wire:click' => 'sortBy(\'name\')','sortColumnName' => $sortColumnName,'sortDirection' => $sortDirection]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table.sort-by'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'sortBy(\'name\')','sortColumnName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sortColumnName),'sortDirection' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sortDirection)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                    </th>
                                    <th>
                                        Slug
                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table.sort-by','data' => ['wire:click' => 'sortBy(\'slug\')','sortColumnName' => $sortColumnName,'sortDirection' => $sortDirection]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table.sort-by'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'sortBy(\'slug\')','sortColumnName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sortColumnName),'sortDirection' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sortDirection)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                    </th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody wire:loading.class="text-muted">
                                <!-- __BLOCK__ --><?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($permissions->firstItem() + $index); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->slug); ?></td>
                                        <td>
                                            <!-- __BLOCK__ --><?php if($item->is_active == true): ?>
                                                <span class="badge badge-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge badge-warning">Inactive</span>
                                            <?php endif; ?> <!-- __ENDBLOCK__ -->
                                        </td>
                                        <td><?php echo e($item->created_at->diffForhumans()); ?></td>
                                        <td>
                                            <!-- __BLOCK__ --><?php if (\Illuminate\Support\Facades\Blade::check('permission', 'permission-update')): ?>
                                            <a href="" wire:click.prevent="editPermission(<?php echo e($item->id); ?>)">
                                                <i class="fa fa-edit mr-1"></i>
                                            </a>
                                            <?php endif; ?> <!-- __ENDBLOCK__ -->
                                            <!-- __BLOCK__ --><?php if (\Illuminate\Support\Facades\Blade::check('permission', 'permission-delete')): ?>
                                            <a href="" wire:click.prevent="deleteConfirm(<?php echo e($item); ?>)">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
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
                            <?php echo e($permissions->links()); ?>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
         wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(($showEditModal) ? 'Edit' : 'Create'); ?>

                        Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form autocomplete="off"
                      wire:submit="<?php echo e($showEditModal ? 'updatePermission' : 'createPermission'); ?>">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="module_id">Module</label>
                                <select class="form-control <?php $__errorArgs = ['module_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        wire:model="module_id" id="module">
                                    <option value=""></option>
                                    <!-- __BLOCK__ --><?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($module->id); ?>"><?php echo e($module->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                                </select>
                                <!-- __BLOCK__ --><?php $__errorArgs = ['module_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!-- __ENDBLOCK__ -->
                            </div>
                            <div class="form-group">
                                <label for="name">Permission Name</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="name" placeholder="Enter permission name" wire:model="name">
                                <!-- __BLOCK__ --><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!-- __ENDBLOCK__ -->
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox"
                                           class="custom-control-input <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="is_active"
                                           wire:model="is_active">
                                    <label class="custom-control-label" for="is_active">Status</label>
                                </div>
                                <!-- __BLOCK__ --><?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!-- __ENDBLOCK__ -->
                            </div>

                            <div class="form-check">
                                
                                
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fa fa-times mr-1"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-primary"><i
                                class="fa fa-save mr-1"></i><?php echo e(($showEditModal) ? 'Update' : 'Save'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('js'); ?>
<script>
$(document).ready(function () {
            $('#module').select2({
                placeholder: "Select Module",
                allowClear: true
            });
            $('#module').on('change', function (e) {
                var data = $('#module').select2("val");
            window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('module_id', data);
            });
        });
        </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/user/Herd/livewire3/resources/views/livewire/permission/permission-list.blade.php ENDPATH**/ ?>