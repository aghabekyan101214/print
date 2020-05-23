@extends('layouts.app')

@section('content')
    <div class="white-box m-t-20">
        <h3 class="box-title m-b-10">Tasks List</h3>
        <a href="{{ $route }}/create" class="box-title m-b-20 btn btn-success">Add New Business Service</a>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Slider Images</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Settings</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td><img height="150px" src="{{ asset("uploads/$d->image") }}" alt=""></td>
                            <td>
                                @foreach($d->images as $image)
                                    <img style="height: 50px; width: 50px" src="{{ asset("uploads/$image->image") }}" alt="">
                                @endforeach
                            </td>
                            <td>{{ $d->title }}</td>
                            <td>{!! $d->comment !!}</td>
                            <td>
                                <a href="{{$route.'/'.$d->id}}/edit" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary btn-circle tooltip-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form style="display: inline-block" action="{{$route.'/'.$d->id}}" onsubmit="if(confirm('Do You Really Want To Delete The Service?') == false) return false;" method="post">
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

