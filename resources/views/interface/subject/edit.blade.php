@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card w-100">
            <h5 class="card-header">Edit subject</h5>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Warning!</strong><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{route('subject.update',$subject->id)}}" method="post" id="edit-subject-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{$subject->name}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="slug" id="slug" value="{{$subject->slug}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary pull-right" id='btn-edit'>Edit</button>
                            <a class="btn btn-light pull-right" href="{{ route('subject.index') }}"
                                style="margin-right:10px">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script>
$('#menu-subject').addClass('menu-active');
</script>
@endsection