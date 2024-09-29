@extends('app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/task.css') }}">
@endsection

@section('content')

<div>
  @if (session('message'))
    <div class="message">
      {{ session('message') }}
    </div>
  @endif
  @if ($errors->any())
    <div class="error">
      <div>
        @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    </div>
  @endif
</div>


<div>
  <div class="create_top">
    <h2>新規作成</h2>
  </div>
  <div class="create_box">
    <form action="/tasks" method="post">
      @csrf
        <div class="new_create_task">
          <div class="new_task_box">
            <input class="input_new_task" type="text" name="task" value="{{ old('task') }}">
            <select class="group_select" name="group_id">
              @foreach ($groups as $group)
              <option value="{{ $group['id'] }}">{{ $group['group_name'] }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <button class="add_button" type="submit">タスクを追加</button>
          </div>
        </div>
    </form>
  </div>

  <div class="search_top">
    <h2>Task検索</h2>
  </div>
  <div class="search_box">
    <form class="search-form" action="/tasks/search" method="get">
      @csrf
        <div class="search_task">
          <div class="search_task_box">
            <input class="input_new_task" type="text" name="keyword" value="{{ old('keyword') }}">
            <select class="group_select" name="group_id">
              @foreach ($groups as $group)
              <option value="{{ $group['id'] }}">{{ $group['group_name'] }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <button class="search_button" type="submit">タスクを検索</button>
          </div>
        </div>
    </form>
  </div>

  <div>
    @foreach ($tasks as $task)
      <div class="task_group_block">
        <div class="task_group_block">
          <form class="update-form" action="/tasks/update" method="POST">
          @method('PATCH')
          @csrf
            <div class="task_group_item">
              <div>
                <input class="input_task_update" type="text" name="task" value="{{ $task['task'] }}">
                <input type="hidden" name="id" value="{{ $task['id'] }}">
              </div>
              <div>
                <div class="group_selected">{{ $task->group->group_name}}</div>
              </div>
              <div>
                <button class="update_button" type="submit">更新</button>
              </div>
            </div>
          </form>
        </div>
        <div>
          <form action="/tasks/delete" method="POST">
          @method('DELETE')
          @csrf
            <div class="delete_form">
              <input type="hidden" name="id" value="{{ $task['id'] }}">
              <button class="delete_button" type="submit">削除</button>
            </div>
          </form>
        </div>
    </div>
    @endforeach
  </div>
</div>
@endsection