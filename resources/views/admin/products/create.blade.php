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
                                    <label class="control-label col-md-2">Product Name</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old("name") }}" placeholder="Name" class="form-control" name="name" required>
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
                                                <option @if(old("category") == $bin) selected @endif value="{{ $bin }}">{{ $category }}</option>
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
                                                <option @if(null != old("form_id") && in_array($form->id, old("form_id"))) selected @endif value="{{ $form->id }}">{{ $form->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <select name="" class="form-control col-md-11 select2" onchange="selectForm('{{ json_encode($form1) }}', '{{ json_encode($form2) }}', $(this))" id="">
                                            <option value="0">Custom</option>
                                            <option value="1">Print Service Form</option>
                                            <option value="2">Signage/Banners Form</option>
                                        </select>
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
@endsection
