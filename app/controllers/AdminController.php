<?php

class AdminController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    protected function setupLayout()
    {
        $type_page=Type::lists('name', 'id');

        View::share([
            'type_page'=>$type_page,
        ]);
    }

    public function getIndex()
    {

        $view = array(
         );
        return View::make('admin.index', $view);
    }



    public function getContent($type_id='content', $id='edit'){

        if($type_id=='content' && $id=='edit'){
            $posts = Type::orderBy('created_at', 'desc')->get();
            return View::make('admin.content')->with('posts', $posts);
        }

        $posts = Post::where('type_id', '=', $type_id)->where('parent', '=', '0')->orderBy('created_at', 'desc')->get();
        $posts_child = Post::where('type_id', '=', $type_id)->where('parent', '!=', '0')->orderBy('created_at', 'desc')->get();

        $view = array(
            'posts' => $posts,
            'posts_child' => $posts_child,
            'type_id' => $type_id,
         );

        $templates = array(
                'gallery'=>'Галлерея',
                'page'=>'Текст',
        );

        //добавляем категорию
        if($type_id=='type' && $id=='add'){
              $view['templates'] = $templates;
            return View::make('admin.post-type', $view);
        }
        
        //редактируем категорию
        if($id=='edit'){
            $post = Type::where('id', $type_id)->first();

            $view['row'] = $post;
            $view['templates'] = $templates;
            return View::make('admin.post-type', $view);
        }

        //добавляем или редактируем страницу
        else if(is_numeric($id)||$id=='add'){
            $post = Post::find($id);
            $galleries = Gallery::where('post_id', $id)->get();

            //$parent = array();
            $parent[0]= '';
            foreach ($posts as $value) {
                if($value->id!=$id){$parent[$value['id']]= $value['name'];}
            }
            $view['galleries'] = $galleries;
            $view['parent'] = $parent;
            $view['row'] = $post;

            return View::make('admin.posts', $view);
        }
    }

    public function postContent($type_id, $id='add')
        {
            $all = Input::all();
             //var_dump($all); die();
            if(!$all['slug']) {$all['slug'] = BaseController::ru2Lat($all['name']);}
            $rules = array(
                'name' => 'required|min:2|max:255',
                'title' => 'required|min:3|max:255',
                'slug'  => 'required|min:4|max:255|alpha_dash',
                //'slug'  => 'required|min:4|max:255|alpha_dash|unique:posts,slug,post_id'.$post_id,
            );
            $validator = Validator::make($all, $rules);
            if ( $validator -> fails() ) {
                return Redirect::to('/admin/content/'.$type_id.'/'.$id)
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Ошибка');
            }
            if(is_numeric($id))   {
                  $post = Post::find($id);
            }
            else {
                $post = new Post();
            }
            $post->type_id = $all['type_id'];
            $post->name = $all['name'];
            $post->title = $all['title'];
            $post->slug = $all['slug'];

            // $post->preview = $all['preview'];
            $post->text = $all['text'];
            $post->parent = $all['parent'];
            $post->status = isset($all['status'])?true:false;
            // $post->noindex = isset($all['noindex'])?true:false;
            $post->description = $all['description'];
            $post->keywords = $all['keywords'];

            if(isset($all['image'])){
                $full_name = Input::file('image')->getClientOriginalName();
                $filename=$full_name;
                $path = 'upload/image/';
                Input::file('image')->move($path, $filename);
                $post->image = $path.$filename;
            }

            $post->save();

            return Redirect::to('/admin/content/'.$all['type_id'].'/'.$id)
                    ->with('success', 'Изменения сохранены');
        }

    public function postType($type_id)
        {
            $all = Input::all();
            $rules = array(
                'name' => 'required|min:2|max:255',
                'type' => 'required|min:3|max:255',
            );
            $validator = Validator::make($all, $rules);
            if ( $validator -> fails() ) {
                return Redirect::to('/admin/content/'.$type_id)
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Ошибка');
            }
            if(is_numeric($type_id))   {
                  $post = Type::find($type_id);
            }
            else {
                $post = new Type();
            }
            $post->type = $all['type'];
            $post->name = $all['name'];
            $post->template = $all['template'];
            $post->title = $all['title'];
            $post->text = $all['text'];
            $post->status = isset($all['status'])?true:false;

            $post->save();

            return Redirect::to('/admin/content/'.$type_id)
                    ->with('success', 'Изменения сохранены');
        }

