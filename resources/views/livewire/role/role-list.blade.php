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
                            <a wire:navigate href="{{ route('app.role.create') }}"
                                class="btn btn-primary float-right"><i class="fa fa-plus-circle mr-1"></i> Add New</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card-tools flex">
                                <x-table.live-search wire:model.live="searchTerm" />
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
                                        {{--                                    <th style="width: 10px">#</th> --}}
                                        <th>Role Nmae</th>
                                        <th>Permission</th>
                                        <th>Status</th>
                                        <th>Created_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody wire:loading.class="text-muted">
                                    @forelse ($roles as $item)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->permissions_count }}</td>
                                            <td>
                                                @if ($item->is_active == true)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-warning">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $item->created_at->diffForhumans() }}
                                            </td>
                                            <td>
                                                @permission('role-update')
                                                    <a href="{{ route('app.role.edit', $item->id) }}">
                                                        <i class="fa fa-edit mr-1"></i>
                                                    </a>
                                                @endpermission
                                                @if ($item->deletable == true)
                                                    @permission('role-delete')
                                                        <a href=""
                                                            wire:click.prevent="deleteConfirm({{ $item }})">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                    @endpermission
                                                @else
                                                    <span class="badge badge-warning">Not Deletable</span>
                                                @endif
                                            </td>
                                        </tr>

                                    @empty
                                        <div>
                                            <tr class="text-center">
                                                <td colspan="5">No Data Found.</td>
                                            </tr>
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <x-table.per-page wire:model.live.debounce.150ms="perPage" />
                            <div>
                                {{-- {{ $roles->links() }} --}}
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

    {{-- <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
         wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ ($showEditModal) ? 'Edit' : 'Create' }}
                        Module</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form autocomplete="off" wire:submit="{{ $showEditModal ? 'updateModule' : 'createModule'}}">
                    <div class="modal-body">
                        <div class="card-body">
                            @if ($subModule)
                                <div class="form-group">
                                    <label for="name">Submodule Name *</label>
                                    <input type="text"
                                           class="form-control @error('form.name') is-invalid @enderror"
                                           id="name" placeholder="Enter submodule name" wire:model.live="form.name">
                                    @error('form.name')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="name">Module Name *</label>
                                    <input type="text"
                                           class="form-control @error('form.name') is-invalid @enderror"
                                           id="name" placeholder="Enter module name" wire:model.live="form.name">
                                    @error('form.name')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            @endif
                            @if ($subModule)
                                <div class="form-group">
                                    <label for="name">URL *</label>
                                    <input type="text"
                                           class="form-control @error('form.url') is-invalid @enderror"
                                           id="name"
                                           placeholder="Module name(singular)/sub module name plural(e.g dev-consol/permissions)"
                                           wire:model="form.url">
                                    @error('form.url')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="name">URL *</label>
                                    <input type="text"
                                           class="form-control @error('form.url') is-invalid @enderror"
                                           id="name"
                                           placeholder="Enter Module Name(e.g dev-console)"
                                           wire:model.lazy="form.url">
                                    @error('form.url')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="name">Order *</label>
                                <input type="number"
                                       class="form-control @error('form.sort_order') is-invalid @enderror"
                                       id="name" placeholder="Enter Order" wire:model.live="form.sort_order">
                                @error('form.sort_order')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Icon *</label>
                                <input type="text"
                                       class="form-control @error('form.icon') is-invalid @enderror"
                                       id="name" placeholder="Enter icon (e.g fa fa-user)" wire:model="form.icon">
                                @error('form.icon')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox"
                                           class="custom-control-input @error('form.is_active') is-invalid @enderror"
                                           id="is_active"
                                           wire:model.lazy="form.is_active" @isset($service) {{ $service->is_active==true ? 'checked' : ''}} @endisset>
                                    <label class="custom-control-label" for="is_active">Status *</label>
                                </div>
                                @error('form.is_active')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                class="fa fa-save mr-1"></i>{{ ($showEditModal) ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
</div>
@push('js')
    <script>
        $(document).ready(function() {
            $('.module').select2();
        });
    </script>
@endpush
