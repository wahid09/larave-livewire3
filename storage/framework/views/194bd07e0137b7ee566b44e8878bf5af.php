<div>
    <?php $__env->startSection('title'); ?>
        role-create
    <?php $__env->stopSection(); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Roles</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('app.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0 float-left">Role Management</h5>
                            <!-- __BLOCK__ --><?php if (\Illuminate\Support\Facades\Blade::check('permission', 'role-index')): ?>
                                <a wire:navigate href="<?php echo e(route('app.dev-console/roles')); ?>" class="btn btn-warning float-right"><i
                                        class="fa fa-arrow-left mr-1"></i> Back</a>
                            <?php endif; ?> <!-- __ENDBLOCK__ -->
                        </div>
                        <div class="card-body">
                            <form autocomplete="off" wire:submit="createRole">
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text"
                                                class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name"
                                                placeholder="Enter your name" wire:model="name">
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
                                                    id="is_active" wire:model.defer="is_active"
                                                    <?php if(isset($role)): ?> <?php echo e($role->is_active == true ? 'checked' : ''); ?> <?php endif; ?>>
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
                                    <div class="text-center bg-cyan">
                                        <h5><strong>Manage Permission For Role</strong></h5>
                                        <!-- __BLOCK__ --><?php $__errorArgs = ['permissions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="p-2">
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            </p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!-- __ENDBLOCK__ -->
                                    </div>
                                    <div class="form-group">
                                        
                                    </div>
                                    <!-- __BLOCK__ --><?php $__empty_1 = true; $__currentLoopData = $modules->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$chunks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="row">
                                            <!-- __BLOCK__ --><?php $__currentLoopData = $chunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-3">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">
                                                                <i class="fas fa-text-width"></i>
                                                                <?php echo e($module->name); ?>

                                                            </h3>
                                                        </div>

                                                        <div class="card-body">
                                                            <!-- __BLOCK__ --><?php $__currentLoopData = $module->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group clearfix">
                                                                            <div class="icheck-primary d-inline">
                                                                                <input type="checkbox"
                                                                                id="permission-<?php echo e($permission->id); ?>"
                                                                                wire:model="permissions"
                                                                                value="<?php echo e($permission->id); ?>">
                                                                                <label for="permission-<?php echo e($permission->id); ?>">
                                                                                    <?php echo e($permission->name); ?>

                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                                        </div>

                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="row">
                                            <div class="col text-center">
                                                <strong>No Module Found</strong>
                                            </div>
                                        </div>
                                    <?php endif; ?> <!-- __ENDBLOCK__ -->
                                    
                                    <div class="modal-footer">
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
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php $__env->startPush('js'); ?>
        <script>
            $('#select-all').click(function(event) {
                if (this.checked) {
                    $(':checkbox').each(function() {
                        this.checked = true;
                    });
                } else {
                    $(':checkbox').each(function() {
                        this.checked = false;
                    });
                }
            });
            $(document).ready(function() {
                $('#select2').select2({
                    placeholder: "Select Role",
                    allowClear: true
                });
                // $('#select2').on('change', function (e) {
                //     var data = $('#select2').select2("val");
                // window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('selected', data);
                // });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php /**PATH /Users/user/Herd/livewire3/resources/views/livewire/role/role-create.blade.php ENDPATH**/ ?>