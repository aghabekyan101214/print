@extends('layouts.app')

@section('content')
    <style>
        .success-alert{
            opacity: 0;
            transition: .1s;
        }
    </style>
    <div class="white-box m-t-20">
        <h3 class="box-title m-b-10">{{ $product->name }} Form</h3>
{{--        <a href="{{ $route }}/create" class="box-title m-b-20 btn btn-success">Add New Product</a>--}}
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Form</th>
                        <th>Values</th>
                        <th style="width: 10%">Settings</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($forms as $bin => $f)
                        <tr>
                            <td>
                                {{ $f->form->name }}
                            </td>
                            <td>
                                <ul class="ul-{{ $bin }}">
                                    @foreach($f->values as $v)
                                        <li style="padding: 5px 0">
                                            <input class="edit-inp" style="border: none" type="text" product_form_id="{{ $v->id }}" value="{{ $v->name }}">
                                            <button class="btn btn-danger btn-circle btn-xs delete-form" product_form_id="{{ $v->id }}"><i class="fa fa-trash"></i></button>
                                        </li>
{{--                                        <li> <span>{{ $v->name }}</span> <button class="btn btn-primary btn-circle btn-xs"><i class="fa fa-edit"></i></button></li>--}}
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <button onclick="openModal('{{ $f->id }}', '{{ $f->form->name }}', 'ul-{{ $bin }}')" data-toggle="modal" data-target="#form-modal" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" id="form-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adding Value To <b class="form-name"></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="success-alert d-none" style="color: green; text-align: center;">New Value Added Successfully</div>
                    <input type="hidden" class="form_product_id">
                    <input type="hidden" class="ul_class">
                    <input class="form-control value" placeholder="Value" type="text">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary save">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let product_id = "{{ $product->id }}";
        let openModal = (product_form_id, form_name, ul_class) => {
            $(".form-name").html(form_name);
            $(".form_product_id").val(product_form_id);
            $(".ul_class").val(ul_class);
        }

        $(".save").click(function(){
            let val = $(".value").val();
            let product_form_id = $(".form_product_id").val();
            let ul_class = $(".ul_class").val();

            if(val == "") {
                $(".value").css("border", "1px solid red");
                return false;
            }
            $(".value").css("border", "1px solid #e4e7ea");
            console.log("s");
            $.post( "/admin/forms/save-form-value",{product_id, product_form_id, val}, function( data ) {
                if(data.data) {
                    let html = "";
                    data.data.forEach(function (e) {
                        html += `<li style="padding: 5px 0">
                                    <input class="edit-inp" style="border: none" type="text" product_form_id="${e.id}" value="${e.name}">
                                    <button class="btn btn-danger btn-circle btn-xs delete-form" product_form_id="${e.id}"><i class="fa fa-trash"></i></button>
                                 </li>`;
                        // html += "<li>" + e.name + "</li>";
                    });
                    $("."+ul_class).html(html);
                    $(".value").val("");
                    $(".success-alert").css({"opacity": 1, 'transition': 0});
                    setTimeout(function(){
                        $(".success-alert").css({"opacity": 0, 'transition': '2s'});
                    }, 1000)
                    // alert("You have added new value successfully")
                }
            });
        })

        $(document).on("blur", ".edit-inp", function(){
            let val = $(this).val();
            let product_form_id = $(this).attr("product_form_id");
            $.post( "/admin/forms/edit-form-value",{product_form_id, val}, function( data ) {
                if(data == 1) {
                    // alert("You have edited the value successfully")
                } else {
                    alert("Something Went Wrong");
                    location.reload();
                }
            });
        });

        $(document).on("click", ".delete-form", function () {
            let id = $(this).attr("product_form_id");
            $(this).addClass("disabled");
            $.post( "/admin/forms/delete-form-value",{id}, ( data ) => {
                if(data == 1) {
                    $(this).parentsUntil("ul").remove();
                } else {
                    alert("Something Went Wrong");
                    location.reload();
                }
                $(this).removeClass("disabled");
            });
        })
    </script>
@endsection

