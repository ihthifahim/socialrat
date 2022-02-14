<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\CampaignActivities;
use App\Models\Campaigns;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CampaignTest implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'Campaign ID',
            'Campaign Name',
            'Brand',
            'Client Approval',
            'Campaign Start Date',
            'Campaign End Date',
            'Planner',
            'Activity ID',
            'RO Number',
            'Activity Name',
            'Platform',
            'Budget LKR',
            'Budget USD',
            'Primary KPI',
            'Secondary KPI',
            'Review Status',
            'Review Comment',
            'Activity Status',
            
        ];
    }


    public function forCampaignId(int $campaignid){
        $this->campaignid = $campaignid;
        return $this;
    }


    public function query()
    {
        return Campaigns::query()
        ->join('campaignactivities', 'campaignactivities.campaign_id', '=', 'campaigns.campaign_id')
        ->where('campaignactivities.campaign_id', $this->campaignid);
    }

        public function map($row): array{
            $fields = [
            $row->campaign_id,
            $row->campaign_name,
            $row->brandName,
            $row->clientApproval,
            $row->startDate,
            $row->endDate,
            $row->userCreated,
            $row->activity_id,
            $row->ro_number,
            $row->activityName,
            $row->platform,
            $row->budgetLKR,
            $row->budgetUSD,
            $row->primaryKPI,
            $row->secondaryKPI,
            $row->peer_review,
            $row->review_comment,
            $row->status,

            
        ];
        return $fields;
    }
}
