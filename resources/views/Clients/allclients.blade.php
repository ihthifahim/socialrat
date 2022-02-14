@extends('app')
@section('title')
    {{__('All Clients')}}
@endsection
@section('content')

            

        

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">All Clients</h4>   

                                    <div class="page-title-right">
                                        <a href="/new-client"><button type="button" class="btn btn-success waves-effect waves-light">Create new client</button></a>
                                    </div>


                                </div>
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
                                                            <th>Client Name</th>
                                                            <th>Brand</th>
                                                            <th>Action</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       @foreach($clients as $client)
                                                            <tr>
                                                                <td>{{ $client->client_name }}</td>
                                                                <td>{{ $client->brands }}</td>
                                                                <td><a href="/update-client/{{ $client->client_id }}">edit</a></td>
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