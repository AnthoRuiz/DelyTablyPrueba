<?php

namespace future\Http\Controllers\Api;

use Carbon\Carbon;
use Dingo\Api\Exception\UpdateResourceFailedException;
use future\Category;
use future\Content;
use future\Role;
use future\Transformers\ContentTransformer;
use future\User;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use future\Http\Requests;
use future\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContentController extends Controller
{
    use Helpers;

    public function index()
    {

        $dateNow = Carbon::now('America/Bogota');
        $contents = Content::where('exp_date', '>=', $dateNow)->paginate(10);

        return $this->response->paginator($contents, new ContentTransformer());
    }


    public function store(Requests\CreateContentRequest $request)
    {
        try{
            $data = $request->all();
            $content = new Content();
            $user = User::where('email', $request->get('authorEmail'))->firstOrFail();
            $category = Category::where('name', $request->get('category'))->firstOrFail();
            if($user->role_id == 1){

                $content->title = $data['title'];
                $content->description = $data['description'];

                $publishing_date = new Carbon($data['publishing_date']);
                $content->publishing_date = $publishing_date;

                $exp_date = new Carbon($data['exp_date']);
                $content->exp_date = $exp_date;

                $content->author = $user->name;
                $content->category_id = $category->id;
                $content->user_id = $user->id;
                $content->save();
                return $this->response->item($content, new ContentTransformer());

            }else{
                return $this->response->array(['message' =>'Email is not Moderador', 'status' => '404']);
            }
        }catch (ModelNotFoundException $e){
            throw new NotFoundHttpException;
        }
    }

    public function update(Requests\UpdateContentRequest $request)
    {
        try{
            $data = $request->all();
            $exp_date = new Carbon($data['exp_date']);

            $user = User::where('email', $request->get('authorEmail'))->firstOrFail();
            $category = Category::where('name', $request->get('category'))->firstOrFail();
            $content = Content::where('id', $request->get('id'))->firstOrFail();
            if($user->role_id == 1){
                if($exp_date > $content->publishing_date){
                    $content -> fill($request->all());
                    $content->category_id = $category->id;
                    $content->save();
                    return $this->response->item($content, new ContentTransformer());
                }else{
                    return $this->response->array(['message' =>'Exp_date is less than publishing_date', 'status' => '500']);
                }
            }else{
                return $this->response->array(['message' =>'Email is not Moderador', 'status' => '404']);
            }

        }catch (ModelNotFoundException $e){
            throw new NotFoundHttpException;
        }

    }
    
    public function destroy(Requests\DeleteContentRequest $request)
    {
        try {
            $content = Content::where('id', $request->get('id'))->firstOrFail();
            $content->delete();
            return $this->response->array(['message' =>'Deleted', 'status' => '200']);
        }catch (ModelNotFoundException $e){
            throw new NotFoundHttpException;
        }
    }
}
