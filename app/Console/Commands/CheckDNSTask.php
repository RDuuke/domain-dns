<?php

namespace App\Console\Commands;

use App\Models\Domain;
use App\Helpers\GetDnsRecords;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckDNSTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:dns';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the dns of the domains every 5 minutes, looking for updates.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::channel('dns')->info("Running DNS verification task");
        foreach(Domain::all(['name', 'names_servers']) as $domain) 
        {
            $dns = (new GetDnsRecords)->getRecordsNS($domain->name);
            if (! empty(array_diff(json_decode($domain->names_servers), $dns)) > 0) {
                $domain->names_servers = $dns;
                $domain->save();
                Log::channel('dns')->info("Updated the DNS of the domain {$domain->name}");
            }
        }
        Log::channel('dns')->info("Finished DNS verification task");

    }
}
