<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TASK</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
      <div class="list">
          <a class="title" href="/">
              TASK管理アプリ
          </a>
      </div>
      <div>
          <a class="group" href="/groups">
              グループ追加
          </a>
      </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>