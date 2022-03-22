@extends('app')
@section('title')
    {{__('Activity Overview')}}
@endsection
@section('content')

            

        

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Activity Overview</h4>   
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                                <div class="col-md-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-striped mb-0 font-size-11">
    
                                                <thead>
                                                    <tr>
                                                        <th>Brand</th>
                                                        <th>RO Number</th>
                                                        <th>Campaign Name</th>
                                                        <th>Activity Name</th>
                                                        <th>Platform</th>
                                                        <th>USD</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach($activity as $act)
                                                        <tr>
                                                            <td>{{ $act->brandName }}</td>
                                                            <td>{{ $act->ro_number }}</td>
                                                            <td>@if($act->creativeLink == "")
                                                                <span class="badge rounded-pill badge-soft-danger font-size-5" style="background-color:red">!</span> 
                                                                @endif
                                                                <a href="/campaign/{{ $act->campaign_id }}">{{ $act->campaign_name }}</a></td>
                                                            <td>{{ $act->activityName }}</td>
                                                            <td>{{ $act->platform }}</td>
                                                            <td>{{ $act->budgetUSD }}</td>
                                                            <td>{{ $act->activity_start }}</td>
                                                            <td>{{ $act->activity_end }}</td>
                                                            
                                                            <td>
                                                                @if($act->status == "In-review")
                                                                <span class="badge rounded-pill badge-soft-warning font-size-11">In-review</span>
                                                                @elseif($act->status == "Pending")
                                                                    <span class="badge rounded-pill badge-soft-danger font-size-11">Pending</span>
                                                                @elseif($act->status == "Learning")
                                                                <span class="badge rounded-pill badge-soft-primary font-size-11">Learning</span>
                                                                @elseif($act->status == "Rejected")
                                                                <span class="badge rounded-pill badge-soft-dark font-size-11">Rejected</span>
                                                                @else
                                                                <span class="badge rounded-pill badge-soft-success font-size-11">Completed</span>
                                                                @endif
                                                            </td>
                                                            <td><a href="/campaign/{{ $act->campaign_id }}/{{ $act->activity_id }}"><span class="bx bx-edit "></span></a></td>
                                                           
                                                        </tr>

                                                   @endforeach
                                                </tbody>
                                            </table>
                                            <br/>
                                            {{ $activity->links('pagination::bootstrap-4') }}
                                        </div><!-- end of div card body -->
                                </div><!-- end of div card -->
                                


                            </div>
                                    
                                </div><!-- end of div column -->
                        </div><!-- end of div row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                
         


       


@endsection