@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-8">
            Hello
        </div>
   
        <div class="col-sm-12 col-md-4">
            <x-form route="my.product.save" :update="$record->id ?? null">
                <x-slot name="body">
                    <x-card variant="primary"  title="{{__('msg.organizations').' '.__('msg.information')}}">
                        <x-slot name="body">
                            
                            
                            <div class="form-group">
                                <label for="productId">Products</label>
                                <select name="product_id[]" multiple required class="form-control" id="productId">
                                    <option value="" disabled selected>---Select Product Name---</option>
                                    @foreach($products as $product)
                                    <?php $product->id  ?>
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <x-slot name="footer">
                                {!! Form::submit(__('msg.save'),["class"=>"btn btn-success float-right"]) !!}
                            </x-slot>
                        </x-slot>
                    </x-card>
                </x-slot>
            </x-form>
        </div>
    </div>
@endsection


@section('js')
<script src="{{ asset('assets/select2/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#productId").select2();
    })
</script>

@endsection