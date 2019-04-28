
<body id="page-top">

  <div id="wrapper">

    <!-- Sidebar -->
             <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="sidebar-brand-text mx-3">HERMO TEST </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        @if($namesessions == "kumar")
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Items</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="{{URL::route('list_purchase_order')}}">Purchase Order</a>

            </div>
          </div>

           <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="{{URL::route('list_items')}}">Register Items</a>

            </div>
          </div>
        </li>
        @endif

          @if($namesessions == "angela")
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Inventory</span>
          </a>
          <div id="collapseTree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="{{URL::route('list_inventory')}}">Register Products</a>

            </div>
          </div>
        

          
        </li>

          <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Products</span>
          </a>
          <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="{{URL::route('list_products')}}">List Products</a>

            </div>
          </div>

          
        </li>
          @endif


          @if($namesessions == "junaidah")
           <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Report</span>
          </a>
          <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="">Total Unpaid && Paid Order</a>

            </div>

             <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="">Cost Incurred</a>

            </div>
             <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="">Average Daily Sales</a>

            </div>
             <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="">Inventory Movement</a>

            </div>
            
            
          </div>
        

          
        </li>
        @endif

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->

            <ul class="navbar-nav ml-auto">


              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $namesessions }}</span>
                  <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">



                  <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="{{URL::route('logout_backend')}}" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
                </div>
              </li>

            </ul>


          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">List Inventory</h1>

            </div>
            
          @include('flash-message')
            <div class="card shadow mb-4">


              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Categoty</th>
                        <th>Price</th>
                        <tH>SKUS</tH>
                        <th>Quantity</th>
                        <th>Status Product</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                       <tr>
                        <th>Name</th>
                        <th>Categoty</th>
                        <th>Price</th>
                        <tH>SKUS</tH>
                        <th>Quantity</th>
                        <th>Status Product</th>
                        <th>Action</th>
                      </tr>

                    </tfoot>
                    <tbody>
                     @foreach($listinventory as $val)
                     <tr>
                      <td>{{ $val->name }}</td>
                      <td>{{ $val->category }}</td>
                      <td>{{ $val->price }}</td>
                      <td>{{ $val->skus }}</td>
                      <td>{{ $val->inventory_received }}</td>
                      <td>{{ $val->status_product  }}</td>
                      <td> 
                        @if($val->status_product != "Register Product")
                        {

                      
                       <a href="#" class="btn btn-info btn-icon-split open-registerProductDialog" data-toggle="modal" data-inventoryid="{{ $val->id }}">
                        
                        <span class="text">Register Items</span>
                      </a>
                        }
                        @endif
                    </td>

                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>

             <form method="post" action="{{URL::route('add_products')}}" id="form" enctype="multipart/form-data">
              @csrf
              <!-- Modal -->
              <div class="modal" tabindex="-1" role="dialog" id="registerProductDialog">
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="modal-header">

                      <h5 class="modal-title">Register Product</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                       
                        <div class="form-group col-md-4">
                          <input type="hidden" name="inventory_id" id="inventory_id" value="">
        
                          
                        
                        </div>
                      </div>
                   
                      <div class="row">
                      

                        <div class="form-group col-md-3">

                          <label for="Name">Name</label>
                          <!-- <input type="text" class="form-control" name="name" id="name"> -->
                         <input type="text" value="" class="form-control" id="name_on_website" name="name_on_website">
                        </div>

                        <div class="form-group col-md-3">
                          <label for="Name">Price</label>
                          <!-- <input type="text" class="form-control" name="name" id="name"> -->
                           <input type="text" value="" class="form-control" id="price" name="price">
                        </div>

                          <div class="form-group col-md-3">
                          <label for="Club">Cost</label>
                          <input type="text" class="form-control" name="cost" id="cost" value="" >
                        </div>

                          <div class="form-group col-md-3">
                        <label for="Name">Status</label>
                         
                            <select class="form-control" name="status" id="status">
                             <option value="ON_SALE">ON SALE</option>
                             <option value="NOT_SALE">NOT SALE</option>
                 
                            </select>
                          </div>
                      </div>
                      <div class="row">
                         <div class="form-group col-md-6">
                          <label for="Club">Cost Description</label>
                          <textarea class="form-control" id="cost_description" name="cost_description"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="Club">Quantity</label>
                          <input type="text" value="" class="form-control" id="quantity" name="quantity" >
                        </div>
                       

                      </div>
                      <div class="row">
                      


                      <div class="form-group col-md-6">
                        <label for="Country">Picture</label>
                        <input type="file" name="picture_one" id="picture_one">
                      </div>

                       <div class="form-group col-md-6">
                        <label for="Country">Another Picture</label>
                        <input type="file" name="picture_two" id="picture_two">
                      </div>

                    </div>
            
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  class="btn btn-success" id="ajaxSubmit">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

            


        </div>


      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; Hermo Test Exam</span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

</div>  
