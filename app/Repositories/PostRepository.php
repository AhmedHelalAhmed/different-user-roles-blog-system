<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Exception;
use View;
use Auth;
class PostRepository implements RepositoryInterface {

    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this -> model = $model;
    }

    // Get all instances of model
    public function all()
    {
        try
        {
            return $this -> model ::with("user")
                -> orderBy('created_at', 'DESC')
                -> paginate(7);
        } catch (Exception $e)
        {
            if (env("APP_ENV") == "production")
            {
                return view('errors.404', ['error' => $e -> getMessage()]);
            } else
            {
                return response() -> json([
                    'message' => $e -> getMessage(),
                ], 500);
            }
        }


    }

    // create a new record in the database
    public function create(array $data)
    {
        try
        {
            // add current user_id to post to refer to the creator
            $data=array_merge($data, ['user_id' => Auth::user()->id]);
            $this -> model -> create($data);
            $request=request();
            $request->session()->flash('message', 'Post added successfully');
            $request->session()->flash('alert-class', 'alert-success');
        } catch (Exception $e)
        {
            if (env("APP_ENV") == "production")
            {
                return view('errors.404', ['error' => $e -> getMessage()]);
            } else
            {
                return response() -> json([
                    'message' => $e -> getMessage(),
                ], 500);
            }
        }
    }

    // update record in the database
    public function update(array $data, $id)
    {
        try
        {
            // add current user_id to post
            $data=array_merge($data, ['user_id' => Auth::user()->id]);
            $record = $this -> model -> findOrFail($id);
            $record -> update($data);
            $request=request();
            $request->session()->flash('message', 'Post updated successfully');
            $request->session()->flash('alert-class', 'alert-success');
        } catch (Exception $e)
        {
            if (env("APP_ENV") == "production")
            {
                return view('errors.404', ['error' => $e -> getMessage()]);
            } else
            {
                return response() -> json([
                    'message' => $e -> getMessage(),
                ], 500);
            }
        }
    }

    // remove record from the database
    public function delete($id)
    {
        try
        {
            return $this -> model -> destroy($id);
        } catch (Exception $e)
        {
            if (env("APP_ENV") == "production")
            {
                return view('errors.404', ['error' => $e -> getMessage()]);
            } else
            {
                return response() -> json([
                    'message' => $e -> getMessage(),
                ], 500);
            }
        }


    }

    // show the record with the given id
    public function show($id)
    {
        try
        {
          return $this-> model ->findOrFail($id);

        }
        catch (Exception $e)
        {
            if (env("APP_ENV") == "production")
            {
                return view('errors.404', ['error' => $e -> getMessage()]);
            } else
            {
                return response() -> json([
                    'message' => $e -> getMessage(),
                ], 500);
            }
        }
    }

    // Get the associated model
    public function getModel()
    {
        try
        {
            return $this -> model;
        } catch (Exception $e)
        {
            if (env("APP_ENV") == "production")
            {
                return view('errors.404', ['error' => $e -> getMessage()]);
            } else
            {
                return response() -> json([
                    'message' => $e -> getMessage(),
                ], 500);
            }
        }


    }

    // Set the associated model
    public function setModel($model)
    {
        try
        {
            $this -> model = $model;
            return $this;
        } catch (Exception $e)
        {
            if (env("APP_ENV") == "production")
            {
                return view('errors.404', ['error' => $e -> getMessage()]);
            } else
            {
                return response() -> json([
                    'message' => $e -> getMessage(),
                ], 500);
            }
        }


    }

    // Eager load database relationships
    public function with($relations)
    {
        try
        {
            return $this -> model -> with($relations);
        } catch (Exception $e)
        {
            if (env("APP_ENV") == "production")
            {
                return view('errors.404', ['error' => $e -> getMessage()]);
            } else
            {
                return response() -> json([
                    'message' => $e -> getMessage(),
                ], 500);
            }
        }
    }
}
