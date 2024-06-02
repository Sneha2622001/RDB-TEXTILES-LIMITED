<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RDB TEXTILES LIMITED</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-label {
            font-weight: bold;
        }
        .input-group-text {
            width: 150px;
        }
        .form-check-label {
            margin-left: 1.5rem;
        }
        .image-preview img {
            max-width: 150px;
            max-height: 150px;
            margin-bottom: 10px;
        }
        .section-title {
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        .custom-button {
            display: block;
            width: 100px;
            height: 50px;
            font-size: 1.2rem;
            margin-top: 2rem;
        }
        .text-red {
            color: red;
        }
    </style>
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
        <h1 class="mb-4">Staff Information</h1>
        <form action="{{$url}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="worker_no" class="form-label">Worker No</label>
                    <input type="text" class="form-control" id="worker_no" name="worker_no" value="{{isset($staff) ? $staff->worker_no : ''}}" required>
                </div>
                <div class="col-md-4">
                    <label for="worker_name" class="form-label">Worker Name</label>
                    <input type="text" class="form-control" id="worker_name" name="worker_name" value="{{isset($staff) ? $staff->worker_name : ''}}"  required>
                </div>
                <div class="col-md-4">
                    <label for="date_of_entry" class="form-label">Entry Date</label>
                    <input type="date" class="form-control" id="date_of_entry" name="date_of_entry" value="{{isset($staff) ? $staff->date_of_entry : ''}}" required>
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="working">WORKING</option>
                        <option value="not_working">NOT WORKING</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="section-title">Basic Information</div>
                    <div class="mb-3">
                        <label for="father_guardian_name" class="form-label">Father/Guardian Name</label>
                        <input type="text" class="form-control" id="father_guardian_name" name="father_guardian_name" value="{{isset($staff) ? $staff->father_guardian_name : ''}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="sex" class="form-label">Sex</label>
                        <select class="form-select" id="sex" name="sex" required>
                            <option value="m" {{isset($staff) && $staff->sex == 'M' ? 'selected': ''}}>Male</option>
                            <option value="f" {{isset($staff) && $staff->sex == 'F' ? 'selected': ''}}>Female</option>
                            <option value="o" {{isset($staff) && $staff->sex == 'O' ? 'selected': ''}}>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{isset($staff) ? $staff->date_of_birth : ''}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_of_joining" class="form-label">Date of Joining</label>
                        <input type="date" class="form-control" id="date_of_joining" name="date_of_joining" value="{{isset($staff) ? $staff->date_of_joining : ''}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="permanent_date" class="form-label">Permanent Date</label>
                        <input type="date" class="form-control" id="permanent_date" name="permanent_date" value="{{isset($staff) ? $staff->permanent_date : ''}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="retirement_date" class="form-label">Retirement Date</label>
                        <input type="date" class="form-control" id="retirement_date" name="retirement_date" value="{{isset($staff) ? $staff->retirement_date : ''}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nationality" class="form-label">Nationality</label>
                        <select class="form-select" id="nationality" name="nationality" required>
                            <option value="indian" {{isset($staff) && $staff->nationality == 'indian' ? 'selected': ''}}>INDIAN</option>
                            <option value="other" {{isset($staff) && $staff->nationality == 'other' ? 'selected': ''}}>OTHER</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="religion" class="form-label">Religion</label>
                        <select class="form-select" id="religion" name="religion" required>
                            @foreach($religions as $religion)
                                <option value="{{ $religion->religion }}" {{ isset($staff) && $staff->religion == $religion->religion ? 'selected' : '' }}>
                                    {{ strtoupper($religion->religion) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="anniv_date" class="form-label">Anniversary Date</label>
                        <input type="date" class="form-control" id="anniv_date" name="anniv_date" value="{{isset($staff) ? $staff->anniv_date : ''}}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="esi_no" class="form-label">E.S.I No</label>
                        <input type="text" class="form-control" id="esi_no" name="esi_no" value="{{isset($staff) ? $staff->esi_no : ''}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="pf_no" class="form-label">P.F No</label>
                        <input type="text" class="form-control" id="pf_no" name="pf_no" value="{{isset($staff) ? $staff->pf_no : ''}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="present_address" class="form-label text-red">Present Address</label>
                        <textarea class="form-control" id="present_address" name="present_address" rows="3" required>{{isset($staff) ? $staff->present_address : ''}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="permanent_address" class="form-label text-red">Permanent Address</label>
                        <textarea class="form-control" id="permanent_address" name="permanent_address" rows="3" required>{{isset($staff) ? $staff->permanent_address : ''}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photo_path" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo_path" name="photo_path">
                        <div class="image-preview mt-3">
                            <img id="photo_preview" src="{{isset($staff) ? asset('storage/' . $staff->photo_path) : ''}}" alt="Photo Preview" style="{{isset($staff->photo_path) ? 'display:block' : 'display:none'}}">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary custom-button">SAVE</button>
        </form>
    </div>
    <script>
        document.getElementById('photo_path').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const img = document.getElementById('photo_preview');
                img.src = reader.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
