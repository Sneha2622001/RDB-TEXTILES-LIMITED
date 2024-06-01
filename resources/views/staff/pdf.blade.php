<!DOCTYPE html>
<html>
<head>
    <title>Staff Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .details {
            margin: 0 auto;
            width: 80%;
            border-collapse: collapse;
        }
        .details td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .details th {
            padding: 8px;
            border: 1px solid #ddd;
            background-color: #f2f2f2;
        }
        .details th, .details td {
            text-align: left;
        }
    </style>
</head>
  <body>
      <div class="container">
          <h1>Staff Details</h1>
          <table class="details">
              <tr>
                  <th>Worker No:</th>
                  <td>{{ $staff->worker_no }}</td>
              </tr>
              <tr>
                  <th>Worker Name:</th>
                  <td>{{ $staff->worker_name }}</td>
              </tr>
              <tr>
                  <th>Date of Entry:</th>
                  <td>{{ $staff->date_of_entry }}</td>
              </tr>
              <tr>
                  <th>Father/Guardian Name:</th>
                  <td>{{ $staff->father_guardian_name }}</td>
              </tr>
              <tr>
                  <th>Sex:</th>
                    @if ($staff->sex == 'M')
                        <td>Male</td>
                    @elseif($staff->sex == 'F')
                       <td>Female</td> 
                    @else
                       <td>Other</td> 
                    @endif
              </tr>
              <tr>
                  <th>Date of Birth:</th>
                  <td>{{ $staff->date_of_birth }}</td>
              </tr>
              <tr>
                  <th>Date of Joining:</th>
                  <td>{{ $staff->date_of_joining }}</td>
              </tr>
              <tr>
                  <th>Permanent Date:</th>
                  <td>{{ $staff->permanent_date }}</td>
              </tr>
              <tr>
                  <th>Retirement Date:</th>
                  <td>{{ $staff->retirement_date }}</td>
              </tr>
              <tr>
                  <th>Nationality:</th>
                    @if ($staff->nationality == 'indian')
                        <td>Indian</td>
                    @else
                        <td>OTHER</td> 
                    @endif
              </tr>
              <tr>
                  <th>Religion:</th>
                    @if ($staff->religion == 'hindu')
                       <td>Hindu</td>
                    @elseif($staff->religion == 'muslim')
                       <td>Muslim</td> 
                    @elseif($staff->religion == 'christian')
                       <td>Christian</td> 
                    @else
                       <td>Other</td> 
                    @endif
              </tr>
              <tr>
                  <th>Anniversary Date:</th>
                  <td>{{ $staff->anniv_date }}</td>
              </tr>
              <tr>
                  <th>ESI No:</th>
                  <td>{{ $staff->esi_no }}</td>
              </tr>
              <tr>
                  <th>PF No:</th>
                  <td>{{ $staff->pf_no }}</td>
              </tr>
              <tr>
                  <th>Present Address:</th>
                  <td>{{ $staff->present_address }}</td>
              </tr>
              <tr>
                  <th>Permanent Address:</th>
                  <td>{{ $staff->permanent_address }}</td>
              </tr>
              <tr>
                  <th>Photo Path:</th>
                  <td>{{ $staff->photo_path }}</td>
              </tr>
              <tr>
                  <th>Status:</th>
                  <td>{{ $staff->status ? 'Working' : 'Not Working' }}</td>
              </tr>
          </table>
      </div>
  </body>
</html>
