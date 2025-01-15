<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\CargoService;
use Illuminate\Http\JsonResponse;

class CargoController extends Controller
{
    public function __construct(private CargoService $cargoService)
    {
    }

    public function index(): JsonResponse
    {
        $cargos = $this->cargoService->getActiveCargos();
        return response()->json($cargos);
    }
}
