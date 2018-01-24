@extends('layouts.app')

@section('title')
Edit Product
@endsection

@section('content')

<div class="card">
    <div class="card-block">
        <form id="validate" class="form-horizontal" role="form" method="POST" action="{{ url('/products/' . $fetchedProduct->id) }}">
            {{ csrf_field() }}

            <fieldset class="form-group">
                <label for="title">
                    Title <span class='text-red strong'>*</span>
                </label>
                <input type="text" class="form-control" name="title" value="@if(old('title')) {{ old('title') }} @else {{ $fetchedProduct->title }} @endif" required>
                @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif
            </fieldset>

            <fieldset class="form-group @if($errors->has('description')) has-danger @endif">
                <label for="description">
                    Description <span class='text-red strong'>*</span>
                </label>
                <textarea class="form-control summernote" name="description" value="testing"></textarea>>
                @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
                @endif
            </fieldset>

            <button type="submit" class="btn btn-primary">
                Edit Product
            </button>

        </form>
    </div>
</div>

@endsection

@push('scripts')

<script src="{{ asset('vendor/summernote/dist/summernote.js') }}"></script>

<script type="text/javascript">
$(".summernote").summernote("code", "@if(old('description')) {{ old('description') }} @else {{ $fetchedProduct->description }} @endif");
</script>

@endpush