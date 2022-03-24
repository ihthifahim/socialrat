@extends('app')
@section('title')
    {{ $activity->activityName }}
@endsection
@section('content')

            

<?php 
$activity_edit = "";
if($activity->status != "Pending" && session()->get('user_role') == 2){
    $activity_edit = "disabled";
}


?>
        

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
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">


                                        <form action="/update-activity" method="post">
                                            @csrf
                                            <input type="hidden" name="activityid" value="{{ $activity->activity_id }}" />
                                            <input type="hidden" name="campaignid" value="{{ $activity->campaign_id }}" />
                                            <div class="mb-3">
                                                    <label htmlFor="formrow-email-input" class="form-label">Activity Name</label>
                                                    <input type="text" class="form-control" name="activityName" value="{{ $activity->activityName }}" <?php echo $activity_edit ?>/>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">RO Number</label>
                                                    <input type="text" class="form-control" name="ro" value="{{ $activity->ro_number }}" <?php echo $activity_edit ?>/>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" >Platform</label>
                                                    <select name="platform" class="form-select" <?php echo $activity_edit ?>>
                                                    <option value="none" {{ $activity->platform == "none" ? 'selected' : '' }}>Choose...</option>
                                                    <option value="Facebook" {{ $activity->platform == "Facebook" ? 'selected' : '' }}>Facebook</option>
                                                    <option  value="Instagram" {{ $activity->platform == "Instagram" ? 'selected' : '' }}>Instagram</option>
                                                    <option  value="Facebook & Instagram" {{ $activity->platform == "Facebook & Instagram" ? 'selected' : '' }}>Instagram</option>
                                                    <option  value="Youtube" {{ $activity->platform == "Youtube" ? 'selected' : '' }}>Youtube</option>
                                                    <option value="Google" {{ $activity->platform == "Google" ? 'selected' : '' }}>Google</option>
                                                    <option value="Twitter" {{ $activity->platform == "Twitter" ? 'selected' : '' }}>Twitter</option>
                                                    <option value="Linkedin" {{ $activity->platform == "Linkedin" ? 'selected' : '' }}>Linkedin</option>
                                                    
                                                    </select>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Budget LKR (with Commission)</label>
                                                    <input type="text" class="form-control" name="lkr" value="{{ $activity->budgetLKR }}" <?php echo $activity_edit ?> />
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Budget USD (without Commission)</label>
                                                    <input type="text" class="form-control" name="usd" value="{{ $activity->budgetUSD }}" <?php echo $activity_edit ?> />
                                                </div>
                                                </div>
                                            </div>


                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label htmlFor="formrow-email-input" class="form-label">Start Date</label>
                                                    <input class="form-control" type="date" name="startDate" value="{{ $activity->activity_start }}" <?php echo $activity_edit ?> />
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label htmlFor="formrow-password-input" class="form-label">End Date</label>
                                                    <input class="form-control" type="date" name="endDate" value="{{ $activity->activity_end }}" <?php echo $activity_edit ?> />
                                                </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Primary KPI</label>
                                                    <input type="text" class="form-control" name="primaryKPI" value="{{ $activity->primaryKPI }}" <?php echo $activity_edit ?> />
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Secondary KPI</label>
                                                    <input type="text" class="form-control" name="secondaryKPI" value="{{ $activity->secondaryKPI }}" <?php echo $activity_edit ?> />
                                                </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    @if($activity->creativeLink == "")
                                                        <label class="form-label">Creative Link</label>
                                                    @else
                                                       <label class="form-label">Creative Link</label><a target="_blank" href="{{ $activity->creativeLink }}"> view link</a>
                                                    @endif
                                                    <input type="text" class="form-control" name="link" value="{{ $activity->creativeLink }}" <?php echo $activity_edit ?> />
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select name="status" class="form-select" <?php echo $activity_edit ?> >
                                                    
                                                    <option value="In-review" {{ $activity->status == "In-review" ? 'selected' : '' }}>In-Review</option>
                                                    <option value="Pending" {{ $activity->status == "Pending" ? 'selected' : '' }}>Pending</option>
                                                    <option value="Learning" {{ $activity->status == "Learning" ? 'selected' : '' }}>Learning</option>
                                                    <option value="Completed" {{ $activity->status == "Completed" ? 'selected' : '' }}>Completed</option>
                                                    <option value="Rejected" {{ $activity->status == "Rejected" ? 'selected' : '' }}>Rejected</option>

                                                    
                                                    </select>
                                                </div>
                                                </div>
                                            </div>




                                            <div class="mb-3">
                                                    <label class="form-label" name="notes" <?php echo $activity_edit ?> >Activity Notes</label>
                                                    <textarea class="form-control" rows="7" name="notes" >{{ $activity->comments }}</textarea>
                                            </div>

                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Peer Review</label>
                                                        <select name="peer_review" class="form-select">
                                                        <option value="Select" {{ $activity->peer_review == "Select" ? 'selected' : '' }}>Select</option>
                                                        <option value="Completed" {{ $activity->peer_review == "Completed" ? 'selected' : '' }}>Completed</option>
                                                        <option value="Need Changes" {{ $activity->peer_review == "Need Changes" ? 'selected' : '' }}>Need Changes</option>
                                                        <option value="Pending" {{ $activity->peer_review == "Pending" ? 'selected' : '' }}>Pending</option>
                                                        
                                                        
                                                        
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label class="form-label">Review Comment</label>
                                                    <input type="text" class="form-control" name="review_comment" value="{{ $activity->review_comment }}" />
                                                </div>
                                                </div>
                                                
                                            </div>


                                            
                                            <div>
                                                <button type="submit" class="btn btn-success w-md">Update Activity</button>
                                                <a href="/campaign/{{ $activity->campaign_id }}"><button type="button" class="btn btn-primary w-md">Go Back</button></a>
                                            </form>


                                            @if(session()->get('user_role') == "1")
                                            
                                                <form action="/delete-activity" method="post" style="margin-top:-40px">
                                                    @csrf
                                                    <input type="hidden" name="activityid" value="{{ $activity->activity_id }}" />
                                                    <input type="hidden" name="campaignid" value="{{ $activity->campaign_id }}" />
                                                <button type="submit" class="btn btn-danger w-md float-end">Delete</button>
                                                </form>

                                            @endif
                                                

                                               
                                            </div>
                                       
                                        
                                        




                                    </div>
                                </div>
                            </div><!-- end of div column left -->

                            <div class="col-md-4">
                                    <div class="card">
                                            <div class="card-body">
                                            
                                                <div>
                                                    <h5 class="font-size-20"><i class="bx bx-message-dots text-muted align-middle me-1"></i> Comments :</h5>
                                                    
                                                    <div>
                                                        @if(count($comments) == 0)
                                                        <h5 class="mt-5">no comments</h5>
                                                        @else

                                                            @foreach($comments as $comment)

                                                                <div class="media py-3">
                                                                    <div class="avatar-xs me-3">
                                                                        <div class="avatar-title rounded-circle bg-light text-primary">
                                                                            <i class="bx bxs-user"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h5 class="font-size-14 mb-1">{{ $comment->firstName }} {{ $comment->lastName }} <small class="text-muted float-end">{{ $comment->created_at->diffForHumans() }}</small></h5>
                                                                        <p class="text-muted">
                                                                            @if($comment->review == "1")
                                                                                @if($comment->review_status == "Completed")
                                                                                    <span class="badge rounded-pill badge-soft-success font-size-9">Completed</span>
                                                                                @elseif($comment->review_status == "Need Changes")
                                                                                    <span class="badge rounded-pill badge-soft-warning font-size-9">Need Changes</span>
                                                                                @elseif($comment->review_status == "Pending")
                                                                                    <span class="badge rounded-pill badge-soft-danger font-size-9">Pending</span>
                                                                                @endif

                                                                            @endif
                                                                            {{ $comment->comment }}
                                                                            <br/>
                                                                            
                                                                            <a href="/delete-comment/{{ $comment->comment_id }}"><span class="bx bx-trash-alt "></span></a>
                                                                        </p>
                                                                        
                                                                    </div>

                                                                </div>
                                                            @endforeach

                                                        @endif
                                                        
                                                        
                                                        
            
                                                        
            
                                                    </div>
                                                </div>
                                            
                                            </div><!-- end of card body -->
                                    </div><!-- end of div card -->

                                    <div class="card">
                                            <div class="card-body">
                                                    <h5>Comment</h5>
                                                    <form method="post" action="/activity/comment">
                                                        @csrf
                                                    <input type="hidden" name="activityid" value="{{ $activity->activity_id }}" />
                                                    <input type="hidden" name="campaignid" value="{{ $activity->campaign_id }}" />
                                                    <textarea class="form-control" required placeholder="Your message..." rows="3" name="comment"></textarea>
                                                    <button type="submit" class="btn btn-success w-md mt-2">Comment</button>
                                                    </form>
                                            </div><!-- end of div card body -->
                                    </div><!-- end of div card -->
                            </div><!-- end of div column right -->
                        </div><!-- end of div row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                
         


       


@endsection