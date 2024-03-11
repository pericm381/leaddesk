<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemStoreRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ItemController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $items = Item::all();

        return ItemResource::collection($items);
    }

    public function store(ItemStoreRequest $request): ItemResource
    {
        $validatedData = $request->validated();

        $item = Item::create($validatedData);

        return new ItemResource($item);
    }

    public function destroy(Item $item): JsonResponse
    {
        $item->delete();

        return response()->json('Item deleted!');
    }
}
