<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Schedule</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        h2 {
            background-color: #ddd;
            padding: 10px;
            margin-top: 20px;
        }
        .content {
            margin: 100px 15% 50px;
        }
        .content h1 {
            text-align: center;
        }
        .refresh-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .refresh-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="content">
    <form method="GET" action="">
        <button type="submit" class="refresh-button">🔄 Generate schedule</button>
    </form>

    <h1>School Schedule</h1>

    @foreach($schedule as $day => $lessons)
        <h2>Day {{ $day }}</h2>
        <table>
            <thead>
            <tr>
                <th>Lesson</th>
                <th>Class</th>
                <th>Subject</th>
                <th>Teacher</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->bell->name }}</td>
                    <td>{{ $lesson->schoolClass->name }}</td>
                    <td>{{ $lesson->subject->name }}</td>
                    <td>{{ $lesson->teacher->full_name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endforeach
</div>

</body>
</html>
