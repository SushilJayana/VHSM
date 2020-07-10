@extends('layouts.app')

@section('content')

<h2 class="mb-4">HSM Video Management</h2>
<div class="container">
    <div class="row">
        <button type="button" onclick="window.location='./admin/views/add.php'" class="btn btn-info">Add
            Video</button>
        <table class="table table-bordered" style="margin-top:20px">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Teacher</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>


@endsection