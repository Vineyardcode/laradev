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
  <p>Jste přihlášeni</p>
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
  @endauth
  
</body>
</html>