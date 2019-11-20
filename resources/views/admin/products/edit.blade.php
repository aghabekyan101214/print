@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"> Edit Product</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ $route."/".$product->id }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf
                            @method("PUT")
                            <div class="form-body">

                                <div class="form-group">
                                    <label class="control-label col-md-2">Product Name</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $product->name }}" placeholder="Name" class="form-control" name="name" required>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Choose Main Category</label>
                                    <div class="col-md-9">
                                        <select name="category" required class="form-control" id="">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $bin => $category)
                                                <option @if($product->category == $bin) selected @endif value="{{ $bin }}">{{ $category }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Select Forms For Current Product (Multiple)</label>
                                    <div class="col-md-6">
                                        <select name="form_id[]" multiple class="form-control select2 form_select" id="">
                                            @foreach($forms as $form)
                                                <option @if(in_array($form->id, $chosenForms)) selected @endif value="{{ $form->id }}">{{ $form->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <select name="" class="form-control col-md-11 select2" onchange="selectForm('{{ json_encode($form1) }}', '{{ json_encode($form2) }}', $(this))" id="">
                                            <option value="0">Custom</option>
                                            <option @if(array_diff($chosenForms, $form1) == array_diff($form1, $chosenForms)) selected @endif value="1">Form (1)</option>
                                            <option @if(array_diff($chosenForms, $form2) == array_diff($form2, $chosenForms)) selected @endif value="2">Form (2)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Product Price</label>
                                    <div class="col-md-9">
                                        <input type="number" step="any" value="{{ $product->price }}" placeholder="price" class="form-control" name="price" required>
                                        @error('price')
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

                                @if(null != $product->images->first())

                                    <div class="form-group">
                                        <h2 >Slider Images</h2>
                                        <div class="row">
                                            @foreach($product->images as $image)
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
            $.post( "{{ $route."/".$product->id }}", {_method: "DELETE", image_id: id},  function( data ) {
                _this.parentsUntil(".row").remove();
            });
        }
    </script>
@endsection
