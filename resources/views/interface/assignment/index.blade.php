@extends('layouts.app')

@section('content')

<h2 class="mb-4">Assignments</h2>
<div class="container">
    <div class="row">
        <a class="btn btn-info" href="#">Add</a>
        <table class="table table-bordered" style="margin-top:20px">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Classroom</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan='6'>{{ __('No Records Found')}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
$('#menu-classroom').addClass('menu-active');
</script>
@endsection