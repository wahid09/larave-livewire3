<div>
    <!-- Content Header (Page header) -->
    <section class="content-header mt-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>Division Management</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a wire:navigate href="<?php echo e(route('app.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Divisions</li>
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
                            <h3 class="card-title">Division List</h3>
                            <button wire:click="addNewDivision" class="btn btn-primary btn-sm float-right"><i
                                    class="fa fa-plus-circle mr-1"></i> Add New
                            </button>
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
                                        
                                        <th>Module Nmae</th>
                                        
                                        <th>URL</th>
                                        <th>Created_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody wire:loading.class="text-muted">
                                    <!-- __BLOCK__ --><?php $__empty_1 = true; $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td class="align-middle">
                                                <!-- __BLOCK__ --><?php if($showMore == 0): ?>
                                                    <button type="button" wire:click="open(<?php echo e($item->id); ?>)"
                                                        class="btn btn-link text-info">
                                                        <i class="far fa-plus-square"></i>
                                                    </button>
                                                <?php elseif($showMore == $item->id): ?>
                                                    <button type="button" wire:click="hideRow(<?php echo e($item->id); ?>)"
                                                        class="btn btn-link text-info">
                                                        <i class="far fa-minus-square"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <button type="button" wire:click="open(<?php echo e($item->id); ?>)"
                                                        class="btn btn-link text-info">
                                                        <i class="far fa-plus-square"></i>
                                                    </button>
                                                <?php endif; ?> <!-- __ENDBLOCK__ -->
                                            </td>
                                            <td><?php echo e($item->division_name); ?></td>
                                            <td>
                                                <?php echo e($item->division_code); ?>

                                            </td>
                                            <td>
                                                <?php echo e($item->created_at->diffForhumans()); ?>

                                            </td>
                                            <td>
                                                <!-- __BLOCK__ --><?php if (\Illuminate\Support\Facades\Blade::check('permission', 'division-create')): ?>
                                                <a href=""
                                                    wire:click.prevent="addNewSubDivision(<?php echo e($item); ?>)">
                                                    <i class="fa fa-plus-circle mr-1"></i>
                                                </a>
                                                <?php endif; ?> <!-- __ENDBLOCK__ -->
                                                <!-- __BLOCK__ --><?php if (\Illuminate\Support\Facades\Blade::check('permission', 'division-update')): ?>
                                                <a href="" wire:click.prevent="editDivision(<?php echo e($item); ?>)">
                                                    <i class="fa fa-edit mr-1"></i>
                                                </a>
                                                <?php endif; ?> <!-- __ENDBLOCK__ -->
                                                <!-- __BLOCK__ --><?php if (\Illuminate\Support\Facades\Blade::check('permission', 'module-delete')): ?>
                                                <a href=""
                                                    wire:click.prevent="deleteConfirm(<?php echo e($item->id); ?>)">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </a>
                                               <?php endif; ?> <!-- __ENDBLOCK__ -->
                                            </td>
                                        </tr>
                                        <!-- __BLOCK__ --><?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="<?php if($showMore == $item->id): ?> <?php else: ?> d-none <?php endif; ?>"
                                                style="background-color:#f2eee4">
                                                <td></td>
                                                <td><?php echo e($key->division_name); ?></td>
                                                <td><?php echo e($key->division_code); ?></td>
                                                <td><?php echo e($key->created_at->diffForhumans()); ?></td>
                                                <td>
                                                    <!-- __BLOCK__ --><?php if (\Illuminate\Support\Facades\Blade::check('permission', 'division-update')): ?>
                                                    <a href=""
                                                        wire:click.prevent="editUnit(<?php echo e($key); ?>)">
                                                        <i class="fa fa-edit mr-1"></i>
                                                    </a>
                                                    <?php endif; ?> <!-- __ENDBLOCK__ -->
                                                    <!-- __BLOCK__ --><?php if (\Illuminate\Support\Facades\Blade::check('permission', 'division-delete')): ?>
                                                    <a href=""
                                                        wire:click.prevent="deleteConfirm(<?php echo e($key->id); ?>)">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </a>
                                                    <?php endif; ?> <!-- __ENDBLOCK__ -->
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
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
                                <?php echo e($divisions->links()); ?>

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

    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
         wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(($showEditModal) ? 'Edit' : 'Create'); ?>

                        Division</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form autocomplete="off" wire:submit="<?php echo e($showEditModal ? 'updateDivision' : 'createDivision'); ?>">
                    <div class="modal-body">
                        <div class="card-body">
                            <!-- __BLOCK__ --><?php if($subModule): ?>
                                <div class="form-group">
                                    <label for="name">Unit Name *</label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['division_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="name" placeholder="Enter Unit name" wire:model="division_name">
                                    <!-- __BLOCK__ --><?php $__errorArgs = ['division_name'];
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
                            <?php else: ?>
                                <div class="form-group">
                                    <label for="name">Division Name *</label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['division_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="name" placeholder="Enter division name" wire:model="division_name">
                                    <!-- __BLOCK__ --><?php $__errorArgs = ['division_name'];
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
                            <?php endif; ?> <!-- __ENDBLOCK__ -->
                                <div class="form-group">
                                    <label for="name">Division Code</label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['division_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="name"
                                           placeholder="Division Code"
                                           wire:model="division_code">
                                    <!-- __BLOCK__ --><?php $__errorArgs = ['division_code'];
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
                                <label for="name">Order</label>
                                <input type="number"
                                       class="form-control <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="name" placeholder="Enter Order" wire:model.live="order">
                                <!-- __BLOCK__ --><?php $__errorArgs = ['order'];
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
                                <label for="name">Division Address *</label>
                                <textarea type="text"
                                       class="form-control <?php $__errorArgs = ['division_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="name" placeholder="Enter icon (e.g fa fa-user)" wire:model="division_address"></textarea>
                                <!-- __BLOCK__ --><?php $__errorArgs = ['division_address'];
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
                                    <label class="custom-control-label" for="is_active">Status *</label>
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
        $(document).ready(function() {
            $('.module').select2();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH D:\laragon\www\larave-livewire3\resources\views/livewire/division/division-list.blade.php ENDPATH**/ ?>