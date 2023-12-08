@extends('layouts.auth')
@section('head')
<body class="bodycolordashboard">

<div class="container loginmargin">
  <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="card-body ">
              <div class="text-center text-white">
                <h2>Welcome To Dashboard</h2>
            </div>
        </div>
      </div>
      <div class="table-responsive">
          <div class="container margin ">
              <div class="row">
                  <div class="col-md-4 offset-md-4">
                      <div class="card form-holder colorcarddashboard">
                          <div class="card-body">
                              <div class="text-center text-white">
                              <h2>Task</h2>
                              </div>
                              <form action="{{ route('save-task') }}" method="post">
                                  @if(Session::has('success'))
                                  <div class="alert alert-success">{{Session::get('success')}}</div>
                                  @endif
                                  @if(Session::has('fail'))
                                  <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                  @endif
                                  @csrf
                                  <div class="form-group margin text-white">
                                      <label>Task</label>
                                      <input type="text" name="task" class="form-control" placeholder="task name" >
                                  </div>
                                  <div class="form-group margin text-white">
                                      <label>Description</label>
                                      <textarea type="text" name="description" class="form-control"rows="3"></textarea>
                                  </div>
                                  <div class="form-group margin text-white">
                                    <label>Status</label>
                                    <input type="text" name="status" class="form-control" >
                                </div>
                                <div class="form-group margin text-white">
                                  <label>Due_date</label>
                                  <input type="date" name="due_date" class="form-control" >
                              </div>
                                  <div class="col-4 text-right margin">
                                      <input type="submit" class="btn btn-dark" value="submit">
                                  </div>
                                  <br>
                          </form>    
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        
      </div>
  </div>
</div>
</body>
@endsection