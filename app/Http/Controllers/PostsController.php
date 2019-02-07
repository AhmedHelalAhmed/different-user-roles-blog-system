<?php

namespace App\Http\Controllers;

use View;
use App\Post;
use App\Repositories\PostRepository;
use App\Http\Requests\{StorePostRequest,UpdatePostRequest};
use Illuminate\Http\JsonResponse;
class PostsController extends Controller
{
    // space that we can use the repository from
    protected $model;

    public function __construct()
    {
        // set the model
        $post=new Post();
        $this->model = new PostRepository($post);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->all();
        return view('posts.index', ['posts' => $data]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->model->show($id);

        // handle if the record not found
        if($data instanceof JsonResponse)
        {
            return view('errors.404');
        }
        return view('posts.show', ['post' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // create record and pass in only fields that are fillable
        $this->model->create($request->only($this->model->getModel()->fillable));
        return redirect(route('posts.index'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->show($id);
        // handle if the record not found
        if($data instanceof JsonResponse)
        {
            return view('errors.404');
        }
        return view('posts.edit',['post'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        // update model and only pass in the fillable fields
        $this->model->update($request->only($this->model->getModel()->fillable), $id);
        return redirect(route('posts.index'));
    }


}
