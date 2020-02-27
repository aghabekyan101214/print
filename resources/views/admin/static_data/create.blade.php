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
                            @if(null !== $data)
                                <input type="hidden" name="id" value="{{ $data->id }}">
                            @endif
                            <div class="form-body">

                                <div class="form-group">
                                    <label class="control-label col-md-2">Main Banner Image</label>
                                    <div class="col-md-5">
                                        <input type="file" value="{{ $data->main_banner ?? old("main_banner") }}" id="input-file-now" class="dropify" name="main_banner" />
                                        @error('main_banner')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <img src="{{ asset("uploads/" . $data->main_banner ?? "") }}" height="150px" alt="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Main Title</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="Main Title" value="{{ $data->main_title ?? old("main_title") }}" required class="form-control" name="main_title">
                                        @error('main_title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Main text</label>
                                    <div class="col-md-9">
                                        <textarea name="main_text" class="form-control editor">{{ $data->main_text ?? old("main_text") }}</textarea>
                                        @error('main_text')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">About Title</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="About Title" value="{{ $data->about_title ?? old("about_title") }}" required class="form-control" name="about_title">
                                        @error('about_title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">About text</label>
                                    <div class="col-md-9">
                                        <textarea name="about_text" id="editor" class="form-control ">{{ $data->about_text ?? old("about_text") }}</textarea>
                                        @error('about_text')
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
        $(document).ready(function(){
            ClassicEditor
                .create( document.querySelector( '.editor' ) )
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
                } );

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
