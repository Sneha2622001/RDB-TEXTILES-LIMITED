<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REPORT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('staffs.view')}}">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('staffs.index')}}">Entry</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('staffs.view')}}">Find</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
        <div class="text-center mb-3">
            <h1 class="header-text">RDB TEXTILES LIMITED</h1>
            <h3>Telinipara, Bhadreswar, Hooghly</h3>
        </div>
        <div class="text-center mb-4">
            <h5>Staff List as on {{\Carbon\Carbon::now()->format('d/m/Y')}}</h5>
        </div>
        <form action="">
          <div class="mb-3">
            <input type="search" class="form-control" name="search" id="search" placeholder="Search By EMPID..." value="{{isset($search) ? $search : ''}}">
            <button class="mt-2 btn btn-primary">Search</button>
            <a href="{{route('staffs.view')}}">
              <button class="mt-2 btn btn-primary" type="button">Reset</button>
            </a>
          </div>
        </form>

        <div class="row">
          <div class="col-10 mb-3">
            <a href="{{route('staffs.index')}}">
              <button class="btn btn-primary">Add</button>
            </a>
          </div>
          <div class="col-2 mb-3">
            <a href="{{route('export.staff')}}">
              <button class="btn btn-primary">Export All In CSV</button>
            </a>
          </div>
        </div>
        
        <div class="table table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>SL NO</th>
                        <th>EMPID</th>
                        <th>NAME</th>
                        <th>FATHER</th>
                        <th>DOJ</th>
                        <th>DOB</th>
                        <th>ADDRESS</th>
                        <th>AGE AS ON DATE</th>
                        <th>Action</th>
                        <th>Export</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($staffs as $key => $staff)
                    <tr>
                      <td>{{$key}}</td>
                      <td>{{$staff->worker_no}}</td>
                      <td>{{$staff->worker_name}}</td>
                      <td>{{$staff->father_guardian_name}}</td>
                      <td>{{$staff->date_of_joining}}</td>
                      <td>{{$staff->date_of_birth}}</td>
                      <td>{{$staff->present_address}}</td>
                      <td>{{\Carbon\Carbon::now()->year - \Carbon\Carbon::parse($staff->date_of_birth)->year}}</td>
                      <td>
                        <a href="{{route('staff.edit', ['id' => $staff->id])}}">
                          <button class="btn btn-primary">Edit</button>
                        </a>
                        <a href="{{route('staff.delete', ['id' => $staff->id])}}">
                          <button class="btn btn-danger">Delete</button>
                        </a>
                      </td>
                      <td>
                      <a href="{{ route('staff.downloadPdf', $staff->id) }}" class="btn btn-info">Download PDF</a>
                      <a href="{{ route('staff.downloadExcel', $staff->id) }}" class="btn btn-info">Download Excel</a>
                      </td>
                    </tr>
                  @endforeach()
                </tbody>
            </table>

        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>