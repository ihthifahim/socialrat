@extends('app')
@section('title')
    {{ $campaign->campaign_name }}
@endsection
@section('content')

            

        

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Campaign Overview</h4>   

                                    <div class="float-end">
                                        <a href="/export-campaign/{{ $campaign->campaign_id }}"><button type="button" class="btn btn-primary waves-effect waves-light">Export Campaign</button></a>
                                        <a href="/new-activity/{{ $campaign->campaign_id }}"><button type="button" class="btn btn-success waves-effect waves-light">Add new Activity</button></a>
                                    
                                    </div>
                                </div>

                            @if (session('status') == "success")
                            <div class="alert alert-success">
                                <strong>New Client Created!</strong>
                            </div>
                            @endif

                            @if (session('status') == "updated")
                                <div class="alert alert-success">
                                    <strong>Activity Successfully Updated!</strong>
                                </div>
                            @endif

                            @if (session('status') == "campaignupdated")
                                <div class="alert alert-success">
                                    <strong>Campaign Successfully Updated!</strong>
                                </div>
                            @endif

                            @if (session('status') == "deleted")
                                <div class="alert alert-success">
                                    <strong>Client Successfully Deleted!</strong>
                                </div>
                            @endif


                            </div>
                        </div>
                        <!-- end page title -->




                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            

                                            <div class="media-body overflow-hidden">
                                                <h2 class="text-truncate">{{ $campaign->campaign_name }}</h2>
                                                
                                            </div>
                                        </div>

                                        <h5 class="font-size-15 mt-4">Campaign Notes:</h5>

                                        <p class="text-muted">{{ $campaign->notes }}</p>

                                        <div class="row task-dates">
                                            <div class="col-sm-3 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-check-shield  me-1 text-primary"></i>Client Approval</h5>
                                                    {{-- <p class="text-muted mb-0">{{ $campaign->clientApproval }}</p> --}}
                                                    @if($campaign->clientApproval == "Approved")
                                                    <span class="badge rounded-pill badge-soft-success font-size-14">Approved</span>
                                                    @else
                                                    <span class="badge rounded-pill badge-soft-danger font-size-14">Pending</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-sm-2 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Start Date</h5>
                                                    <p class="text-muted mb-0">{{ $campaign->startDate }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> End Date</h5>
                                                    <p class="text-muted mb-0">{{ $campaign->endDate }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-user me-1 text-primary"></i>Planner</h5>
                                                    <p class="text-muted mb-0">{{ $campaign->userCreated }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-time-five  me-1 text-primary"></i>Created At</h5>
                                                    <p class="text-muted mb-0">{{ $campaign->created_at }}</p>
                                                </div>
                                            </div>
                                            
    
                                           
                                        </div>

                                       
                                        

                                      
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mini-stats-wid card bg-info text-white-50" >
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="" style="color:white">Total Campaign Budget $USD</p>
                                                        <h4 class="mb-0" style="color:white">{{ $campaignUSD }}</h4>
                                                    </div>

                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-dollar-circle  font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                               

                            </div>
                            <!-- end col -->
                        </div>


                        <div class="row">
                            
                            <div class="col-md-12">
                                
                                <div class="card">
                                    <div class="card-body">
                                        

                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#activities" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">Campaign Activities</span>    
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#details" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">Campaign Details</span>    
                                                </a>
                                            </li>
                                            
                                           
                                            
                                        </ul>

                                        



                                        <div class="tab-content p-3">
                                            <div class="tab-pane active" id="activities" role="tabpanel">
                                                <div class="row">

                                                    <div class="table-responsive">
                                                        <table class="table table-striped mb-0">
                    
                                                            <thead>
                                                                <tr>
                                                                    <th>RO#</th>
                                                                    <th>Activity Name</th>
                                                                    <th>Platform</th>
                                                                    <th>Budget USD</th>
                                                                    <th>Start Date</th>
                                                                    <th>End Date</th>
                                                                    <th>Status</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($activity as $act)
                                                                    <tr>
                                                                        <td>{{ $act->ro_number }}</td>
                                                                        <td>{{ $act->activityName }}</td>
                                                                        <td>{{ $act->platform }}</td>
                                                                        <td>{{ $act->budgetUSD }}</td>
                                                                        <td>{{ $act->startDate }}</td>
                                                                        <td>{{ $act->endDate }}</td>
                                                                        <td>
                                                                            @if($act->status == "In-review")
                                                                                <span class="badge rounded-pill badge-soft-warning font-size-11">In-review</span>
                                                                            @elseif($act->status == "Pending")
                                                                                <span class="badge rounded-pill badge-soft-danger font-size-11">Pending</span>
                                                                            @elseif($act->status == "Learning")
                                                                            <span class="badge rounded-pill badge-soft-primary font-size-11">Learning</span>
                                                                            @else
                                                                            <span class="badge rounded-pill badge-soft-success font-size-11">Completed</span>
                                                                            @endif
                                                                            
                                                                        </td>

                                                                        <td><a href="/campaign/{{ $campaign->campaign_id }}/{{ $act->activity_id }}"><span class="bx bx-edit "></span></a></td>


                                                                    </tr>

                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                  


                                                </div>
                                                 

                                            </div>

                                            <div class="tab-pane" id="details" role="tabpanel">
                                                
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div id="editCampaign"></div>

                                                     
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>


                                        
                                    </div><!-- end of div card body -->
                                </div><!-- end of div card -->
                            
                            </div><!-- end of div column -->
                        
                        
                        </div><!-- end of div row -->




                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                
         


                @include('footer')


@endsection