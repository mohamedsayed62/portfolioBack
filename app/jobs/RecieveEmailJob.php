<?php

  namespace App\Jobs;

  use App\Mail\recieveMail;
  use Illuminate\Contracts\Queue\ShouldQueue;
  use Illuminate\Foundation\Queue\Queueable;
  use Mail;

  class RecieveEmailJob implements ShouldQueue
  {
    use Queueable;
  protected $data;

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
    Mail::to("midosaed62@gmail.com")->send(new recieveMail($this->data));
    \Log::info("Email sent!");
  }
  }
