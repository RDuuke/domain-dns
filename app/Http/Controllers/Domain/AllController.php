<?php

namespace App\Http\Controllers\Domain;

use Exception;
use App\Models\Domain;
use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\HttpResponseException;

class AllController extends Controller
{
    public function __invoke()
    {
        try {

            return response()->json([
                'success'   => true,
                'message'   => 'Success All',
                'data'      => Domain::all()
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
