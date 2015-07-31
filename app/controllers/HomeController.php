<?php

class HomeController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */
    protected function setupLayout()
    {
        $type_page=Type::where('status',1)->lists('name', 'type');

        View::share([
            'type_page'=>$type_page,
        ]);
    }

    public function showWelcome()
    {
        //$slides = Slider::where('status', 1)->get();
        return View::make('home.index');//->with('slides',$slides);
    }

    public function getPage($type, $slug=''){

        $type_post = Type::where('type', $type)->first();
        $posts_child = $galleries = $posts = $parent = array();


        if(empty($type_post)||$type_post->template=='gallery'){
            $parent = Post::where('slug', $type)->first();
            $type_post = Type::where('id', $parent->type_id)->first();
            $galleries = Gallery::where('post_id', $parent->id)->get();
        }
        else{

            $posts = Post::where('type_id',$type_post->id)->where('status',1)->where('parent',0)->orderBy('created_at', 'desc')->get();

            if($slug!=''){
                $parent = Post::where('slug',$slug)->first();
                $posts_child = Post::where('type_id',$type_post->id)->where('status',1)->where('parent','=',$parent->id)->orderBy('created_at', 'desc')->get();
                $galleries = Gallery::where('post_id', $parent->id)->get();
            }
        }


        $view = array(
            'type'=>$type_post,
            'posts'=>$posts,
            'row' => $parent,
            'posts_child' => $posts_child,
            'galleries' => $galleries,
        );
        return View::make('home.'.$type_post->template, $view);
    }

    public function postFormRequest()
    {
            $all = Input::all();
            // var_dump($all); die();

            $rules = array(
                // 'name' => 'required|min:2|max:255',
            );

            $validator = Validator::make($all, $rules);
            if ( $validator -> fails() ) {
                return Redirect::to('/#contact')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('errorRequest', 'Ошибка');
            }

            $post = new Requests();
            $post->name = $all['name'];
            $post->phone = $all['phone'];
            $post->email = $all['email'];
            $post->text = $all['text'];
            $post->save();

            // $mail = Setting::where('name', 'email')->first('value');
            // $mail = 'ldin04ka@mail.ru';
            $mail = 'sovet.consul@gmail.com';
             //var_dump($mail->value); die();

            $messages = '<b>Пользователь: </b>'.$all['name'].'<br>';
            $messages .= '<b>Вопрос: </b>'.$all['text'].'<br>';
            $messages .= '<b>Контактные данные: </b>'.'<br>';
            $messages .= '<i>Телефон: </i>'.$all['phone'].'<br>';
            $messages .= '<i>Емайл: </i>'.$all['email'].'<br>';

                Mail::send('emails.message',
                    array('messages' => $messages ),
                    function ($message) use ($mail)  {
                        $message->to($mail)->subject('Обращение посетителя');
                    }
                );

            return Redirect::to('/#contact')
                    ->with('successRequest', 'Сообщение отправлено');
    }

    public function autocomplete($type, $street_id=''){
        $term = Input::get('term');

        $results = array();

        if($type == 'street'){

            $queries = DB::connection('mysql_address')->table('common_street')
                ->where('name', 'LIKE', '%'.$term.'%')
                ->select('name', 'id')
                ->take(5)->get();
            foreach ($queries as $query)
                {
                    $results[] = [ 'id' => $query->id, 'value' => $query->name ];
                }


        }
        else if($type == 'house'){
            $queries = DB::connection('mysql_address')->table('common_house')
                ->where('street', $street_id)
                ->where('house', 'LIKE', '%'.$term.'%')
                ->select('house as name', 'id', 'flag_t', 'flag_p' )
                ->take(5)->get();

            foreach ($queries as $query)
            {
                $results[] = [ 'id' => $query->id, 'value' => $query->name, 'flag'=>$query->flag_t ];
            }
        }
        else{
            return false;
        }


        // var_dump($results); die();
    return Response::json($results);
    }


    public function getRate($slug=''){

        $type=Type::where('type', 'rate')->first();
        $posts = Post::where('type_id', '=', $type->id)->where('status',1)->where('parent', '=', '0')->orderBy('created_at', 'desc')->get();
        $posts_child = Post::where('type_id', '=', $type->id)->where('status',1)->where('parent', '!=', '0')->orderBy('created_at', 'desc')->get();
        // var_dump($slug);
        if(!empty($slug)){
            $row = Post::where('slug', $slug)->first();
            $posts_child = Post::where('type_id', '=', $type->id)->where('parent', $row->id)->where('status',1)->orderBy('created_at', 'desc')->get();
            $blade = 'home.page-menu-title';
        }
        else{
            $tv = Rate::where('type', 'tv')->where('status', 1)->orderBy('position', 'asc')->get();
            $inet = Rate::where('type', 'inet')->first();
            $inetOption = Rate::where('type', 'inetOption')->where('status', 1)->orderBy('position', 'asc')->get();
            $row = array(
                'inet'=>json_decode($inet->description),
                'inetOption'=>$inetOption,
                'tv'=>$tv,
            );
            $blade = 'home.page-rate';
        }

        $view = array(
            'posts' => $posts,
            'posts_child' => $posts_child,
            'type' => $type,
            'row'=> $row,
        );
        return View::make($blade, $view);
    }

    public function postConnect( $slug=''){
        var_dump(Input::all());die();


        $view = array(

        );
        return View::make('home.index', $view);
    }
}
