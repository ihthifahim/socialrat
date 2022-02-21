<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignRO extends Model
{
    use HasFactory;

    protected $primary_key = 'ro_id';
    protected $table = "campaign_ro";
}
