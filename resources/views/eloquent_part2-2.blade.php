<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eloquen part 2</title>
</head>
<body>

</body><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eloquen part 2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <form action="{{ route('p2.search') }}" method="post">
        @csrf
        <label for="id">Nhập ID :</label>
        <input type="text" id="id" name="id" class="" placeholder="Nhập ID user...">
        <label for="ten">Nhập sdt :</label>
        <input type="text" id="ten" name="number" class="" placeholder="Nhập sdt...">
        <label for="class">Nhập role :</label>
        <input type="text" id="class" name="role" class="" placeholder="Nhập role...">
        <button type="submit" value="Tìm kiếm">Tìm kiếm</button>
        <a class="btn btn-link" href="{{route('p2.index') }}" >DS user</a>
    </form>
    <table class="table table-hover table-striped">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Role</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->number }}</td>
                    <td>{{ $user->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

</html>
