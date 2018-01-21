@extends('layouts.app')

@section('title')
Edit User
@endsection

@section('content')

<div class="card">
    <div class="card-block">
        <form id="validate" class="form-horizontal" role="form" method="POST" action="{{ url('/users/' . $fetchedUser->id) }}">
            {{ csrf_field() }}

            <fieldset class="form-group">
                
                <label for="first_name">
                    First Name <span class='text-red strong'>*</span>
                </label>
                <input type="text" class="form-control" name="first_name" value="@if(old('first_name')) {{ old('first_name') }} @else {{ $fetchedUser->first_name }} @endif" required>
                @if ($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
                @endif
                
            </fieldset>
            <fieldset class="form-group">
                
                <label for="last_name">
                    Last Name <span class='text-red strong'>*</span>
                </label>
                <input type="text" class="form-control" name="last_name" value="@if(old('last_name')) {{ old('last_name') }} @else {{ $fetchedUser->last_name }} @endif" required>
                @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
                @endif
                
            </fieldset>
            <fieldset class="form-group">
                
                <label for="email">
                    Email <span class='text-red strong'>*</span>
                </label>
                <input type="email" class="form-control" name="email" value="@if(old('email')) {{ old('email') }} @else {{ $fetchedUser->email }} @endif" required>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                
            </fieldset>
            
            
            <button type="submit" class="btn btn-primary">
                Edit User
            </button>
            
        </form>
    </div>
</div>

@endsection
