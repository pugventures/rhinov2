<div id="variationsComponent" class="card">
    <div class="card-block">
        <fieldset class="form-group">
            <label for="title">
                Variations
            </label>

            <button data-toggle="modal" data-target=".bd-example-modal" type="button" class="btn btn-block btn-success m-b-1">Create New Variation</button>

            <div v-for="(item, key, index) in variations" class="card col-sm-3">
                <div class="card-block">
                    <div v-for="(item, key) in item">
                        <div class="col-sm-6">
                            <strong style="text-transform: capitalize;">@{{ key }}</strong>:
                        </div>
                        <div class="col-sm-6" style="text-transform: capitalize;">
                            @{{ item }}
                        </div>
                    </div>
                </div>
                <button v-on:click="deleteVariation(key)" type="button" class="close" aria-label="Close">
                    <i class="material-icons text-standard">delete</i>
                </button>
            </div>


            <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">New Variation</h4>
                        </div>
                        <div class="modal-body">

                            @foreach($variation_attributes as $attribute)
                            <div class="card">
                                <div class="card-header">{{ ucwords($attribute->title) }}</div>
                                <div class="card-block">
                                    @foreach($attribute->options as $option)
                                    <div class="col-sm-4 m-b-1">

                                        <label class="custom-control custom-radio">
                                            <input value="{{ $option->title }}" v-model="{{ $attribute->title }}" type="radio" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">{{ ucwords($option->title) }}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach

                            <fieldset class="form-group @if($errors->has('cost')) has-danger @endif">
                                <label for="upc">
                                    Selling Price
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        $
                                    </div>
                                    <input type="number" v-model="price" class="form-control">
                                </div>
                                @if ($errors->has('cost'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cost') }}</strong>
                                </span>
                                @endif
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button v-on:click="addVariation()" type="button" class="btn btn-primary">Save Variation</button>
                        </div>
                    </div>
                </div>
            </div>

        </fieldset>

    </div>
</div>