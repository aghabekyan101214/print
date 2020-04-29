@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"> Add Price For {{ $data->name }}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ $route }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf
                            <div class="form-body row">
                                <input type="hidden" class="product_id" value="{{ $data->id }}">
                                @foreach($data->productForms as $bin => $form)
                                    <div class="col-md-6" style="margin-bottom: 15px;">
                                        <label for="">{{ $form->form->name }}</label>
                                        <select form="{{ $form->form->name }}" required name="{{ $form->id }}" class="form-control sel" id="">
                                            <option value="">Choose Value</option>
                                            @foreach($form->values as $value)
                                                <option value="{{ $value->id }}"> {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                                <div class="col-md-12" style="margin-top: 15px">
                                    <label for="">Price</label>
                                    <input type="number" step="any" class="form-control price" name="price">
                                </div>

                                <div class="col-md-12" style="margin-top: 15px; text-align: right">
                                    <button type="button" class="btn btn-success sub"><i class="fa fa-check"></i>
                                        Submit
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".sub").click(function () {
            let arr = [];
            let price = $(".price").val();
            let product_id = $(".product_id").val();

            if(price == "") {
                alert("Please, Fill In The Price Field");
                return false;
            }
            $(".sel").each(function(){
                let val = $(this).val();
                let id = $(this).attr("name");
                if(val == "") {
                    alert(`Please, Choose The ${$(this).attr("form")} Field`);
                    arr = [];
                    return false;
                }
                arr.push({form_value_id: val})
            });
            $(".sub").css("display", "none");
            $.post( "{{ $route }}", {arr, price, product_id},  function( data ) {
                if(data == 1) {
                    alert("You have added the price successfully");
                } else if(data == -1){
                    alert("You already have this combination");
                } else {
                    alert("Somtething Went Wrong")
                }
                $(".sub").css("display", "inline-block");
            })
        })
    </script>
@endsection
