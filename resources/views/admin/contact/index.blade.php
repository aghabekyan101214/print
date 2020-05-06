@extends('layouts.app')

@section('content')
    <div class="white-box m-t-20">
        <h3 class="box-title m-b-10">{{ $title }} List</h3>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Company Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Settings</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{ $d->full_name }}</td>
                            <td>{{ $d->company_name }}</td>
                            <td>{{ $d->phone }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->comment }}</td>
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

