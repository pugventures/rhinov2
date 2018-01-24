@extends('layouts.app')

@section('title')
Create Product
@endsection

@section('content')

<form id="validate" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('products/create') }}">
    {{ csrf_field() }}
    <div id="productCreateComponent">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-block">
                        <fieldset class="form-group @if($errors->has('title')) has-danger @endif">
                            <label for="title">
                                Title <span class='text-red strong'>*</span>
                            </label>
                            <input type="text" v-model="title" class="form-control" name="title" value="{{ old('title') }}" required>
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
                <div class="card">
                    <div class="card-block">

                        <div class="col-sm-4">

                            <fieldset class="form-group @if($errors->has('cost')) has-danger @endif">
                                <label for="upc">
                                    Product Cost <span class='text-red strong'>*</span>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        $
                                    </div>
                                    <input type="number" v-model="cost" class="form-control" name="cost" value="{{ old('cost') }}" required>
                                </div>
                                @if ($errors->has('cost'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cost') }}</strong>
                                </span>
                                @endif
                            </fieldset>

                            <fieldset class="form-group @if($errors->has('dropship_fee')) has-danger @endif">
                                <label for="dropship_fee">
                                    Dropship Fee
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        $
                                    </div>
                                    <input type="number" v-model="dropship_fee" class="form-control" name="dropship_fee" value="{{ old('dropship_fee') }}">
                                </div>
                                @if ($errors->has('dropship_fee'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dropship_fee') }}</strong>
                                </span>
                                @endif
                            </fieldset>

                            <fieldset class="form-group @if($errors->has('shipping')) has-danger @endif">
                                <label for="shipping">
                                    Shipping
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        $
                                    </div>
                                    <input type="number" v-model="shipping" class="form-control" name="shipping" value="{{ old('shipping') }}">
                                </div>
                                @if ($errors->has('shipping'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('shipping') }}</strong>
                                </span>
                                @endif
                            </fieldset>

                        </div>

                        <div class="col-sm-4">
                            <fieldset class="form-group">
                                <label>
                                    Listing Price
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" v-bind:value="listingPrice" disabled>
                                </div>
                            </fieldset>
                        </div>



                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <fieldset id="categorySuggestions" class="form-group @if($errors->has('category')) has-danger @endif">
                            <label for="category">
                                Category <span class='text-red strong'>*</span>
                            </label>
                            <button v-on:click="getCategorySuggestions()" type="button" class="btn btn-block btn-success m-b-1" v-bind:disabled="title.length < 3">Category Suggestions</button>

                            <div v-for="category in categories.categorySuggestions" class="m-b-1">
                                <div class="input-group">
                                    <label class="custom-control custom-radio">
                                        <input class="custom-control-input" name="ebayCategory" type="radio" v-on:click="getCategoryItemAspects(category.category.categoryId)">
                                        <span class="custom-control-indicator"></span>
                                        <span v-for="ancestor in category.categoryTreeNodeAncestors" class="custom-control-description">@{{ ancestor.categoryName }} > </span>
                                        <span>@{{ category.category.categoryName }}</span>
                                    </label>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset id="categoryAspects" class="form-group @if($errors->has('aspects')) has-danger @endif">
                            <div v-for="aspect in aspects.aspects" class="m-b-1">
                                <label for="title" v-bind:for="aspect.localizedAspectName">
                                    @{{ aspect.localizedAspectName }} <span v-if="aspect.aspectRequired" class='text-red strong'>*</span>
                                </label>

                                <select  v-if="aspect.aspectValues" class="form-control" v-bind:name="aspect.localizedAspectName">
                                    <option>&nbsp;</option>
                                    <option v-for="aspectValue in aspect.aspectValues">@{{ aspectValue.localizedValue }}</option>
                                </select>

                                <input v-if="!aspect.aspectValues" type="text" class="form-control" v-bind:name="aspect.localizedAspectName">
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Create Product
        </button>
    </div>
</form>

@endsection

@push('scripts')

<script src="{{ asset('vendor/summernote/dist/summernote.js') }}"></script>

<script type="text/javascript">
$('.summernote').summernote();

var productCreateComponent = new Vue({
    el: '#productCreateComponent',
    data: {
        title: "{{ old('title') }}",
        categories: "",
        aspects: "",
        cost: parseFloat(0.00).toFixed(2),
        dropship_fee: parseFloat(0.00).toFixed(2),
        shipping: parseFloat(0.00).toFixed(2)
    },
    computed: {
        listingPrice: function () {
            return (parseFloat(this.cost) + parseFloat(this.dropship_fee) + parseFloat(this.shipping)).toFixed(2);
        }
    },
    watch: {
        categories: function () {
            this.getCategorySuggestions()
        }
    },
    methods: {
        getCategorySuggestions: function () {
            $.ajax({
                url: 'http://localhost/rhinov2/public/ebay/categorySuggestions',
                data: {title: this.title},
                success: function (response) {
                    this.categories = $.parseJSON(response);
                }.bind(this),
                error: function (response) {
                    console.log('something bad happended');
                }
            });
        },
        getCategoryItemAspects: function (id) {
            $.ajax({
                url: 'http://localhost/rhinov2/public/ebay/categoryAspects',
                data: {categoryId: id},
                success: function (response) {
                    this.aspects = $.parseJSON(response);
                    console.log(this.aspects);
                }.bind(this),
                error: function (response) {
                    console.log('something bad happended');
                }
            });
        }
    }
});
</script>

@endpush
