@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card w-100">
            <h5 class="card-header">Add classroom</h5>
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

                <form action="{{route('classroom.store')}}" method="post" id="add-classroom-form"  >
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
                        <label for="education_level_id" class="col-sm-2 col-form-label">{{ __('Education Level') }}</label>
                        <div class="col-sm-10">
                            <select name="education_level_id" id="education_level_id" class="form-control" required>
                                @foreach($educationLevels as $educationLevel)
                                <option value="{{$educationLevel->id}}">{{$educationLevel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subject_id" class="col-sm-2 col-form-label">{{ __('Subject') }}</label>
                        <div class="col-sm-10">
                            <select name="subject_id" id="subject_id" class="form-control" required>
                                @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="assigned_teacher_id" class="col-sm-2 col-form-label">{{ __('Teacher') }}</label>
                        <div class="col-sm-10">
                            <select name="assigned_teacher_id" id="assigned_teacher_id" class="form-control" required>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary pull-right" id='btn-add'>Add</button>
                            <a class="btn btn-light pull-right" href="{{ route('classroom.index') }}"
                                style="margin-right:10px">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script>
$('#menu-classroom').addClass('menu-active');
</script>
@endsection