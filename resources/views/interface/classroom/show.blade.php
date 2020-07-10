@extends('layouts.app')

@section('content')

<h2 class="mb-4">Classroom</h2>
<div class="container">
    <div class="row">
        <a class="btn btn-light" href="{{ url('classroom/'.$classroom->id.'/study_material') }}">Materials</a>
        <a class="btn btn-light" href="{{ route('classroom.create') }}">Assignments</a>

    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Classroom:</strong>
                {{ $classroom->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $classroom->name }}
            </div>
        </div>
    </div>
</div>
<script>
$('#menu-classroom').addClass('menu-active');
</script>
@endsection