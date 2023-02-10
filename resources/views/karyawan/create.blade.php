@extends('layout/aplikasi')

@section('konten')
<form method="post" action="/karyawan" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <h1><u>Application Form</u></h1>
    </div>
    <div class="row mb-3">
      <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name='first_name' id="first_name" value="{{ Session::get('first_name') }}">
      </div>
    </div>
    <div class="row mb-3">
      <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name='last_name' id="last_name" value="{{ Session::get('last_name') }}">
      </div>
    </div>
    <div class="row mb-3">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name='address' id="address" value="{{ Session::get('address') }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="city_state_zip" class="col-sm-2 col-form-label">City/State/Zip</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name='city_state_zip' id="city_state_zip" value="{{ Session::get('city_state_zip') }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="home_phone" class="col-sm-2 col-form-label">Home Phone</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name='home_phone' id="home_phone" value="{{ Session::get('home_phone') }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="cell_phone" class="col-sm-2 col-form-label">Cell Phone</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name='cell_phone' id="cell_phone" value="{{ Session::get('cell_phone') }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name='email' id="email" value="{{ Session::get('email') }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="applied_position" class="col-sm-2 col-form-label">Applied Position</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name='applied_position' id="applied_position" value="{{ Session::get('applied_position') }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="expected_salary" class="col-sm-2 col-form-label">Expected Salary</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name='expected_salary' id="expected_salary" value="{{ Session::get('expected_salary') }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="photo" class="col-sm-2 col-form-label">Photo</label>
        <input type="file" class="form-control" name="photo" id="photo">
      </div>
      <div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">SUBMIT</button>
      </div>
</form>
@endsection
