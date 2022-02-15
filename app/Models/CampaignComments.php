<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignComments extends Model
{
    use HasFactory;

    protected $primary_key = 'comment_id';
    protected $table = "campaigncomments";


}
