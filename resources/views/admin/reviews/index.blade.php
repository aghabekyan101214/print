@extends('layouts.app')

@section('content')
    <div class="white-box m-t-20">
        <h3 class="box-title m-b-10">Reviews List</h3>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Text</th>
                        <th>Status</th>
                        <th>Settings</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>
                                {{ $d->name }}
                            </td>
                            <td>
                                <img class="img-fluid" src="{{ asset('/uploads/' . $d->image) }}" style="height: 150px;" alt="">
                            </td>
                            <td>
                                {{ $d->text }}
                            </td>
                            <td>
                                <a href="{{$route.'/change-status/'.$d->id}}" data-toggle="tooltip" data-placement="top" title="Change Status">
                                    @if($d->approved)
                                        <span class="label label-success">Approved</span>
                                    @else
                                        <span class="label label-danger">Not Approved</span>
                                    @endif
                                </a>
                            </td>
                            <td>
{{--                                <a href="{{$route.'/change-status/'.$d->id}}" data-toggle="tooltip" data-placement="top" title="Change Status" class="btn btn-circle @if($d->approved) btn-danger tooltip-danger @else tooltip-success btn-success @endif">--}}
{{--                                    <i class="fas fa-power-off"></i>--}}
{{--                                </a>--}}
                                <form style="display: inline-block" action="{{$route.'/'.$d->id}}" onsubmit="if(confirm('Do You Really Want To Delete The Product?') == false) return false;" method="post">
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
@endsection
