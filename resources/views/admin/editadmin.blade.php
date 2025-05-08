@extends('admin.admin_dashboard')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Gutters</h4>
                    <p class="text-muted font-13">More complex layouts can also be created with the grid system.</p>

                    <form action="{{ route('update.admin', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ $user->name }}" name="name" type="name" class="form-control"
                                    id="inputEmail4" placeholder="Name">
                            </div>
                            <div class="mb-3 col-md-2">
                                <label for="inputState" class="form-label">Admin</label>
                                <select name="user_id" id="inputState" class="form-select">
                                    <option>Choose</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role}}" @selected($role == auth()->user()->role)>{{ ucfirst($role) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary waves-effect waves-light">Sign in</button>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
