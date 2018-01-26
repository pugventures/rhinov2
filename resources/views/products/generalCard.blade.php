<div class="card">
    <div class="card-block">
        <fieldset class="form-group @if($errors->has('title')) has-danger @endif">
            <label for="title">
                Title <span class='text-red strong'>*</span>
            </label>
            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
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
            <textarea class="form-control summernote" name="description"></textarea>
            @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
        </fieldset>

        <fieldset class="form-group @if($errors->has('upc')) has-danger @endif">
            <label for="upc">
                UPC <span class='text-red strong'>*</span>
            </label>
            <input type="text" class="form-control" name="upc" value="{{ old('upc') }}" required>
            @if ($errors->has('upc'))
            <span class="help-block">
                <strong>{{ $errors->first('upc') }}</strong>
            </span>
            @endif
        </fieldset>

        <fieldset class="form-group @if($errors->has('purchase_url')) has-danger @endif">
            <label for="upc">
                Purchase URL <span class='text-red strong'>*</span>
            </label>
            <input type="text" class="form-control" name="purchase_url" value="{{ old('purchase_url') }}" required>
            @if ($errors->has('purchase_url'))
            <span class="help-block">
                <strong>{{ $errors->first('purchase_url') }}</strong>
            </span>
            @endif
        </fieldset>
    </div>
</div>