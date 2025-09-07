<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyUser extends Model
{
    protected $fillable = [
        'company_id',
        'reciever_id',
        'sender_id',
        'invitation_status'
    ];
}
