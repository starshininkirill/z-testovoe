<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Filters\Models\TenderFilter;
use App\Http\Requests\TenderRequest;
use App\Http\Resources\TenderResource;
use App\Models\Tender;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TenderFilter $filter, TenderRequest $request)
    {
        $perPage = $request->input('per_page', 20);

        $tenders = Tender::filter($filter)->latest()->paginate($perPage);

        return TenderResource::collection($tenders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TenderRequest $request)
    {
        $validated = $request->validated();

        $tender = Tender::create($validated);

        return new TenderResource($tender);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tender = Tender::findOrFail($id);

        return new TenderResource($tender);
    }
}
