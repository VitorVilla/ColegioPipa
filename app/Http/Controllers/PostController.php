<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Post\PostUpdateRequest;
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
        $data = $this->repo->getAllPost();
        return $this->successResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $data = $this->repo->addPost($request);
        return $this->successResponse($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->repo->getOnePost($id);
        return $this->successResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, PostUpdateRequest $request)
    {
        $data = $this->repo->updatePost($id, $request);
        return $this->successResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->repo->deleteOnePost($id);
        return $this->successResponse($data);
    }
}
