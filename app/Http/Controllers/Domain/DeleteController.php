<?php

namespace App\Http\Controllers\Domain;

use Exception;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\Exceptions\HttpResponseException;

class DeleteController extends Controller
{
    public function __invoke(string $id)
    {
        try {
            $domain = Domain::findOrFail($id);
            if ($domain->delete()) {
                return response()->json([
                    'success'   => true,
                    'message'   => 'Success delete',
                    'data'      => []
                ]);
            }

            return response()->json([
                'success'   => false,
                'message'   => 'Error delete',
                'data'      => []
            ]);

        } catch (Exception $exception) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Exception creation',
                'data'      => $exception->getMessage()
            ]));
        }
    }
}
