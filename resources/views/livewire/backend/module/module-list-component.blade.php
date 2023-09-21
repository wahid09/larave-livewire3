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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Module List</h3>
                            <button wire:click="addNewModule" class="btn btn-primary btn-sm float-right"><i
                                    class="fa fa-plus-circle mr-1"></i> Add New
                            </button>
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
                                        <th>Module Nmae</th>
                                        {{--                                    <th>Sub-Module</th> --}}
                                        <th>URL</th>
                                        <th>Created_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody wire:loading.class="text-muted">
                                    @forelse ($modules as $item)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td class="align-middle">
                                                @if ($showMore == 0)
                                                    <button type="button" wire:click="open({{ $item->id }})"
                                                        class="btn btn-link text-info">
                                                        <i class="far fa-plus-square"></i>
                                                    </button>
                                                @elseif($showMore == $item->id)
                                                    <button type="button" wire:click="hideRow({{ $item->id }})"
                                                        class="btn btn-link text-info">
                                                        <i class="far fa-minus-square"></i>
                                                    </button>
                                                @else
                                                    <button type="button" wire:click="open({{ $item->id }})"
                                                        class="btn btn-link text-info">
                                                        <i class="far fa-plus-square"></i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                {{ $item->url }}
                                            </td>
                                            <td>
                                                {{ $item->created_at->diffForhumans() }}
                                            </td>
                                            <td>
                                                {{--                                            @permission('module-create') --}}
                                                <a href=""
                                                    wire:click.prevent="addNewSubModule({{ $item }})">
                                                    <i class="fa fa-plus-circle mr-1"></i>
                                                </a>
                                                {{--                                            @endpermission --}}
                                                {{--                                            @permission('module-update') --}}
                                                <a href="" wire:click.prevent="editModule({{ $item }})">
                                                    <i class="fa fa-edit mr-1"></i>
                                                </a>
                                                {{--                                            @endpermission --}}
                                                {{--                                            @permission('module-delete') --}}
                                                <a href=""
                                                    wire:click.prevent="deleteConfirm({{ $item->id }})">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </a>
                                                {{--                                            @endpermission --}}
                                            </td>
                                        </tr>
                                        @foreach ($item->children as $key)
                                            <tr class="@if ($showMore == $item->id) @else d-none @endif"
                                                style="background-color:#f2eee4">
                                                <td></td>
                                                <td>{{ $key->name }}</td>
                                                <td>{{ $key->url }}</td>
                                                <td>{{ $key->created_at->diffForhumans() }}</td>
                                                <td>
                                                    {{--                                                @permission('module-update') --}}
                                                    <a href=""
                                                        wire:click.prevent="editModule({{ $key }})">
                                                        <i class="fa fa-edit mr-1"></i>
                                                    </a>
                                                    {{--                                                @endpermission --}}
                                                    {{--                                                @permission('module-delete') --}}
                                                    <a href=""
                                                        wire:click.prevent="deleteConfirm({{ $key->id }})">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </a>
                                                    {{--                                                @endpermission --}}
                                                </td>
                                            </tr>
                                        @endforeach
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
                                {{ $modules->links() }}
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ($showEditModal) ? 'Edit' : 'Create' }}
                        Module</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form autocomplete="off" wire:submit="{{ $showEditModal ? 'updateModule' : 'createModule'}}">
                    <div class="modal-body">
                        <div class="card-body">
                            @if($subModule)
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
                            @if($subModule)
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
                                {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label> --}}
                                {{-- <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch> --}}
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
    </div>
</div>
@push('js')
    <script>
        $(document).ready(function() {
            $('.module').select2();
        });
    </script>
@endpush
