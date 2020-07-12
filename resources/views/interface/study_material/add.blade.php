@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card w-100">
            <div class="ajax-loader">
                <img src="{{asset('/img/ajax-loader.gif')}}" class="img-responsive" />
            </div>
            <h5 class="card-header">Add study materials</h5>
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
                <form method="post" id="add-study-material-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="classroom_id" value={{$classroom_id}}>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <input type="file" class="btn btn-light" name="file" id="file" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="details" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="details" id="details" cols="30" rows="10" class="form-control"
                                style="overflow:auto;resize:none"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary pull-right" id='btn-add'>Add</button>
                            <a class="btn btn-light pull-right"
                                href="{{ url('classroom/'.$classroom_id.'/study_material') }}"
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

$(document).ready(function() {
    $('#add-study-material-form').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "{{url('classroom/'.$classroom_id.'/study_material/store')}}",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function(response) {
                if (response.status === "error") {
                    alert(response.message);
                    return false;
                }
                window.location.href = "{{ url('classroom/'.$classroom_id.'/study_material') }}";
            },
            complete: function() {
                $('.ajax-loader').css("visibility", "hidden");
            }
        });

    });

})
</script>
@endsection