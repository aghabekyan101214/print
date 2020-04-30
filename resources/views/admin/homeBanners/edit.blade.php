@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"> Add New {{ $title }}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ $route."/".$homeBanner->id }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf
                            @method("PUT")
                            <div class="form-body">

                                <div class="form-group">
                                    <label class="control-label col-md-2">Products</label>
                                    <div class="col-md-9">
                                        <select name="product_slug" class="form-control" id="">
                                            <option value="">Choose Product</option>
                                            @foreach($products as $p)
                                                <option @if($homeBanner->product_slug == $p->slug) selected @endif value="{{ $p->slug }}">{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Image</label>
                                    <div class="col-md-9">
                                        <input type="file" value="{{ $homeBanner->image }}" data-default-file="{{ asset("uploads/$homeBanner->image") }}" id="input-file-now" class="dropify" name="image" />
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-offset-11 col-md-9">
                                                    <button type="submit" class="btn btn-success"><i
                                                            class="fa fa-check"></i>
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
