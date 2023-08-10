<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Travelstory</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-page.css') }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/animation.js') }}"></script>
</head>

<body>

    <button class="jump">Jump To Top </button>

    @include('book.header') <!--HEADER------------>

    <style>
        header {
            position: absolute;
            top: 0;
            background-color: black;
            z-index: 20;
        }
    </style>

    <div class="form-content">
        <p class="title">Data</p>
    
    <h2>Contacts</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Body</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->tel }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->body }}</td>
                <td>{{ $contact->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Reservations</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Hotel Name</th>
                <!-- 他のカラムのヘッダを追加 -->
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->username }}</td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->hotelName }}</td>
                <!-- 他のカラムのデータを表示 -->
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Users</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Address</th>
                <!-- 他のカラムのヘッダを追加 -->
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->tel }}</td>
                <td>{{ $user->address }}</td>
                <!-- 他のカラムのデータを表示 -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
