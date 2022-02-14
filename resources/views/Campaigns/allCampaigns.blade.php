@extends('app')
@section('title')
    {{__('All Campaigns')}}
@endsection
@section('content')

            

        

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">All Campaigns</h4>   
                                    <div class="page-title-right">
                                        <a href="/new-campaign"><button type="button" class="btn btn-success waves-effect waves-light">Create new Campaign</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        
                        <div id="campaigns"></div>
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                
         


       


@endsection