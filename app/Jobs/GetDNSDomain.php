<?php

namespace App\Jobs;

use App\Helpers\GetDnsRecords;
use Spatie\Dns\Dns;
use App\Models\Domain;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class GetDNSDomain implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $dns = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private Domain $domain)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->domain->names_servers = json_encode((new GetDnsRecords)->getRecordsNS($this->domain->name));
        $this->domain->save();
    }
}
