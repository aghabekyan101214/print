@extends('layouts.app')

@section('content')
    <style>
        li{
            padding: 10px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"> Add New Business Service</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ $route }}/sort" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @csrf
                            <div class="col-md-12" style="margin-bottom: 10px;">
                                <ul class="sortable list-style-none">
                                    @foreach($product->forms as $f)
                                        <li class="ui-state-default ui-sortable-handle">
                                            <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                                            {{ $f->name }}
                                            <input type="hidden" name="form_id[]" value="{{ $f->id }}">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
