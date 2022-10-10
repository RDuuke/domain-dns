<?php

namespace App\Http\Controllers\Domain;

use Exception;
use App\Models\Domain;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Domain\StoreDomainRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateController extends Controller
{
    public function __invoke(StoreDomainRequest $request)
    {
        
        try {

            Domain::create([
                'uuid' => $request->get('uuid'),
                'name' => $request->get('name'),
                'names_servers' => json_encode($request->get('names_servers')),
            ]);
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
