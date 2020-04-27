@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ $route }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf
                            @if(null !== $data)
                                <input type="hidden" name="id" value="{{ $data->id }}">
                            @endif
                            <div class="form-body">

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