public function postImageGallery($type_id, $post_id, $image_id='add')
        {
            $all = Input::all();
            if($image_id=='add'){
                $rules = array(
                    'image' => 'required',
                );

                $validator = Validator::make($all, $rules);
                if ( $validator -> fails() ) {
                    return Redirect::to('/admin/content/'.$type_id.'/'.$post_id.'/#image-'.$image_id)
                            ->withErrors($validator)
                            ->withInput()
                            ->with('error-img'.$image_id, 'Ошибка');
                }
            }    
            if(!is_numeric($post_id)){return false;}

            if(is_numeric($image_id))   {
                $post = Gallery::find($image_id);
                // var_dump($post); die(); 
            }
            else {
                $post = new Gallery();
                $post->post_id = $post_id;
            }
            $post->text = $all['text'];
            $post->alt = $all['alt'];
            
            // $post->status = isset($all['status'])?true:false;
            if(!empty($all['image'])){
                $full_name = Input::file('image')->getClientOriginalName();
                $filename=$full_name;
                $path = 'upload/gallery/'.$post_id.'/';
                $path_sm = 'upload/gallery/'.$post_id.'/small/';
                if(!is_dir($path_sm)){
                    mkdir($path_sm, 0777, true);
                }
                Input::file('image')->move($path, $filename);
                $post->image = $path.$filename;

                // $img = Image::make($path.$filename)->resize(300, 200);
                Image::make($path.$filename)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path_sm.$filename);
                $post->small_image = $path_sm.$filename;
            }
            $post->save();
            return Redirect::to('/admin/content/'.$type_id.'/'.$post_id.'/#image-'.$image_id)
                    ->with('success-img'.$image_id, 'Изменения сохранены');
        }


//удаление страниц
    public function getDelete($type, $type_id, $id){

        switch ($type){
            case 'page':
                $posts = Post::where('type_id', '=', $type_id)->where('id', '=', $id)->delete();
                $redir = '/admin/content/'.$type_id;
                break;
            case 'slide':
                $slide = Slider::find($id)->delete();
                $redir = '/admin/slider';
                break;
            case 'user':
                $slide = User::find($id)->delete();
                $redir = '/admin/user';
                break;
            case 'image':
                $slide = Gallery::find($id)->first();;
                unlink($slide->image);
                unlink($slide->small_image);
                $slide->delete();
                // $redir = '/admin/content/'.$type_id;
                return Redirect::back();
                break;    
        }

        return Redirect::to($redir);

    }

//настройки
    public function getSettings()
        {
            $settings = Setting::get();

            $view = array(
                'settings' => $settings,
            );
            return View::make('admin.settings', $view);
        }

    public function postSettings($news_id='')
        {
            $settings = Input::all();

            foreach($settings as $key=>$setting) {
                if($key[0]!='_'){
                    $field_ru = Setting::where('name', '=', $key)->first();
                    $field_ru->value = $setting;
                    $field_ru->save();
                }
            }
            return Redirect::to('/admin/settings');
        }

//пользователи
    public function getUser($id='')
        {
            $users = User::get();
            $user = User::find($id);

            $view = array(
                'users' => $users,
                'row' => $user,
             );

            return View::make('admin.users', $view);
        }

    public function postUser($id)
        {
            $all = Input::all();

            $rules = array(
                'name' => 'required|min:2|max:255',
                'email'  => 'required|email',

            );
            $validator = Validator::make($all, $rules);
            if ( $validator -> fails() ) {
                return Redirect::to('/admin/user/'.$id)
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Ошибка');
            }
            if($id)   {
                  $user = User::find($id);
            }
            else {
                $user = new User();
            }

            $user->name = $all['name'];
            $user->email = $all['email'];
            $user->isActive = $all['isActive'];
            $user->save();

            return Redirect::to('/admin/user/'.$id)
                    ->with('success', 'Изменения сохранены');
        }

        //слайдер

    public function getSlider($id='')
        {
            $slides_menu = Slider::get(['id', 'name']);
            $slide = Slider::where('id', $id)->get();

            $view = array(
                'slides_menu' => $slides_menu,
                'slides' => $slide,
                'row' => (!empty($slide[0]))?$slide[0]:'',
            );
            return View::make('admin.slider', $view);
        }

    public function postSlider($id='')
        {
            $all = Input::all();
            $rules = array(
                'name' => 'required|min:2|max:255',
            );
            $validator = Validator::make($all, $rules);
            if ( $validator -> fails() ) {
                return Redirect::to('/admin/slider/'.$id)
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Ошибка');
            }
            if(is_numeric($id))   {
                  $post = Slider::find($id);
            }
            else {
                $post = new Slider();
            }

            $post->name = $all['name'];
            $post->text = $all['text'];
            $post->button = $all['button'];
            $post->link = $all['link'];
            $post->status = isset($all['status'])?true:false;

            if(isset($all['image'])){
                $full_name = Input::file('image')->getClientOriginalName();
                $filename=$full_name;
                $path = 'upload/slider/';
                Input::file('image')->move($path, $filename);
                $post->image = $path.$filename;
            }

            $post->save();

            return Redirect::to('/admin/slider/'.$id.'/#preview-slide')
                    ->with('success', 'Изменения сохранены');

        }



}
