<div class="card">
    <div class="card-block">
        <fieldset class="form-group">
            <label for="title">
                Variations
            </label>
            <div id="accordion" role="tablist" aria-multiselectable="true">
                
                @foreach($variation_attributes as $variation_attribute)

                <div class="card panel panel-default m-b-xs">
                    <div class="card-header panel-heading" role="tab" id="heading-{{ $variation_attribute->id }}">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $variation_attribute->id }}" aria-expanded="true" aria-controls="collapse-{{ $variation_attribute->id }}">
                            <h6 class="panel-title m-a-0">
                                {{ ucwords($variation_attribute->title) }}
                            </h6>
                        </a>
                    </div>
                    <div id="collapse-{{ $variation_attribute->id }}" class="card-block panel-collapse collapse" role="tabpanel" aria-labelledby="heading-{{ $variation_attribute->id }}">

                        @foreach($variation_attribute->options as $option)

                        <div class="col-sm-3 m-b-1">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="variation_options[]" value="{{ $option->id }}">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">{{ ucwords($option->title) }}</span>
                            </label>
                        </div>

                        @endforeach

                    </div>
                </div>
                @endforeach
            </div>
        </fieldset>
    </div>
</div>