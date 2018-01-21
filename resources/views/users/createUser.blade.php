@extends('layouts.app')

@section('title')
Create User
@endsection

@section('content')

<div class="card">
    <div class="card-block">
        <form id="validate" class="form-horizontal" role="form" method="POST" action="{{ url('/users/create') }}">
            {{ csrf_field() }}

            <fieldset class="form-group @if($errors->has('first_name')) has-danger @endif">
                <label for="first_name">
                    First Name <span class='text-red strong'>*</span>
                </label>
                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                @if ($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
                @endif
            </fieldset>
            
            <fieldset class="form-group @if($errors->has('last_name')) has-danger @endif">
                <label for="last_name">
                    Last Name <span class='text-red strong'>*</span>
                </label>
                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
                @endif
            </fieldset>
            
            <fieldset class="form-group @if($errors->has('email')) has-danger @endif">
                <label for="email">
                    Email <span class='text-red strong'>*</span>
                </label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <span class="help-block has-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </fieldset>
            
            <fieldset class="form-group @if($errors->has('password')) has-danger @endif">
                <label for="password">
                    Password <span class='text-red strong'>*</span>
                </label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </fieldset>
            
            <fieldset class="form-group @if($errors->has('role')) has-danger @endif">
                <label for="role">
                    Role <span class='text-red strong'>*</span>
                </label>
                <select name="role" class="form-control">
                    <option value='administrator'>Administrator</option>
                </select>
                @if ($errors->has('role'))
                <span class="help-block">
                    <strong>{{ $errors->first('role') }}</strong>
                </span>
                @endif
            </fieldset>

            <button type="submit" class="btn btn-primary">
                Create User
            </button>

        </form>
    </div>
</div>

@endsection
