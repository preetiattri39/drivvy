@extends('admin.layouts.app')
@section('title', 'View User')
@section('breadcrum')
    <div class="page-header">
        <h3 class="page-title">Users</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.user.list') }}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">View User</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div>
        <h4 class="user-title">View User</h4>
        <div class="card">
            <div class="card-body">
                <form class="forms-sample">
                    <div class="form-group">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-3">
                                <div class="view-user-details">
                                    {{-- <h5 class="text-center mb-2">Profile Image</h5> --}}
                                    <div class="text-center">
                                    <img 
                            class="img-lg"
                            @if($user->profile_picture != "")
                                src="{{url('/')}}/storage/users/{{$user->profile_picture}}"
                            @else
                                src="{{ asset('admin/images/faces/face15.jpg') }}"
                            @endif
                            alt="User profile picture">
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-md-8">
                                <div class="response-data ml-4">
                                    <h6 class="f-14 mb-1"><span class="semi-bold qury">First Name :</span> <span
                                            class="text-muted" id="userName">{{ $user->first_name }}</span></h6>
                                    <h6 class="f-14 mb-1"><span class="semi-bold qury">Last Name :</span> <span
                                    class="text-muted" id="lastName">{{ $user->last_name }}</span></h6>
                                    <h6 class="f-14 mb-1"><span class="semi-bold qury">Email :</span> <span
                                            class="text-muted" id="userName">{{ $user->email ?? '' }}</span></h6>
                                    <h6 class="f-14 mb-1"><span class="semi-bold qury">Phone Number :</span> <span
                                            class="text-muted"
                                            class="userPhone">{{ $user ? $user->phone_number ?? 'N/A' : 'N/A' }}</span>
                                    </h6>
                                    <h6 class="f-14 mb-1"><span class="semi-bold qury">Date &amp; time :</span> <span
                                            class="text-muted" id="userDateTime">{{ convertDate($user->join_at) }}</span>
                                    </h6>
                                    <h6 class="f-14 mb-1"><span class="semi-bold qury"> Bio :</span> <span
                                            class="text-muted" id="userDateTime">{{ $user->bio }}</span>
                                    </h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
                {{-- <div class="text-end">
                    <a href="{{ route('admin.user.list') }}"><button
                            class="btn default-btn btn-md mr-2">Cancel</button></a>
                </div> --}}
            </div>
        </div>
       
@endsection
