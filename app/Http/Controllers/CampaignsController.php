<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Campaigns;
use App\Models\CampaignActivities;
use App\Models\CampaignComments;
use App\Models\Clients;
use App\Models\Users;

use App\Exports\CampaignTest;
use Maatwebsite\Excel\Facades\Excel;

use JavaScript;

class CampaignsController extends Controller
{
    //

    public function allCampaigns(){
        return view('Campaigns.allCampaigns');
    }
    public function allCampaignsAPI(){
        $campaigns = Campaigns::orderBy('campaign_id', 'desc')->get();
        return response()->json($campaigns);
    }

    public function createCampaign(){
        return view('Campaigns.newcampaign');
    }

    public function newCampaignAPI(Request $request){
        
        $campaign = New Campaigns;
        $campaign->campaign_name = $request->campaignName;
        $campaign->client = $request->client;
        $campaign->brandName = $request->brand;
        $campaign->clientApproval = $request->clientApproval;
        $campaign->startDate = $request->startDate;
        $campaign->endDate = $request->endDate;
        $campaign->notes = $request->notes;
        $campaign->save();
        return response()->json("successfull");
        
    }

    public function viewCampaign($id){
        $campaign = Campaigns::where('Campaigns.campaign_id', '=', $id)->first();
        $activities = CampaignActivities::where('campaign_id', '=', $id)->get();

        JavaScript::put([
            'campaignid' => $id,
        ]);
                
        return view('Campaigns.viewCampaign', [
            'campaign' => $campaign,
            'activity' => $activities
        ]);
    }

    public function viewCampaignAPI($id){
        $campaign = Campaigns::where('Campaigns.campaign_id', '=', $id)->first();

        return response()->json($campaign);

    }

    public function editCampaignAPI(Request $request){
        Campaigns::where('campaign_id', '=', $request->campaignId)->update([
            'campaign_name' => $request->campaignName,
            'client' => $request->client,
            'brandName' => $request->brandName,
            'clientApproval' => $request->clientApproval,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'notes' => $request->notes,
        ]);
        return response()->json($request->brandName);

    }



    public function viewActivity($id, $activityid){
        $activities = CampaignActivities::where('activity_id', '=', $activityid)->first();
        $campaign = Campaigns::where('campaign_id', '=', $id)->first();
        

        $comments = Users::rightJoin('campaigncomments', 'campaigncomments.user_id', '=', 'Users.user_id')
        ->where('activity_id', '=', $activityid)
        ->orderBy('comment_id', 'desc')
        ->get();

        
        return view('Campaigns.activities',[
            'activity' => $activities,
            'campaign' => $campaign,
            'comments' => $comments
        ]);
    }

    public function updateActivity(Request $request){
        $comments = CampaignComments::where('activity_id', '=', $request->activityid)->get();
        $activity = CampaignActivities::where('activity_id', '=', $request->activityid)->first();
        if($request->peer_review != "Select"){
            if($activity->peer_review != $request->peer_review || $activity->review_comment != $request->review_comment){
                $reviewcomment = New CampaignComments;
                $reviewcomment->review = 1;
                $reviewcomment->comment = $request->review_comment;
                $reviewcomment->review_status = $request->peer_review;
                $reviewcomment->activity_id = $request->activityid;
                $reviewcomment->campaign_id = $request->campaignid;
                $reviewcomment->user_id = session()->get('user_id');
                $reviewcomment->save();
            }
            
         }
        
        CampaignActivities::where('activity_id', '=', $request->activityid)->update([
            'ro_number' => $request->ro,
            'activityName' => $request->activityName,
            'platform' => $request->platform,
            'budgetLKR' => $request->lkr,
            'budgetUSD' => $request->usd,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'primaryKPI' => $request->primaryKPI,
            'secondaryKPI' => $request->secondaryKPI,
            'creativeLink' => $request->link,
            'status' => $request->status,
            'comments' => $request->notes,
            'peer_review' => $request->peer_review,
            'review_comment' => $request->review_comment, 
         ]);
    
         
            return redirect('/campaign/'.$request->campaignid)->with('status', 'updated');

    }

    public function addCommentActivity(Request $request){
                $reviewcomment = New CampaignComments;
                $reviewcomment->comment = $request->comment;
                $reviewcomment->activity_id = $request->activityid;
                $reviewcomment->campaign_id = $request->campaignid;
                $reviewcomment->user_id = session()->get('user_id');
                $reviewcomment->save();

                return redirect('/campaign/'.$request->campaignid.'/'.$request->activityid);
    }

    public function newActivity($id){
       
        return view('Campaigns.newactivity', [
            'campaignid' => $id
        ]);
    }

    public function newActivityPost(Request $request){
        $act = New CampaignActivities;
        $act->ro_number = $request->ro;
        $act->activityName = $request->activityName;
        $act->platform = $request->platform;
        $act->budgetLKR = $request->lkr;
        $act->budgetUSD = $request->usd;
        $act->primaryKPI = $request->primaryKPI;
        $act->secondaryKPI = $request->secondaryKPI;
        $act->startDate = $request->startDate;
        $act->endDate = $request->endDate;
        $act->status = "Pending";
        $act->comments = $request->notes;
        $act->creativeLink = $request->link;
        $act->campaign_id = $request->campaignid;
        $act->save();

        return redirect('/campaign/'.$request->campaignid);
    }

    public function deleteActivity(Request $request){
        CampaignActivities::where('activity_id', '=', $request->activityid)->delete();
        return redirect('/campaign/'.$request->campaignid);

    }


    public function exportCampaign($campaignid){
        return (new CampaignTest)->forCampaignId($campaignid)->download('Campaign#'.$campaignid.'.xlsx'); 
    }

    public function activityOverview(){
        $activity = CampaignActivities::join('Campaigns', 'Campaigns.campaign_id', '=', 'campaignactivities.campaign_id')
        ->orderBy('campaignactivities.activity_id', 'desc')
        ->paginate(100);
        return view('Campaigns.activityoverview', [
            'activity' => $activity
        ]);
    }
}
