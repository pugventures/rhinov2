@extends('layouts.app')

@section('title')
Create Product
@endsection

@section('content')

<form id="validate" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('products/create') }}">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-sm-6">
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
        </div>

        <div class="col-sm-6">
            @include('products.costCard')

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
                                    <h6 class="panel-title m-a-0">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $variation_attribute->id }}" aria-expanded="true" aria-controls="collapse-{{ $variation_attribute->id }}">
                                            {{ ucwords($variation_attribute->title) }}
                                        </a>
                                    </h6>
                                </div>
                                <div id="collapse-{{ $variation_attribute->id }}" class="card-block panel-collapse collapse" role="tabpanel" aria-labelledby="heading-{{ $variation_attribute->id }}">
                                    Checkboxes go here
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!--<select multiple id="variantAttributes" class="multiselect" name="variantAttributes[]">
                            @foreach($variation_attributes as $variation_attribute)
                            <option value='{{ $variation_attribute->title }}'>{{ ucwords($variation_attribute->title) }}</option>
                            @endforeach
                        </select>-->
                    </fieldset>




                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">
        Create Product
    </button>
</form>

@endsection

@push('scripts')

<script type="text/javascript">
    $('.summernote').summernote();
    $('#variantAttributes').multiSelect();

    var pricingComponent = new Vue({
        el: '#pricingComponent',
        data: {
            cost: parseFloat(0.00).toFixed(2),
            dropship_fee: parseFloat(0.00).toFixed(2),
            shipping: parseFloat(0.00).toFixed(2),
            listing_price_saved: parseFloat(0.00).toFixed(2),
            estimated_profit_saved: parseFloat(0.00).toFixed(2)
        },
        computed: {
            listing_price: function () {
                this.listing_price_saved = (((parseFloat(this.cost) + parseFloat(this.dropship_fee) + parseFloat(this.shipping)) * 0.4) + parseFloat(this.cost)).toFixed(2);
                return this.listing_price_saved;
            },
            estimated_profit: function () {
                this.estimated_profit_saved = (this.listing_price_saved - this.cost).toFixed(2);
                if (this.estimated_profit_saved < 0) {
                    (this.estimated_profit_saved = parseFloat(0.00).toFixed(2))
                }
                return this.estimated_profit_saved;
            }
        }
    });

</script>

@endpush
