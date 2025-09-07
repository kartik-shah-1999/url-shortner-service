<?php

namespace App\Jobs;

use App\Mail\SendUserInvite;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserInviteJob implements ShouldQueue
{
    use Queueable;
    public $company, $reciever;

    /**
     * Create a new job instance.
     */
    public function __construct($company, $reciever)
    {
        $this->company = $company;
        $this->reciever = $reciever;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->reciever['email'])->send(new SendUserInvite($this->company, $this->reciever));
    }
}
