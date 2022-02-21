<?php

namespace App\Modules;

use App\Constants\HttpCodes;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Exceptions\ForbiddenException;
use Illuminate\Auth\Access\AuthorizationException;



abstract class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

    }

    public function returnOk($objects, $httpCode = HttpCodes::HTTP_OK)
    {
        return response()->json($objects, $httpCode);
    }

    public function returnOkWithPagination($objects, $httpCode = HttpCodes::HTTP_OK)
    {
        return response()->json($objects, $httpCode);
    }

    public function returnCreated($objects, $httpCode = HttpCodes::HTTP_CREATED )
    {
        return response()->json($objects, $httpCode);
    }

    public function returnError($errors, $httpCode = HttpCodes::HTTP_INTERNAL_SERVER_ERROR)
    {
        return response()->json($response, $httpCode);
    }

    public function returnWithForbidden($errors, $httpCode = HttpCodes::HTTP_INTERNAL_SERVER_ERROR)
    {
        return response()->json($response, $httpCode);
    }

    protected function authorizeAction($policyMethod, $requestedObject = null)
    {
        
        //dd($policyMethod);
        try {
            if (null !== $requestedObject) {
                if ($requestedObject instanceof Paginator) {
                    foreach ($requestedObject->items() as $item) {
                        $this->authorize($policyMethod, $item);
                    }

                    return;
                }

                $this->authorize($policyMethod, $requestedObject);

                return;
            }

            $this->authorize($policyMethod, $this->service->repository->getModelName());
            
        } catch (AuthorizationException $exception) {
            throw new ForbiddenException('This action is forbidden');
        }
    }

}