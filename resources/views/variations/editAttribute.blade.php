@extends('layouts.app')

@section('title')
Edit Attribute
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
                <input type="text" class="form-control" name="title" value="@if(old('title')) {{ old('title') }} @else {{ $fetchedAttribute->title }} @endif" required>
                @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif

            </fieldset>

            <button type="submit" class="btn btn-primary">
                Edit Variation Attribute
            </button>

            <button id="deleteBtn" type="button" class="btn btn-danger" style="float:right;">
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
            window.location.replace('delete/' + '{{ $fetchedAttribute->id }}');
        });
    });
</script>

@endpush