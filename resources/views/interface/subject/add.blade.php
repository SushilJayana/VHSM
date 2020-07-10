@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card w-100">
            <h5 class="card-header">Add subject</h5>
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
                <form action="{{route('subject.store')}}" method="post" id="add-subject-form">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="slug" id="slug" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary pull-right" id='btn-add'>Add</button>
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