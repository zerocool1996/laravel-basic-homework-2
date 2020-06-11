<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eloquen part 1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <form action="{{ route('p1.search') }}" method="post">
        @csrf
        <label for="id">Nhập ID :</label>
        <input type="text" id="id" name="id" class="" placeholder="Nhập ID user...">
        <label for="ten">Nhập tên :</label>
        <input type="text" id="ten" name="firstname" class="" placeholder="Nhập tên user...">
        <label for="class">Nhập class :</label>
        <input type="text" id="class" name="class" class="" placeholder="Nhập lớp...">
        <button type="submit" value="Tìm kiếm">Tìm kiếm</button>
        <a class="btn btn-link" href="{{route('p1.index') }}" >DS user</a>
    </form>
    <table class="table table-hover table-striped">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Class</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->class }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{ $users->links() }}
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
