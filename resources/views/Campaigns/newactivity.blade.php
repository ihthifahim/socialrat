@extends('app')
@section('title')
    New Activity
@endsection
@section('content')

            

        

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Create new Activity</h4>   
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->



                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">


                                        <form action="/new-activity" method="post">
                                            @csrf
                                            <input type="hidden" name="campaignid" value="{{ $campaignid }}" />
                                            <div class="mb-3">
                                                    <label htmlFor="formrow-email-input" class="form-label">Activity Name</label>
                                                    <input type="text" class="form-control" name="activityName" />
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">RO Number</label>
                                                    <input type="text" class="form-control" name="ro" />
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" >Platform</label>
                                                    <select name="platform" class="form-select">
                                                    <option value="none">Choose...</option>
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
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Budget LKR (with Commission)</label>
                                                    <input type="text" class="form-control" name="lkr"/>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Budget USD (without Commission)</label>
                                                    <input type="text" class="form-control" name="usd" />
                                                </div>
                                                </div>
                                            </div>


                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label htmlFor="formrow-email-input" class="form-label">Start Date</label>
                                                    <input class="form-control" type="date" name="startDate"/>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label htmlFor="formrow-password-input" class="form-label">End Date</label>
                                                    <input class="form-control" type="date" name="endDate" />
                                                </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Primary KPI</label>
                                                    <input type="text" class="form-control" name="primaryKPI"  />
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Secondary KPI</label>
                                                    <input type="text" class="form-control" name="secondaryKPI"  />
                                                </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Creative Link</label>
                                                    <input type="text" class="form-control" name="link" />
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select name="status" class="form-select" disabled>
                                                    
                                                    <option value="In-review">In-Review</option>
                                                    <option value="Pending" selected>Pending</option>
                                                    <option value="Learning">Learning</option>
                                                    <option value="Completed">Completed</option>

                                                    
                                                    </select>
                                                </div>
                                                </div>
                                            </div>




                                            <div class="mb-3">
                                                    <label class="form-label" >Activity Notes</label>
                                                    <textarea class="form-control" rows="7" name="notes"></textarea>
                                            </div>

                                            


                                            
                                            <div>
                                                <button type="submit" class="btn btn-success w-md">Create Activity</button>
                                                

                                               
                                                

                                               
                                            </div>
                                        </form>
                                        
                                        




                                    </div>
                                </div>
                            </div><!-- end of div column left -->

                            
                        </div><!-- end of div row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                
         


       


@endsection