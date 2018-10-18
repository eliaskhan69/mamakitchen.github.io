<div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                       <div class="card-icon">
                           <i class="material-icons">content_copy</i>
                       </div>
                          <p class="card-category">Category/Item</p>
                          <h3 class="card-title">{{$categoryCount}}/{{$itemCount}}
                            <small></small>
                          </h3>
                  </div>
                  <div class="card-footer">
                          <div class="stats">
                            <i class="material-icons text-info">info</i>
                            Total <a href="{{route('category.index')}}">Categories </a> &
                            <a href="{{route('item.index')}}">Items.</a>
                          </div>
                  </div>
              </div>
          </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">slideshow</i>
              </div>
              <p class="card-category">Slider Item</p>
              <h3 class="card-title">{{$sliderCount}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i>
                <a href="{{route('slider.index')}}">Get More...</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">recent_actors</i>
              </div>
              <p class="card-category">Reservation</p>
              <h3 class="card-title">{{$reservations->count()}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> Not Confirmed Reservation
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <!--<i class="fa fa-twitter"></i>-->
                <i class="material-icons">contact_mail</i>
              </div>
              <p class="card-category">Contact</p>
              <h3 class="card-title">{{$contactCount}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i>
                <a href="{{route('slider.index')}}">Just Updated</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          @if(session('successMsg'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                      onclick="this.parentElement.style.display='none'">
                <i class="material-icons">close</i>
              </button>
              <span><b> Success - </b> {{ session('successMsg') }}</span>
            </div>
          @endif
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">All Reservations</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
                  {{--for Bootstrap-4
                             <table id="table"class="table table-striped table-bordered" style="width:100%">--}}
                    <thead class="text-primary">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Time&Date</th>
                      <th>Message</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </thead>
                  <tbody>
                  @foreach($reservations as $key=>$reservation)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $reservation->name }}</td>
                      <td>{{ $reservation->phone }}</td>
                      <td>{{ $reservation->email }}</td>
                      <td>{{ $reservation->date_and_time }}</td>
                      <td>{{ $reservation->massage }}</td>
                      <td>
                        @if($reservation->status==true)
                          <a href="" class="btn btn-info btn-sm">
                            <span>Confirmed</span>
                          </a>
                        @else
                          <a href="" class="btn btn-danger btn-sm">
                            <span>Not Confirmed Yet</span>
                          </a>
                        @endif
                      </td>
                      <td>{{ $reservation->created_at }}</td>
                      <td>
                        @if($reservation->status==false)
                          <form method="POST" id="status-form-{{$reservation->id}}" action="{{route('reservation.status',$reservation->id)}}" style="display: none">
                            @csrf
                          </form>
                          <button type="button" class="btn btn-info btn-sm" onclick="if (confirm('Are you Verify this by phone? ')){
                                  event.preventDefault();
                                  document.getElementById('status-form-{{$reservation->id}}').submit();
                                  }else{
                                  event.preventDefault();
                                  }"><i class="material-icons">done</i></button>
                        @endif
                        <form method="POST" id="delete-form-{{$reservation->id}}" action="{{route('reservation.destroy',$reservation->id)}}" style="display: none">
                          @csrf
                          @method('DELETE')
                        </form>
                          <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Are you Sure? you want delete this? ')){
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{$reservation->id}}').submit();
                                  }else{
                                  event.preventDefault();
                                  }"><i class="material-icons">delete</i></button>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>