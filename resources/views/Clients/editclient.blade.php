@extends('app')
@section('title')
    {{__('Edit Client')}}
@endsection
@section('content')

            

        

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Edit Client</h4>   
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                            <div class="card-body">
                                                

                                                <form method="post" action="/update-client">
                                                    @csrf
                                                    <input type="hidden" value="{{ $client->client_id }}" name="client_id" />
                                                        <div class="row mb-4">
                                                            <label class="col-sm-3 col-form-label">Client Name</label>
                                                            <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="client_name" value="{{ $client->client_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label class="col-sm-3 col-form-label">Brands</label>
                                                            <div class="col-sm-9">
                                                               <textarea class="form-control" name="brands">{{ $client->brands }}</textarea>
                                                            </div>
                                                        </div>
                                                       


                                            </div><!-- end of div card body -->

                                           


                                    </div><!-- end of div card -->

                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" class="btn btn-success w-md">Update Client</button>
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