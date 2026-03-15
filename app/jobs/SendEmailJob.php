<?php

namespace App\Jobs;


use Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Mail\ContactMail;

class SendEmailJob implements ShouldQueue
{
  use Queueable;

  protected $user, $data;

  /**
   * Create a new job instance.
   */
  public function __construct($data)
  {
    $this->data = $data;
  }

  /**
   * Execute the job.
   */
  public function handle(): void
  {
    Mail::to($this->data["email"])->send(new ContactMail($this->data));
    \Log::info("Email sent!");
  }
}
