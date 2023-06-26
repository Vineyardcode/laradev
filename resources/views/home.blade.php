<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite(['resources/css/app.css'])

</head>
<body>

  @auth
  <p class="m-5">Jste přihlášeni</p>

  <form action="/logout" method="POST" class="m-5">
    @csrf
    <button>Log out</button>
  </form>

  <div class="border-2 border-blue-500 border-dashed rounded-lg p-4 m-5">
    <h2>Začít novou hádku</h2>
    <form action="/create-post" method="POST">
      @csrf
      <input type="text" name="title" placeholder="téma hádky">
      <textarea name="body" placeholder="o čem se dnes chcete hádat ?"></textarea>
      <button>Začít hádku</button>
    </form>
  </div>

  <div class="border-2 border-blue-500 border-dashed rounded-lg p-4 m-5">
    <h2>Minulé hádky</h2>
    @foreach ( $posts as $post )

        <div class="bg-gray-500 m-5">
            <h3>{{$post['title']}} od {{$post->user->name}}</h3>
            {{$post['body']}}
            <p class="text-fuchsia-300"><a href="/edit-post/{{$post->id}}">Upravit hádku</a></p>
            <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-blue-500 bg-white">Smazat hádku</button>
            </form>
        </div>

    @endforeach
  </div>


  @else

  <div class="border-2 border-blue-500 border-dashed rounded-lg p-4">

    <h2 class="text-3xl">Registrace</h2>
    <form action="/register" method="POST">
      @csrf
      <input name="name" type="text" placeholder="name">
      <input name="email" type="text" placeholder="email">
      <input name="password" type="password" placeholder="password">
      <button>Registrovat</button>
    </form>

  </div>


  <div class="border-2 border-blue-500 border-dashed rounded-lg p-4">

    <h2 class="text-3xl">Přihlášení</h2>
    <form action="/login" method="POST">
      @csrf
      <input name="login-name" type="text" placeholder="name">
      <input name="login-password" type="password" placeholder="password">
      <button>Přihlásit se</button>
    </form>

  </div>
  @endauth


</body>
</html>
