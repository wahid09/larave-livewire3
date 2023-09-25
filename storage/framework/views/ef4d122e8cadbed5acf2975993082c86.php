<div>
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Import</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            
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
                                <h5 class="m-0">Data Import</h5>
                            </div>
                            
                            <div class="card-body">
                                <form autocomplete="off" action="" enctype="multipart/form-data" method="POST" accept-charset="UTF-8">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <div class="form-group" wire:ignore>
                                                <label for="model">Model *</label>
                                                <select class="form-control <?php $__errorArgs = ['model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="modelField" name="model" style="width: 100%">
                                                    <option value="">Select</option>
                                                    <!-- __BLOCK__ --><?php $__currentLoopData = $modelLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                                                </select>
                                                <!-- __BLOCK__ --><?php $__errorArgs = ['model'];
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
                                                <label for="file_import">File *</label>
                                                <input type="file"
                                                       class="form-control <?php $__errorArgs = ['file_import'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       id="file_import"
                                                       name="file_import">
                                                <!-- __BLOCK__ --><?php $__errorArgs = ['file_import'];
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
                                                class="fa fa-upload mr-1"></i>Upload
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
</div>
<?php $__env->startPush('js'); ?>
    <script>
        // $(document).ready(function () {
        //     $('#modelField').select2({
        //         placeholder: "Select Model",
        //         allowClear: true
        //     });
        // });
        $(document).ready(function () {
            $('#modelField').select2({
                placeholder: "Select Module",
                allowClear: true
            });
            $('#modelField').on('change', function (e) {
                var data = $('#modelField').select2("val");
            window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('module_id', data);
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH D:\laragon\www\larave-livewire3\resources\views/livewire/dev-console/data-import.blade.php ENDPATH**/ ?>