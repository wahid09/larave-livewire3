<div>
    @section('title')
        role-update
    @endsection
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Roles</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('app.dashboard') }}">Dashboard</a></li>
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
                            @permission('role-index')
                                <a wire:navigate href="{{ route('app.dev-console/roles') }}" class="btn btn-warning float-right"><i
                                        class="fa fa-arrow-left mr-1"></i> Back</a>
                            @endpermission
                        </div>
                        <div class="card-body">
                            <form autocomplete="off" wire:submit="updateRole">
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder="Enter your name" wire:model="name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox"
                                                    class="custom-control-input @error('is_active') is-invalid @enderror"
                                                    id="is_active" wire:model.defer="is_active"
                                                    @isset($role) {{ $role->is_active == true ? 'checked' : '' }} @endisset>
                                                <label class="custom-control-label" for="is_active">Status</label>
                                            </div>
                                            @error('is_active')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-check">

                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="text-center bg-cyan">
                                        <h5><strong>Manage Permission For Role</strong></h5>
                                        @error('permissions')
                                            <p class="p-2">
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        
                                    </div>
                                    @forelse ($modules->chunk(4) as $key=>$chunks)
                                        <div class="row">
                                            @foreach ($chunks as $module)
                                                <div class="col-md-3">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">
                                                                <i class="fas fa-text-width"></i>
                                                                {{ $module->name }}
                                                            </h3>
                                                        </div>

                                                        <div class="card-body">
                                                            @foreach ($module->permissions as $permission)
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group clearfix">
                                                                            <div class="icheck-primary d-inline">
                                                                                <input type="checkbox"
                                                                                id="permission-{{$permission->id}}"
                                                                                wire:model="permissions"
                                                                                value="{{ $permission->id }}">
                                                                                <label for="permission-{{$permission->id}}">
                                                                                    {{ $permission->name }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        {{-- </div> --}}
                                    @empty
                                        <div class="row">
                                            <div class="col text-center">
                                                <strong>No Module Found</strong>
                                            </div>
                                        </div>
                                    @endforelse
                                    {{-- </form> --}}
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
    @push('js')
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
                // @this.set('selected', data);
                // });
            });
        </script>
    @endpush
