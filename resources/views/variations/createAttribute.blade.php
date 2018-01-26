@extends('layouts.app')

@section('title')
Create Attribute
@endsection

@section('content')

<div class="card">
    <div class="card-block">
        <form id="validate" class="form-horizontal" role="form" method="POST" action="{{ url('/variations/attributes/create') }}">
            {{ csrf_field() }}

            <fieldset class="form-group @if($errors->has('title')) has-danger @endif">
                <label for="title">
                    Title <span class='text-red strong'>*</span>
                </label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif
            </fieldset>
            
            <button type="submit" class="btn btn-primary">
                Create Variation Attribute
            </button>

        </form>
    </div>
</div>

@endsection
