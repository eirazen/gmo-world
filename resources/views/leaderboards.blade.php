@include('components/header')

<body>
    <div class="container mt-5">
        <h1>User List</h1>

        <!-- Display the paginated items -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Level 1</th>
                    <th>Level 2</th>
                    <th>Level 3</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->level_1 }}</td>
                        <td>{{ $user->level_2 }}</td>
                        <td>{{ $user->level_3 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Render pagination links -->
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
    </div>

</body>

</html>
