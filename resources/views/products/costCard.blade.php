<div id="pricingComponent" class="card">
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
                    <input type="text" class="form-control" v-bind:value="listing_price" disabled>
                </div>
            </fieldset>

        </div>

        <div class="col-sm-4">
            <fieldset class="form-group">
                <label>
                    Estimated Profit
                </label>
                <div class="input-group">
                    <input type="text" class="form-control" v-bind:value="estimated_profit" disabled>
                </div>
            </fieldset>
        </div>
    </div>
</div>