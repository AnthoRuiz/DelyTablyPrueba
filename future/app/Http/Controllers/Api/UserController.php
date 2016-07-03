<?php

namespace future\Http\Controllers\Api;

use Dingo\Api\Exception\UpdateResourceFailedException;
use future\Role;
use future\Transformers\UserTransformer;
use future\User;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use future\Http\Requests;
use future\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class UserController
 * @package future\Http\Controllers\Api
 */
class UserController extends Controller
{
    use Helpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response->paginator(User::paginate(10), new UserTransformer());
    }

    /**
     * @param Requests\CreateUserRequest $request
     * @return \Dingo\Api\Http\Response
     */
    public function store(Requests\CreateUserRequest $request)
    {

        $data = $request->all();
        $rol = Role::where('name', 'lector')->first();
        $data['password'] = bcrypt($data['password']);
        $data['role_id'] = $rol->id;
        //dd($data);
        $user = User::create($data);
        return $this->response->item($user, new UserTransformer());

    }


    /**
     * @param Requests\UpdateUserRequest $request
     * @return \Dingo\Api\Http\Response
     */
    public function update(Requests\UpdateUserRequest $request)
    {

        try{
            $user = User::where('email', $request->get('email'))->firstOrFail();
            if($user->email !== $request->get('email')){
                $validator = app(Factory::class);
                $v = $validator->make($request->all(), [
                    'email' => 'unique:users.email'
                ]);
                if($v->fails()){
                    throw new UpdateResourceFailedException('Resource update failure', $v->errors()->getMessages());
                }
            }
            $user -> fill($request->all());
            $user->save();
            return $this->response->item($user, new UserTransformer());
        }catch (ModelNotFoundException $e){
            throw new NotFoundHttpException;
        }
    }


    /**
     * @param Requests\DeleteUserRequest $request
     * @return mixed
     */
    public function destroy(Requests\DeleteUserRequest $request)
    {
        try {
            $user = User::where('email', $request->get('email'))->firstOrFail();
            $user->delete();
            return $this->response->array(['message' =>'Deleted', 'status' => '200']);
        }catch (ModelNotFoundException $e){
            throw new NotFoundHttpException;
        }
    }
}
