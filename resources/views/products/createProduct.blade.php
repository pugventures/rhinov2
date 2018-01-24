@extends('layouts.app')

@section('title')
Create Product
@endsection

@section('content')

<div class="card">
    <div class="card-block">
        <form id="validate" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('products/create') }}">
            {{ csrf_field() }}
            <div id="productCreateComponent">
                <div class="row">
                    <div class="col-sm-12">
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
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
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
                    </div>

                    <div class="col-sm-6">
                        <fieldset id="categoryAspects" class="form-group @if($errors->has('aspects')) has-danger @endif">
                            <label for="category">
                                Category Aspects
                            </label>
                            
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

                <button type="submit" class="btn btn-primary">
                    Create Product
                </button>
            </div>
        </form>
    </div>
</div>

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
        aspects: ""
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
