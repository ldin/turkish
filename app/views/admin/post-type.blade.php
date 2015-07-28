@extends('admin.layout')

@section('sidebar')
    @include('admin.post-menu')
@stop

@section('content')

<div>
<h3><i class="glyphicon glyphicon-menu-hamburger"></i> Категория</h3>
<br>

{{ Form::open(array('url' => 'admin/type/'.$type_id , 'class' => 'form-group')) }}

    <div class="tab-content">
        <div class="form-group {{ ($errors->first('name')) ? 'has-error' : '' }}">
            {{ Form::label('inputName', 'Название*') }}
            {{ Form::text('name', (isset($row->name)?$row->name:''), array('class'=>'form-control', 'id'=>'inputName')); }}
            {{ ($errors->first('name')) ? Form::label('error', 'Некорректный name', array('class'=>'control-label')) : '' }}
        </div>
        <div class="form-group {{ ($errors->first('type')) ? 'has-error' : '' }}">
            {{ Form::label('inputType', 'type*', array('class'=>'control-label')) }}
            {{ Form::text('type', (isset($row->type)?$row->type:''), array('class' => 'form-control', 'id'=>'inputType')); }}
            {{ ($errors->first('type')) ? Form::label('error', 'Некорректный type', array('class'=>'control-label')) : '' }}
        </div>
        <div class="form-group">
            {{ Form::label('selectTemplate', 'Шаблон') }}
            {{ Form::select('template', $templates, (isset($row->template)?$row->template:''), array('class' => 'form-control ', 'id'=>'selectTemplate'))}}
        </div>
        <div class="form-group">
            {{ Form::label('inputTitle', 'Заголовок', array('class'=>'control-label')) }}
            {{ Form::text('title', (isset($row->title)?$row->title:''), array('class' => 'form-control', 'id'=>'inputTitle')); }}
        </div>
        <div class="form-group">
            <div class="checkbox">
              <label>
                {{ Form::checkbox('status', '1', (isset($row->status)&&($row->status==true)?array('checked'):'') )  }}
                Выводить в меню на главной
              </label>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('inputText', 'Текст', array('class'=>'control-label')) }}
            <p class="info-txt"><small>Отображается только для некоторых шаблонов категорий ("меню-название", "текст")</small></p>
            {{ Form::textarea('text', (isset($row->text)?$row->text:''), array('class' => 'form-control', 'id'=>'inputText')); }}
        </div>

        <br />
        {{ Form::label('', '') . Form::submit('Сохранить', array( 'class' => 'btn btn-inverse')) }}

    </div>
    {{ Form::close() }}
</div>

@if(isset($row->template) && $row->template == 'page-rate')
    <div class="rate">
        <h3>Редактировать тарифы:</h3>
        <h4><a href="/admin/post-rate-inet"><i class="glyphicon glyphicon-pencil"></i> Интернет</a></h4>
        <h4><a href="/admin/post-rate-tv"><i class="glyphicon glyphicon-pencil"></i> TV</a></h4>
    </div>
@endif


@stop


@section('scripts')
    <script type="text/javascript" >
    $(document).ready(function() {
        var ckeditor = CKEDITOR.replace( 'inputText' );
        AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor});

    });

    </script>

@stop

