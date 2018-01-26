@extends('layouts.app')

@section('title')
Create Product
@endsection

@section('content')

<form id="validate" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('products/create') }}">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-sm-6">
            @include('products.generalCard')
        </div>

        <div class="col-sm-6">
            @include('products.costCard')
            @include('products.variationsCard')
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
