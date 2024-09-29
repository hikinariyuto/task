@extends('app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/group.css') }}">
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

<div class="group_addition">
  <div class="task_top">
    <h2>グループ追加</h2>
  </div>
  <div class="task_create">
    <form class="create-form" action="/groups" method="post">
      <div class="input_space">
      @csrf
        <div class="input_task">
          <input class="input_task_name" type="text" name="group_name" value="{{ old('name') }}">
        </div>
        <div class="create_button">
          <button class="create_group_name" type="submit">作成</button>
        </div>
      </div>
    </form>
  </div>
  <div>
    @foreach ($groups as $group)
      <div class="group_block">
        <div>
          <form class="update_form" action="/groups/update" method="post">
            @method('PATCH')
            @csrf
            <div class="group_item">
              <div>
                <input class="group_name_item" type="text" name="group_name" value="{{ $group['group_name'] }}">
                <input type="hidden" name="id" value="{{ $group['id'] }}">
              </div>
              <div class="update_input">
                <button class="update_button" type="submit">更新</button>
              </div>
            </div>
          </form>
        </div>
        <div class="delete_item">
          <form class="delete-form" action="/groups/delete" method="post">
            @method('DELETE')
            @csrf
              <div class="delete_input">
                <input type="hidden" name="id" value="{{ $group['id'] }}">
                <button class="delete_button" type="submit">削除</button>
              </div>
          </form>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection