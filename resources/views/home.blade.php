@extends('layouts.app')

@section('content')
    <div class="white-box m-t-20">
        <h3 class="box-title m-b-10">Tasks List</h3>
        <a href="/dashboard/tasks/create" class="box-title m-b-20 btn btn-success">Add New Task</a>
        <form action="">
            <div class="input-group">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Created By</th>
                    <th>Assigned To</th>
                    <th>Status</th>
                    <th>Settings</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection

