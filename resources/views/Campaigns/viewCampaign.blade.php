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

                            <div class="col-md-3">
                                <div class="card mini-stats-wid card bg-success text-white-50" >
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="" style="color:white">Total Campaign Budget $USD</p>
                                                <h4 class="mb-0" style="color:white">{{ $campaignBudgetUSD }}</h4>
                                            </div>

                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card mini-stats-wid card bg-info text-white-50" >
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="" style="color:white">Total Utilized $USD</p>
                                                <h4 class="mb-0" style="color:white">{{ $campaignUSD }}</h4>
                                            </div>

                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                          
                            
                        </div><!-- end of div row -->


                        <div class="row">
                            <div class="col-lg-12">
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

                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#ro_details" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">RO Details</span>    
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
                                                
                                            </div><!-- end of div campaign details tab -->



                                            <div class="tab-pane" id="ro_details" role="tabpanel">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <form class="row gy-2 gx-3 align-items-center" method="post" action="/campaign/add-ro">
                                                            @csrf
                                                            <input type="hidden" value="{{ $campaign->campaign_id }}" name="campaign_id" />
                                                            <div class="col-md-2">
                                                                <label class="visually-hidden">RO Number</label>
                                                                <input type="text" class="form-control" name="ronumber" placeholder="RO Number">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="visually-hidden">RO USD Value</label>
                                                                <input type="text" class="form-control" name="usdvalue" placeholder="RO USD Value">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="visually-hidden">RO LKR Value</label>
                                                                <input type="text" class="form-control" name="lkrvalue" placeholder="RO LKR Value">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="visually-hidden">Platform</label>
                                                                <select class="form-select" name="platform">
                                                                    <option value="none">Select Platform</option>
                                                                    <option value="Facebook">Facebook</option>
                                                                    <option value="Facebook & Instagram">Facebook & Instagram</option>
                                                                    <option  value="Instagram">Instagram</option>
                                                                    <option  value="Youtube">Youtube</option>
                                                                    <option value="Google">Google</option>
                                                                    <option value="Xaxis">Xaxis</option>
                                                                    <option value="Twitter">Twitter</option>
                                                                    <option value="Linkedin">Linkedin</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="submit" class="btn btn-success w-md">Submit</button>
                                                            </div>
                                                        </form>

                                                    </div><!-- end of div column -->
                                                </div>  <!-- end of div row -->

                                                <div class="row mt-4">
                                                        <div class="col-md-12">

                                                            <div class="table-responsive">
                                                                <table class="table table-striped mb-0">
                            
                                                                    <thead>
                                                                        <tr>
                                                                            <th>RO#</th>
                                                                            <th>Platform</th>
                                                                            <th>USD Value</th>
                                                                            <th>LKR Value</th>                                                                    
                                                                            <th>Actions</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($ro as $ro)
                                                                            <tr>
                                                                                <td>{{ $ro->ro_number }}</td>
                                                                                <td>{{ $ro->platform }}</td>
                                                                                <td>{{ $ro->usd_value }}</td>
                                                                                <td>{{ $ro->lkr_value }}</td>                                                                                
                                                                                <td>{{ $ro->endDate }}</td>                                        
                                                                            </tr>
        
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                        </div><!-- end of div column -->
                                                </div><!-- end of div row -->
                                                
                                                




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