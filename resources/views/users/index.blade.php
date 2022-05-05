<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card">
                    <form action="{{ route('users.store') }}" method="post">
                        @if($errors -> any())
                            <div class="alert alert-danger">
                                @foreach($errors -> all() as $error)
                                    - {{ $error }} <br>
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-3">
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Correo">
                            </div>
                            <div class="col-sm-3">
                                <input type="password" name="password"  value="{{ old('password') }}" class="form-control" placeholder="Clave">
                            </div>
                            <div class="col-auto">
                                @csrf
                                <button type="submit" name="store" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>&nbsp</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user -> id }}</td>
                                <td>{{ $user -> name }}</td>
                                <td>{{ $user -> email }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input
                                                type="submit"
                                                value="Eliminar"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Desea eliminar... ?')"
                                        >
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
