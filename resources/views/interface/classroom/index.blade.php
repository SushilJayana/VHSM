@extends('layouts.app')

@section('content')

<h2 class="mb-4">Classroom</h2>
<div class="container">
    <div class="row">
        <a class="btn btn-info" href="{{ route('classroom.create') }}">Add</a>
        <table class="table table-bordered" style="margin-top:20px">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Education Level</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Teacher</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($classrooms) > 0)

                @foreach($classrooms as $classroom)
                <tr>
                    <td>{{$classroom->id}}</td>
                    <td>{{$classroom->name}}</td>
                    <td>{{$classroom->status}}</td>
                    <td>{{$classroom->educationLevel}}</td>
                    <td>{{$classroom->subject}}</td>
                    <td>{{$classroom->teacher}}</td>
                    <td>{{$classroom->created_at}}</td>
                    <td>
                        <form method="POST" action="{{ route('classroom.destroy', $classroom->id) }}">
                            @csrf
                            @method('DELETE')

                            <button type='button' title='View' class='btn btn-rounded btn-light'
                            onclick="window.location='{{route('classroom.show',$classroom->id)}}'">
                                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-eye' fill='currentColor'
                                    xmlns='http://www.w3.org/2000/svg'>
                                    <path fill-rule='evenodd'
                                        d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z' />
                                    <path fill-rule='evenodd'
                                        d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z' />
                                </svg>
                            </button>


                            <button type="button" title="Edit" class="btn btn-rounded btn-info"
                                onclick="window.location='{{route('classroom.edit',$classroom->id)}}'">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                                    <path fill-rule="evenodd"
                                        d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                                </svg>
                            </button>

                            <button type='submit' title='Delete' class='btn btn-rounded btn-danger'
                                onclick="return confirm('Are you sure you want to delete ? ')">
                                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash'
                                    fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                    <path
                                        d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                                    <path fill-rule='evenodd'
                                        d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                                </svg>
                            </button>

                        </form>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan='8'>{{ __('No Records Found')}}</td>
                </tr>
                @endif
            </tbody>
        </table>
        {!! $classrooms->render() !!}
    </div>
</div>
<script>
$('#menu-classroom').addClass('menu-active');
</script>
@endsection