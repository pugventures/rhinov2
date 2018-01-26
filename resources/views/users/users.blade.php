@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')

<div class='row m-b-1'>
    <div class='col-sm-3'>
        <a href='{{ url('users/create') }}'><button type='button' id='createUserBtn' class='btn btn-block btn-success'>Create User</button></a>
    </div>
</div>

<div class='row'>
    <div class='col-sm-12'>
        <table id="usersTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>
                        First Name
                    </th>
                    <th>
                        Last Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Role
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="dataTableRow" data-id="{{ $user->id }}">
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')

<script type="text/javascript">
$('#usersTable').DataTable({searching: false, paging: false});

$('.dataTableRow').bind('click', function () {
    window.location.replace('users/' + $(this).data('id'));
});
</script>

@endpush
