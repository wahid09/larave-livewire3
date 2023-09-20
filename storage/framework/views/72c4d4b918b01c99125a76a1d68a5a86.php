<div>
    <!-- Content Header (Page header) -->
    <section class="content-header mt-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Simple Tables</h1>
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
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Module List</h3>
                            
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
                                    <!-- __BLOCK__ --><?php $__empty_1 = true; $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                                            <td><?php echo e($item->name); ?></td>
                                            <td>
                                                <?php echo e($item->url); ?>

                                            </td>
                                            <td>
                                                <?php echo e($item->created_at->diffForhumans()); ?>

                                            </td>
                                            <td>
                                                
                                                <a href=""
                                                    wire:click.prevent="addNewSubModule(<?php echo e($item); ?>)">
                                                    <i class="fa fa-plus-circle mr-1"></i>
                                                </a>
                                                
                                                
                                                <a href="" wire:click.prevent="editModule(<?php echo e($item); ?>)">
                                                    <i class="fa fa-edit mr-1"></i>
                                                </a>
                                                
                                                
                                                <a href=""
                                                    wire:click.prevent="deleteConfirm(<?php echo e($item->id); ?>)">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                        <!-- __BLOCK__ --><?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="<?php if($showMore == $item->id): ?> <?php else: ?> d-none <?php endif; ?>"
                                                style="background-color:#f2eee4">
                                                <td></td>
                                                <td><?php echo e($key->name); ?></td>
                                                <td><?php echo e($key->url); ?></td>
                                                <td><?php echo e($key->created_at->diffForhumans()); ?></td>
                                                <td>
                                                    
                                                    <a href=""
                                                        wire:click.prevent="editModule(<?php echo e($key); ?>)">
                                                        <i class="fa fa-edit mr-1"></i>
                                                    </a>
                                                    
                                                    
                                                    <a href=""
                                                        wire:click.prevent="deleteConfirm(<?php echo e($key->id); ?>)">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </a>
                                                    
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
                                <?php echo e($modules->links()); ?>

                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-5">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">General Elements</h3>
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Module Name</label>
                                            <input type="text"
                                                class="form-control <?php $__errorArgs = ['form.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="name" placeholder="Enter Module name" wire:model="form.name">
                                            <!-- __BLOCK__ --><?php $__errorArgs = ['form.name'];
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
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="url">URL</label>
                                            <input type="text"
                                                class="form-control <?php $__errorArgs = ['form.url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="url" placeholder="Enter url" wire:model="form.url">
                                            <!-- __BLOCK__ --><?php $__errorArgs = ['form.url'];
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
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="url">Icon</label>
                                            <input type="text"
                                                class="form-control <?php $__errorArgs = ['form.icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="url" placeholder="Enter url" wire:model="form.icon">
                                            <!-- __BLOCK__ --><?php $__errorArgs = ['form.icon'];
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
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="sort_order">Sort Order</label>
                                            <input type="number"
                                                class="form-control <?php $__errorArgs = ['form.sort_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="sort_order" placeholder="Enter url" wire:model="form.sort_order">
                                            <!-- __BLOCK__ --><?php $__errorArgs = ['form.ort_order'];
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
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox"
                                            class="custom-control-input <?php $__errorArgs = ['form.is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="is_active" wire:model.defer="form.is_active">
                                        <label class="custom-control-label" for="is_active">Status</label>
                                    </div>
                                    <!-- __BLOCK__ --><?php $__errorArgs = ['form.is_active'];
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
                                <div class="row">
                                    <div class="col-md-12 float-left">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                class="fa fa-times mr-1"></i>Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-save mr-1"></i>Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add New Module</h3>
                        </div>
                        <div class="card-body">
                            <form autocomplete="off" wire:submit="saveModule">
                                <div class="modal-body">
                                    <div class="card-body">

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-times mr-1"></i>Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa fa-save mr-1"></i>Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
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
<?php /**PATH /Users/user/Herd/livewire3/resources/views/livewire/backend/module/module-list-component.blade.php ENDPATH**/ ?>