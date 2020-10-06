@extends('Admin.index')
@section('page_content')
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Generate Token</h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
   </div>
   <!-- Content Row -->
   <div class="row">
      <!-- Pending Requests Card Example -->
      <div class="col-md-12 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
               <div class="no-gutter align-items-center">
                  <form action="{{route('admin.coupon.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                    <input type="text" class="form-control" name="use_number" placeholder="Number of use">
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="amount" placeholder="Enter amount">
                    </div>
                    <div class="form-group">
                    <button class="btn btn-primary">Generate Link</button>
                    </div>
                  </form>
               </div>
            </div>
         </div>
         <br>
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="no-gutter align-items-center">
                  @foreach($coupons as $coupon)
                   <div class="row">
                     <div class="col-md-8">
                     <div class="form-group"><input class="form-control" id="foo" value="http://www.ox.app/coupon={{$coupon->coupon}}"></div>
                     </div>
                     <div class="col-md-4">
                     <div class="form-group"><button class="btn btn-secondary" onclick="clip()">Copy</button></div>
                     </div>
                   </div>                      
                  @endforeach
               </div>
            </div>
         </div>
         <br>
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="no-gutter align-items-center">
               <table class="table table-responsive">
                  <thead class="thead-dark">
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Coupon</th>
                        <th scope="col">Coupon ID</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                     <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->user_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->coupon}}</td>
                        <td>{{$user->coupon_id}}</td>
                     </tr>
                  @endforeach
                  </tbody>
               </table>

               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Content Row -->
</div>

<script>
function clip() {
  var copyText = document.getElementById("foo");
  copyText.select();
  document.execCommand("copy");}
</script>

@endsection
