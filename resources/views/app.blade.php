<!doctype html>
<html lang="ja">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>
      @yield('title')
    </title>
  <!-- Styles -->
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
  <div class="l-wrapper">
    <div class="l-container">
      <div id="app">
        @yield('content')
      </div>
    </div>
  </div>
  <footer>
      <div class="l-footer--container l-row--central">
          <a href="{{ route('products.index') }}">
            ©︎RECOMEN
          </a>
      </div>
  </footer>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="{{ asset('js/jquery.js') }}"></script>
</body>
</html>