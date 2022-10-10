<?php

namespace App\Helpers;

use Spatie\Dns\Dns;

class GetDnsRecords
{
    private array $dns = [];
    public function getRecordsNS(string $domain) : array 
    {
        $records = (new Dns)->getRecords($domain, 'NS');  

        foreach($records as $record) {
            array_push($this->dns, $record->target());
        }

        return $this->dns;
    }
}
