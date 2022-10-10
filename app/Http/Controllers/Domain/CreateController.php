<?php

namespace App\Http\Controllers\Domain;

use Exception;
use App\Models\Domain;
use App\Http\Controllers\Controller;
use App\Http\Requests\Domain\StoreDomainRequest;
use App\Jobs\GetDNSDomain;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateController extends Controller
{
    public function __invoke(StoreDomainRequest $request)
    {
        
        try {

            $domain = Domain::create([
                'uuid' => $request->get('uuid'),
                'name' => $request->get('name'),
            ]);

            GetDNSDomain::dispatch($domain);
            return response()->json([
                'success'   => false,
                'message'   => 'Success creation',
                'data'      => []
            ]);
            
        } catch (Exception $exception) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Exception',
                'data'      => $exception->getMessage()
            ]));
        }
    }        
}
