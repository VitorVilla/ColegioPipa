<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Models\Post;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ApiResponser;

    protected $repo;

    public function __construct(PostRepository $postRepository) {
        $this->repo = $postRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->repo->getAll();
        return $this->successResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->repo->getOne($id);
        return $this->successResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->repo->deleteOne($id);
        return $this->successResponse($data);
    }
}
