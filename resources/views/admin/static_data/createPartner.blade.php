@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="/admin/partners" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf
                            <div class="form-body">

                                <div class="form-group">
                                    <label class="control-label col-md-2">Logos (Choose Multiple)</label>
                                    <div class="col-md-9">
                                        <input multiple value="{{ old("logos") }}" type="file" id="input-file-now" class="dropify" name="logos[]" />
                                        @error('logos')
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
                        <h2>Slider Images</h2>
                        <div class="col-md-12">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logos as $logo)
                                    <tr>
                                        <td>
                                            <img class="img-fluid" style="height: 150px;" src="{{ asset("uploads/$logo->image") }}" alt="">
                                        </td>
                                        <td>
                                            <form style="display: inline-block" action="{{$route.'/'.$logo->id}}" onsubmit="if(confirm('Do You Really Want To Delete The Product?') == false) return false;" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger btn-circle tooltip-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
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
