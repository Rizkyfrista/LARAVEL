@extends('layout/aplikasi')

@section('konten')
    <a href="/karyawan/create" class="btn btn-primary">+ Input Data</a>
    <div class="row mb-3" >
        <h1><u> Show Data </u></h1>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Photo</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>City / State / Zip</th>
                <th>Home Phone</th>
                <th>Cell Phone</th>
                <th>Email</th>
                <th>Applied Position</th>
                <th>Expected Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        @if ($item->photo)
                        <img style="max-width:50px;max-height:50px" src="{{ url('photo').'/'.$item->photo }}"/>
                        @endif
                    </td>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->city_state_zip }}</td>
                    <td>{{ $item->home_phone }}</td>
                    <td>{{ $item->cell_phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->applied_position }}</td>
                    <td>{{ $item->expected_salary }}</td>
                    <td>
                        <a class='btn btn-warning btn-sm' href='{{ url('/karyawan/' .$item->first_name.'/edit') }}'>Edit</a>
                        <form onsubmit="return confirm('Delete this data?')" class='d-inline' action="{{ '/karyawan/'.$item->first_name }}" method='post'>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
@endsection
