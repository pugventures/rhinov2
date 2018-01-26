@extends('layouts.app')

@section('title')
Edit Option
@endsection

@section('content')

<div class="card">
    <div class="card-block">
        <form id="validate" class="form-horizontal" role="form" method="POST">
            {{ csrf_field() }}

            <fieldset class="form-group">
                <label for="title">
                    Title <span class='text-red strong'>*</span>
                </label>
                <input type="text" class="form-control" name="title" value="@if(old('title')) {{ old('title') }} @else {{ $fetchedOption->title }} @endif" required>
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
                    <option value="{{ $attribute->id }}" @if($attribute->id === $fetchedOption->variation_attribute_id) selected @endif>{{ ucwords($attribute->title) }}</option>
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
                <input type="text" class="form-control" name="swatch" value="@if(old('swatch')) {{ old('swatch') }} @else {{ $fetchedOption->swatch }} @endif" required>
                @if ($errors->has('swatch'))
                <span class="help-block">
                    <strong>{{ $errors->first('swatch') }}</strong>
                </span>
                @endif
            </fieldset>
            
            <button type="submit" class="btn btn-primary" style="float:right;">
                Edit Variation Option
            </button>

            <button id="deleteBtn" type="button" class="btn btn-danger">
                DELETE
            </button>

        </form>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">
    $('#deleteBtn').on('click', function () {
        swal({
            title: 'Are you sure?',
            text: 'This action cannot be undone.',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false
        }, function () {
            window.location.replace('delete/' + '{{ $fetchedOption->id }}');
        });
    });
</script>

@endpush