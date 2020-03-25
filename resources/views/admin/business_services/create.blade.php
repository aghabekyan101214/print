@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"> Add New Business Service</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ $route }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf
                            <div class="form-body">

                                <div class="form-group">
                                    <label class="control-label col-md-2">Slug (Auto Filling)</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="Slug" value="{{ old("slug") }}" required class="form-control slug" name="slug">
                                        @error('slug')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Business Service Title</label>
                                    <div class="col-md-9">
                                        <input type="text" oninput="convertToSlug(this.value)" placeholder="Title" value="{{ old("title") }}" required class="form-control" name="title">
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Business Service Image</label>
                                    <div class="col-md-9">
                                        <input type="file" value="{{ old("image") }}" id="input-file-now" class="dropify" name="image" />
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Upload Slider Images (Choose Multiple)</label>
                                    <div class="col-md-9">
                                        <input multiple value="{{ old("images") }}" type="file" id="input-file-now" class="dropify" name="images[]" />
                                        @error('images')
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
        function convertToSlug(Text)
        {
            let text = Text
                .toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,'')
                ;
            $(".slug").val(text);
        }
    </script>
@endsection
