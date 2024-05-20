<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pet\GetByIdRequest;
use App\Http\Requests\Pet\GetByStatusRequest;
use App\Http\Requests\Pet\StoreRequest;
use App\Http\Requests\Pet\UpdateRequest;
use App\Services\PetService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PetController extends Controller
{
    private PetService $petService;
    public function __construct()
    {
        $this->petService = new PetService();
    }

    public function view() : Response
    {
        return response()->view('pet.index');
    }

    public function store(StoreRequest $request) : JsonResponse
    {
        $data = $this->petService->store($request->validated());
        return response()->json($data,200);
    }
    public function index(GetByStatusRequest $request) : JsonResponse
    {
        $data = $this->petService->getAll($request->validated());
        return response()->json($data);
    }
    public function show(GetByIdRequest $request) : JsonResponse
    {
        $data = $this->petService->getOne($request->validated()['id']);
        return response()->json($data,200);
    }
    public function update(int $id, UpdateRequest $request) : JsonResponse
    {
        $data = $this->petService->update($id, $request->validated());

        return response()->json([]);
    }
    public function destroy(GetByIdRequest $request) : JsonResponse
    {

        return response()->json([]);
    }

}
