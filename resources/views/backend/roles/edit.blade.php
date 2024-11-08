@extends('backend.layouts.app')
@section('title')
    {{ __('edit') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title line-height-36">{{ __('edit') }}</h3>
                        <a href="{{ route('role.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                            <i class="fas fa-arrow-left mr-1"></i> 
                            {{ __('back') }}
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form role="form" action="{{ route('role.update', $role->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <x-forms.label name="name" for="role_name" />
                                        <input value="{{ $role->name }}" name="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" id="role_name"
                                            placeholder="{{ __('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <x-forms.label name="permission" />
                                        <div class="custom-control custom-checkbox">
                                            <input
                                                {{ App\Models\Admin::roleHasPermission($role, $permissions) ? 'checked' : '' }}
                                                class="custom-control-input" type="checkbox" id="permission_all" value="1">
                                            <label for="permission_all" class="custom-control-label">
                                                {{ __('all') }}
                                            </label>
                                        </div>
                                        <hr>
                                        @php $i=1; @endphp
                                        @foreach ($permission_groups as $group)
                                            @php
                                                $permissionsInGroup = App\Models\Admin::getpermissionsByGroupName($group->name);
                                                $j = 1;
                                            @endphp
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input
                                                            {{ App\Models\Admin::roleHasPermission($role, $permissionsInGroup) ? 'checked' : '' }}
                                                            class="custom-control-input group-checkbox" type="checkbox"
                                                            id="{{ $i }}management"
                                                            onclick="CheckPermissionByGroup('role-{{ $i }}-management-checkbox',this)"
                                                            value="2">
                                                        <label for="{{ $i }}management"
                                                            class="custom-control-label text-capitalize">{{ $group->name }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-9 role-{{ $i }}-management-checkbox">
                                                    @foreach ($permissionsInGroup as $permission)
                                                        <div class="custom-control custom-checkbox">
                                                            <input
                                                                onclick="checksinglepermission('role-{{ $i }}-management-checkbox','{{ $i }}management',{{ count($permissionsInGroup) }})"
                                                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                                name="permissions[]" class="custom-control-input"
                                                                type="checkbox"
                                                                id="permission_checkbox_{{ $permission->id }}"
                                                                value="{{ $permission->name }}">
                                                            <label for="permission_checkbox_{{ $permission->id }}"
                                                                class="custom-control-label">{{ $permission->name }}</label>
                                                        </div>
                                                        @php $j++; @endphp
                                                    @endforeach
                                                </div>
                                            </div>
                                            <hr>
                                            @php $i++; @endphp
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-sync mr-1"></i>
                                            {{ __('save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#permission_all').click(function() {
            if ($(this).is(':checked')) {
                // check all the checkbox
                $('input[type=checkbox]').prop('checked', true);
            } else {
                // uncheck all the checkbox
                $('input[type=checkbox]').prop('checked', false);
            }
        });

        // check permission by group
        function CheckPermissionByGroup(classname, checkthis) {
            const classCheckBoxes = $('.' + classname + ' input[type=checkbox]');
            classCheckBoxes.prop('checked', checkthis.checked);
            implementallcheck();
        }

        function checksinglepermission(groupClassname, groupId, countTotalPermission) {
            const classCheckbox = $('.' + groupClassname + ' input[type=checkbox]');
            const groupIDCheckBox = $('#' + groupId);

            groupIDCheckBox.prop('checked', classCheckbox.length === countTotalPermission && classCheckbox.filter(':checked').length === countTotalPermission);
            implementallcheck();
        }

        function implementallcheck() {
            const allCheckboxes = $('input[type="checkbox"]');
            const allGroupCheckboxes = $('.group-checkbox');

            const totalCount = allCheckboxes.length - allGroupCheckboxes.length;
            const checkedCount = allCheckboxes.filter(':checked').length;

            $('#permission_all').prop('checked', totalCount === checkedCount);

            // If all groups are checked and then a group is unchecked,
            // upon rechecking any group, permission_all should be checked
            if (allGroupCheckboxes.length === $('.group-checkbox:checked').length) {
                $('#permission_all').prop('checked', true);
            }
        }
    </script>
@endsection
