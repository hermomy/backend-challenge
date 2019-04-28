            <div class="pg-opt">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <h2>Step 1</h2>
                  </div>
                </div>
              </div>
            </div>
            <section class="slice bg-white">
              <div class="wp-section">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">

                      <div class="row">
                        <!-- Product list -->
                      <div class="col-md-6">	
                      		 <form name="login" method="post" action="{{URL::route('login_process_frontend')}}" >
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
              </div>
            </div>
          </div>
        </div>
      </section>