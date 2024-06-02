<!DOCTYPE html>
<html>
<head>
    <title>Staff List</title>
    <style>
        @page {
            margin: 20px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8e6e6;
        }
        .page {
            padding: 20px;
            box-sizing: border-box;
            background-color: #f8e6e6;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1, .header h2, .header p {
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            background-color: #f8e6e6;
        }
        th {
            background-color: #f8e6e6;
        }
        .age-column {
            text-align: center;
        }
        .full-width-row {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            background-color: #f8e6e6;
        }
    </style>
</head>
<body>
    <div class="page">
        <table>
            <tr>
                <td colspan="8" class="full-width-row">RDB TEXTILES LIMITED</td>
            </tr>
            <tr>
                <td colspan="8" class="full-width-row">Telinipara, Bhadreswar, Hooghly</td>
            </tr>
            <tr>
                <td colspan="8" class="full-width-row">Staff List as on {{ \Carbon\Carbon::now()->format('d/m/Y') }}</td>
            </tr>
            <thead>
                <tr>
                    <th>SL NO</th>
                    <th>EMPID</th>
                    <th>NAME</th>
                    <th>FATHER</th>
                    <th>DOJ</th>
                    <th>DOB</th>
                    <th>ADDRESS</th>
                    <th class="age-column">AGE AS ON DATE</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $key => $staff)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$staff->worker_no}}</td>
                        <td>{{$staff->worker_name}}</td>
                        <td>{{$staff->father_guardian_name}}</td>
                        <td>{{$staff->date_of_joining}}</td>
                        <td>{{$staff->date_of_birth}}</td>
                        <td>{{$staff->present_address}}</td>
                        <td class="age-column">{{\Carbon\Carbon::now()->year - \Carbon\Carbon::parse($staff->date_of_birth)->year}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
