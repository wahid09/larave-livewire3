<div>
    @section('title')
        user-create
    @endsection
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Users</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('app.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                            <h5 class="m-0 float-left">User Management</h5>
                            @permission('user-mgt-index')
                            <a href="{{ route('app.user-management/user-mgts') }}"
                               class="btn btn-warning float-right"><i
                                    class="fa fa-arrow-left mr-1"></i> Back</a>
                            @endpermission
                        </div>
                        <div class="card-body">
                            <form autocomplete="off"
                                  wire:submit="createUser">
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div wire:ignore class="form-group">
                                                    <label for="role_id">Role *</label>
                                                    <select class="form-control @error('form.role_id') is-invalid @enderror"
                                                            id="select2" wire:model="form.role_id" style="width: 100%">
                                                        <option value=""></option>
                                                        @foreach($roles as $role)
                                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('form.role_id')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">User Name *</label>
                                                    <input type="text"
                                                           class="form-control @error('form.username') is-invalid @enderror"
                                                           id="username" placeholder="Enter your user name"
                                                           wire:model.live="form.username">
                                                    @error('form.username')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="full_name">Full Name *</label>
                                                    <input type="text"
                                                           class="form-control @error('form.full_name') is-invalid @enderror"
                                                           id="full_name" placeholder="Enter your full name"
                                                           wire:model="form.full_name" required>
                                                    @error('form.full_name')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="designation">Designation *</label>
                                                    <input type="text"
                                                           class="form-control @error('form.designation') is-invalid @enderror"
                                                           id="designation" placeholder="Enter your Designation"
                                                           wire:model="form.designation" required>
                                                    @error('form.designation')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="ba_no">Army No *</label>
                                                    <input type="text"
                                                           class="form-control @error('form.ba_no') is-invalid @enderror"
                                                           id="ba_no" placeholder="Enter your Army Number"
                                                           wire:model="form.ba_no" required>
                                                    @error('form.ba_no')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email Address *</label>
                                                    <input type="email"
                                                           class="form-control @error('form.email') is-invalid @enderror"
                                                           id="email"
                                                           placeholder="Enter email" wire:model="form.email"
                                                           value="{{ $user->email ?? old('email') }}" required>
                                                    @error('form.email')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-check">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div wire:ignore class="form-group">
                                                    <label for="division_id">Division/Unit *</label>
                                                    <select
                                                        class="form-control @error('form.division_id') is-invalid @enderror"
                                                        id="division_id" wire:model="form.division_id"
                                                        style="width: 100%">
                                                        <option value=""></option>
                                                        @foreach($divisions as $item)
                                                            <option
                                                                value="{{ $item->id }}">{{ $item->division_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('form.division_id')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password *</label>
                                                    <input type="password"
                                                           class="form-control @error('form.password') is-invalid @enderror"
                                                           id="password" placeholder="Password"
                                                           wire:model="form.password">
                                                    @error('form.password')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirm_password">Retype Password *</label>
                                                    <input type="password"
                                                           class="form-control @error('form.password_confirmation') is-invalid @enderror"
                                                           id="confirm_password" placeholder="Confirm Password"
                                                           wire:model="form.password_confirmation">
                                                    @error('form.password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="tel"
                                                           class="form-control @error('form.phone') is-invalid @enderror"
                                                           id="phone"
                                                           wire:model="form.phone"
                                                           pattern="[0-9]{11}">
                                                    <small>Format: xxxxx-xxx-xxx</small>
                                                    @error('form.phone')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text"
                                                           class="form-control @error('form.address') is-invalid @enderror"
                                                           id="address" placeholder="Address"
                                                           wire:model="form.address">
                                                    @error('form.address')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox"
                                                               class="custom-control-input @error('form.status') is-invalid @enderror"
                                                               id="is_active"
                                                               wire:model="form.status">
                                                        <label class="custom-control-label"
                                                               for="is_active">Status</label>
                                                    </div>
                                                    @error('form.status')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
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
        </div>
    </div>
</div>
@push('js')
    <script>
        $(document).ready(function () {
            $('#select2').select2({
                placeholder: "Select Role",
                allowClear: true
            });
            $('#select2').on('change', function (e) {
                var data = $('#select2').select2("val");
            @this.set('role_id', data);
            });
        });
        $(document).ready(function () {
            $('#division_id').select2({
                placeholder: "Select Unit",
                allowClear: true
            });
            $('#division_id').on('change', function (e) {
                var data = $('#division_id').select2("val");
            @this.set('division_id', data);
            });
        });
        $(document).ready(function () {
            $('#rank').select2({
                placeholder: "Select Rank",
                allowClear: true
            });
            $('#rank').on('change', function (e) {
                var data = $('#rank').select2("val");
            @this.set('rank_id', data);
            });
        });
    </script>
@endpush
