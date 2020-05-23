@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"> Add New Business Service</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ $route."/".$businessService->id }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf
                            @method("PUT")
                            <div class="form-body">

                                <div class="form-group">
                                    <label class="control-label col-md-2">Slug (Auto Filling)</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="Slug" value="{{ $businessService->slug }}" required class="form-control slug" name="slug">
                                        @error('slug')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Business Service Title</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="Title" value="{{ $businessService->title }}" required class="form-control" name="title">
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Details</label>
                                    <div class="col-md-9">
                                        <textarea name="comment" required id="editor" class="form-control ">{!! $businessService->comment !!}</textarea>
                                        @error('comment')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Business Service Image</label>
                                    <div class="col-md-6">
                                        <input type="file" value="{{ old("image") }}" id="input-file-now" class="dropify" name="image" />
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img height="200px" style="position: absolute; top: 0" src="{{ asset("uploads/$businessService->image") }}" alt="">
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

                                @if(null != $businessService->images->first())

                                    <div class="form-group">
                                        <h2 >Slider Images</h2>
                                        <div class="row">
                                            @foreach($businessService->images as $image)
                                                <div class="col-md-3">
                                                    <div class="thumbnail">
                                                        <button type="button" style="position:absolute;" onclick="del('{{ $image->id }}', $(this))" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                        <a href="{{ asset("uploads/$image->image") }}">
                                                            <img src="{{ asset("uploads/$image->image") }}" style="width:100%; max-height: 200px">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                @endif

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
        function del(id, _this){
            $.post( "{{ $route."/".$businessService->id }}", {_method: "DELETE", image_id: id},  function( data ) {
                _this.parentsUntil(".row").remove();
            });
        }

        function convertToSlug(Text)
        {
            let text = Text
                .toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,'')
            ;
            $(".slug").val(text);
        }

        $(document).ready(function(){
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
                } );

        });
    </script>
@endsection
