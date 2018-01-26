@extends('layouts.app')

@section('title')
Create Option
@endsection

@section('content')

<div class="card">
    <div class="card-block">
        <form id="validate" class="form-horizontal" role="form" method="POST" action="{{ url('/variations/options/create') }}">
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
            
            <fieldset class="form-group @if($errors->has('parent_attribute')) has-danger @endif">
                <label for="parent_attribute">
                    Parent Attribute <span class='text-red strong'>*</span>
                </label>
                <select class="form-control" name="parent_attribute" required>
                    <option></option>
                    @foreach($attributes as $attribute)
                    <option value="{{ $attribute->id }}">{{ ucwords($attribute->title) }}</option>
                    @endforeach
                </select>
                @if ($errors->has('parent_attribute'))
                <span class="help-block">
                    <strong>{{ $errors->first('parent_attribute') }}</strong>
                </span>
                @endif
            </fieldset>
            
            <fieldset class="form-group @if($errors->has('swatch')) has-danger @endif">
                <label for="swatch">
                    Swatch <span class='text-red strong'>*</span>
                </label>
                <input type="text" class="form-control" name="swatch" value="{{ old('swatch') }}" required>
                @if ($errors->has('swatch'))
                <span class="help-block">
                    <strong>{{ $errors->first('swatch') }}</strong>
                </span>
                @endif
            </fieldset>

            <button type="submit" class="btn btn-primary">
                Create Variation Option
            </button>

        </form>
    </div>
</div>

@endsection
