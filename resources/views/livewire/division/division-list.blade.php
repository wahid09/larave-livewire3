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
                        <li class="breadcrumb-item"><a wire:navigate href="{{ route('app.dashboard') }}">Dashboard</a></li>
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
                                    @forelse ($divisions as $item)
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
                                            <td>{{ $item->division_name }}</td>
                                            <td>
                                                {{ $item->division_code }}
                                            </td>
                                            <td>
                                                {{ $item->created_at->diffForhumans() }}
                                            </td>
                                            <td>
                                                @permission('division-create')
                                                <a href=""
                                                    wire:click.prevent="addNewSubDivision({{ $item }})">
                                                    <i class="fa fa-plus-circle mr-1"></i>
                                                </a>
                                                @endpermission
                                                @permission('division-update')
                                                <a href="" wire:click.prevent="editDivision({{ $item }})">
                                                    <i class="fa fa-edit mr-1"></i>
                                                </a>
                                                @endpermission
                                                @permission('module-delete')
                                                <a href=""
                                                    wire:click.prevent="deleteConfirm({{ $item->id }})">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </a>
                                               @endpermission
                                            </td>
                                        </tr>
                                        @foreach ($item->children as $key)
                                            <tr class="@if ($showMore == $item->id) @else d-none @endif"
                                                style="background-color:#f2eee4">
                                                <td></td>
                                                <td>{{ $key->division_name }}</td>
                                                <td>{{ $key->division_code }}</td>
                                                <td>{{ $key->created_at->diffForhumans() }}</td>
                                                <td>
                                                    @permission('division-update')
                                                    <a href=""
                                                        wire:click.prevent="editUnit({{ $key }})">
                                                        <i class="fa fa-edit mr-1"></i>
                                                    </a>
                                                    @endpermission
                                                    @permission('division-delete')
                                                    <a href=""
                                                        wire:click.prevent="deleteConfirm({{ $key->id }})">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </a>
                                                    @endpermission
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
                                {{ $divisions->links() }}
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
                        Division</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form autocomplete="off" wire:submit="{{ $showEditModal ? 'updateDivision' : 'createDivision'}}">
                    <div class="modal-body">
                        <div class="card-body">
                            @if($subModule)
                                <div class="form-group">
                                    <label for="name">Unit Name *</label>
                                    <input type="text"
                                           class="form-control @error('form.division_name') is-invalid @enderror"
                                           id="name" placeholder="Enter Unit name" wire:model="form.division_name">
                                    @error('form.division_name')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="name">Division Name *</label>
                                    <input type="text"
                                           class="form-control @error('form.division_name') is-invalid @enderror"
                                           id="name" placeholder="Enter division name" wire:model="form.division_name">
                                    @error('form.division_name')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            @endif
                                <div class="form-group">
                                    <label for="name">Division Code</label>
                                    <input type="text"
                                           class="form-control @error('form.division_code') is-invalid @enderror"
                                           id="name"
                                           placeholder="Division Code"
                                           wire:model="form.division_code">
                                    @error('form.division_code')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            
                            <div class="form-group">
                                <label for="name">Order</label>
                                <input type="number"
                                       class="form-control @error('form.order') is-invalid @enderror"
                                       id="name" placeholder="Enter Order" wire:model.live="form.order">
                                @error('form.order')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Division Address *</label>
                                <textarea type="text"
                                       class="form-control @error('form.division_address') is-invalid @enderror"
                                       id="name" placeholder="Enter icon (e.g fa fa-user)" wire:model="form.division_address"></textarea>
                                @error('form.division_address')
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

