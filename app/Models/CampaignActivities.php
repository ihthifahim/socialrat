<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignActivities extends Model
{
    use HasFactory;

    protected $primaryKey = 'activity_id';
    protected $table = "CampaignActivities";
    
}
