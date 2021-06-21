<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <style>
    body {
      width: 1280px;
      margin: 10px auto;
      font-size: 16px;
    }

    h1 {
      font-size: 30px;
      text-align: center;
    }

    input,
    textarea {
      font-size: 16px;
      margin-left: 50px;
      padding: 10px;
      border: 1px solid #bbb;
      border-radius: 5px;
    }

    button {
      display: flex;
      padding: 10px 50px;
      background: black;
      border-radius: 8px;
      color: white;
      text-align: center;
    }
  </style>
</head>

<body>
  <h1>@yield('title')</h1>
  <div class="contact">
    @yield('contact')
  </div>
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</body>

</html>