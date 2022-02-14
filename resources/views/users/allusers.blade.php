@extends('app')
@section('title')
   All Users
@endsection
@section('content')

            

        

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">All Users</h4>   

                                    <div class="page-title-right">
                                        <a href="/new-user"><button type="button" class="btn btn-success waves-effect waves-light">Create new User</button></a>
                                    </div>



                                </div>

                             

                            @if (session('status') == "updated")
                                <div class="alert alert-success">
                                    <strong>User Successfully Updated!</strong>
                                </div>
                            @endif

                           


                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                            <div class="card-body">
                                                <table class="table table-striped mb-0">
        
                                                    <thead>
                                                        <tr>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            <th>User Permissions</th>
                                                            <th>Actions</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       @foreach($users as $user)
                                                            <tr>
                                                                <td>{{ $user->firstName }}</td>
                                                                <td>{{ $user->lastName }}</td>
                                                                <td>{{ $user->username }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>
                                                                    @if($user->userId == 1) Admin @else Standard @endif
                                                                </td>
                                                                <td><a href="/user/{{ $user->user_id }}">edit</a></td>
                                                            </tr>

                                                       @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end of div card body -->
                                    </div><!-- end of div card -->
                                    


                                </div>
                        </div><!-- end of div row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                
         


       


@endsection