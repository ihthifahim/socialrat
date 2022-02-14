@extends('app')
@section('title')
    {{__('New Client')}}
@endsection
@section('content')

            

        

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">New Client</h4>   
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                            <div class="card-body">
                                                

                                                <form method="post" action="/create-client">
                                                    @csrf
                                                        <div class="row mb-4">
                                                            <label class="col-sm-3 col-form-label">Client Name</label>
                                                            <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="client_name">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label class="col-sm-3 col-form-label">Brands</label>
                                                            <div class="col-sm-9">
                                                               <textarea class="form-control" name="brands"></textarea>
                                                            </div>
                                                        </div>
                                                       


                                            </div><!-- end of div card body -->

                                           


                                    </div><!-- end of div card -->

                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" class="btn btn-success w-md">Create Client</button>
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