@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection


@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-8">
            Hello
        </div>
   
        <div class="col-sm-12 col-md-4">
            <x-form route="product.save" :update="$record->id ?? null">
                <x-slot name="body">
                    <x-card variant="primary"  title="{{__('msg.organizations').' '.__('msg.information')}}">
                        <x-slot name="body">
                            <div class="form-group">
                                <?php
                                    $attr = [
                                        'id'        => 'name',
                                        'class'     => 'form-control',
                                        'required'  => 'required',
                                    ];
                                ?>
                                {!! Form::label('name', __('msg.name')) !!}
                                {!! Form::text('name',$record->name ?? old('name'),$attr) !!}
                            </div>
                            <div class="form-group">
                                <?php
                                    $attr = [
                                        'id'        => 'price',
                                        'class'     => 'form-control',
                                        'required'  => 'required',
                                    ];
                                ?>
                                {!! Form::label('price', __('msg.price')) !!}
                                {!! Form::text('price',$record->price ?? old('price'),$attr) !!}
                            </div>
{{-- 
                            <div class="form-group mb-1">
                                {!! Form::label('file', __('msg.picture') ) !!} <br />
                                @if(!empty($record->media))
                                    <img src="{{ $record->media->attachment }}" class="img-thumbnail"  width="250px">
                                @else
                                    <input type="file" name="file">
                                @endif
                            </div> --}}


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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    const address = $('#address');
    address.summernote({
        height     : 120,
        placeholder:'Dhaka,Bangladesh',
        toolbar: [
            ['style', ['bold']],
            ['font', [ 'fontname','fontsize']],
        ]
    });
</script>
@endsection