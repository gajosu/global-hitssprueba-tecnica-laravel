<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\DepartamentoService;
use Illuminate\Http\JsonResponse;

class DepartamentoController extends Controller
{

    public function __construct(private DepartamentoService $departamentoService)
    {
    }

    public function index(): JsonResponse
    {
        $departamentos = $this->departamentoService->getActiveDepartamentos();
        return response()->json($departamentos);
    }
}
