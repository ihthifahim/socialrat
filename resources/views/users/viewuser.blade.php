@extends('app')
@section('title')
    {{__('View User')}}
@endsection
@section('content')

            

        

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">View User</h4>   
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                            <div class="card-body">
                                                

                                                <form method="post" action="/update-user">
                                                    @csrf
                                                        <input type="hidden" name="userid" value="{{ $user->user_id }}" />

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">First Name</label>
                                                                <input class="form-control" type="text" name="firstname" value="{{ $user->firstName }}" required/>
                                                            </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Last Name</label>
                                                                <input class="form-control" type="text" name="lastname" value="{{ $user->lastName }}" required/>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Email Address</label>
                                                                <input class="form-control" type="text" name="email" value="{{ $user->email }}" required/>
                                                            </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">User Level</label>
                                                                
                                                                <select id="formrow-inputState" class="form-select" name="userlevel">
                                                                <option value="0" {{ $user->userId == "0" ? 'selected' : '' }}>Choose...</option>
                                                                <option value="1" {{ $user->userId == "1" ? 'selected' : '' }}>Admin</option>
                                                                <option value="2" {{ $user->userId == "2" ? 'selected' : '' }}>Standard</option>
                                                                </select>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Username</label>
                                                                <input class="form-control" type="text" name="username" value="{{ $user->username }}" required/>
                                                            </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Password</label>
                                                                <input class="form-control" type="password" name="password" />
                                                            </div>
                                                            </div>
                                                        </div>
                                                       


                                            </div><!-- end of div card body -->

                                           


                                    </div><!-- end of div card -->

                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" class="btn btn-success w-md">Update User</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>

                                </div><!-- end of div column -->
                        </div><!-- end of div row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                
         


       


@endsection