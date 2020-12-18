<?php

namespace App\Jobs;

use App\Events\DeletePaymentNotification;
use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Request;

class DeletePayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        Payment::destroy($id);
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      
    }
}
