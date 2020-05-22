@extends('layouts.app')

@section('content')
    <div class="white-box m-t-20">
        <h3 class="box-title m-b-10">Tasks List</h3>
        <a href="{{ $route }}/create" class="box-title m-b-20 btn btn-success">Add New Product</a>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Category</th>
                        <th>Product Name</th>
                        <th>Settings</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>
                                {{ $categories[$d->category] }}
                            </td>
                            <td>
                                {{ $d->name }}
                            </td>
                            <td>
                                <a href="{{$route.'/'.$d->id}}/edit" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary btn-circle tooltip-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form style="display: inline-block" action="{{$route.'/'.$d->id}}" onsubmit="if(confirm('Do You Really Want To Delete The Product?') == false) return false;" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger btn-circle tooltip-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                <a href="{{$route.'/'.$d->id}}" data-toggle="tooltip" data-placement="top" title="Sorting" class="btn btn-success btn-circle tooltip-success">
                                    <i class="fas fa-sort"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

