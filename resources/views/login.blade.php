<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
      <br>

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
               @include('flash-message')
             </div>
             <br>
            </div>
            <div class="row">
              <div class="col-lg-3 d-none d-lg-block"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                   <form name="login" method="post" action="{{URL::route('login_process')}}" >
                     {{ csrf_field() }}
                    <div class="form-group">
                      <input type="name" class="form-control form-control-user" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                    </div>
                    <!-- <input type="submit" name="Login" class="btn btn-primary btn-user btn-block"> -->
                      <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                 
                  
                  </form>
                 
                </div>
              </div>
              <div class="col-lg-3 d-none d-lg-block"></div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>