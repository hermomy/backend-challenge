
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

              <a class="collapse-item" href="{{URL::route('report_total_unpaid_paid_orders')}}">Total Unpaid && Paid Order</a>

            </div>

             <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="{{URL::route('report_cost_incurred')}}">Cost Incurred</a>

            </div>
             <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="{{URL::route('report_daily_sales')}}">Average Daily Sales</a>

            </div>
             <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="{{URL::route('report_inventory_movement')}}">Inventory Movement</a>

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
              <h1 class="h3 mb-0 text-gray-800">List Purchase Order</h1>

            </div>

            <div class="card shadow mb-4">
              <div class="card-header py-3">

               <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#myModal" id="open">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Purchase Order</span>
              </a>
            </div>
            @include('flash-message')
            <form method="post" action="{{URL::route('add_purchase_order')}}" id="form">
              @csrf
              <!-- Modal -->
              <div class="modal" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="modal-header">

                      <h5 class="modal-title">Add Purchase Order</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label for="Club">PO No</label>
                          <input type="text" class="form-control" name="po_number" id="po_number" readonly="readonly" value="{{ $ponumber }}" >
                        </div>

                        <div class="form-group col-md-4">

                          <label for="Name">Requestor</label>
                          <!-- <input type="text" class="form-control" name="name" id="name"> -->
                          <select class="form-control" name="requestor" id="requestor">
                            @foreach($requestor as $val)
                             <option value="{{$val->id}}">{{$val->name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-md-4">
                          <label for="Name">Vendor</label>
                          <!-- <input type="text" class="form-control" name="name" id="name"> -->
                          <select class="form-control" name="vendor" id="vendor">
                            @foreach($vendor as $val)
                             <option value="{{$val->id}}">{{$val->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label for="Club">PO Date</label>
                          <input type="date" value="{{ $datetoday }}" class="form-control" id="po_date" name="po_date" readonly="readonly">
                        </div>

                        <div class="form-group col-md-6">
                          <label for="Club">Order Date</label>
                          <input type="date" value="" class="form-control" id="order_date" name="order_date">
                        </div>

                    
                      </div>
                      <div class="row">
                       <div class="form-group col-md-6">
                        <label for="Country">Cost(RM)</label>
                        <input type="text" class="form-control" name="cost" id="cost">
                      </div>


                      <div class="form-group col-md-6">
                        <label for="Country">Credict Terms</label>
                        <select class="form-control" name="terms" id="terms">
                            @foreach($terms as $val)
                             <option value="{{$val->id}}">{{$val->name}}</option>
                            @endforeach
                        </select>
                      </div>

                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="Goal Score">PO Description</label>
                        <textarea rows="6" cols="50" class="form-control" name="po_description"></textarea>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="Goal Score">Comments</label>
                        <textarea rows="6" cols="50" class="form-control" name="comments"></textarea>
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
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>PO No</th>
                    <th>PO Date</th>
                    <tH>Order Date</tH>
                    <th>Requestor</th>
                    <th>Vendor</th>
                    <th>Cost(RM)</th>
                    <th>Status</th>
                    <th>Status Fulfilment</th>
                   
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th>PO No</th>
                    <th>PO Date</th>
                    <tH>Order Date</tH>
                    <th>Requestor</th>
                    <th>Vendor</th>
                    <th>Cost(RM)</th>
                    <th>Status</th>
                    <th>Status Fulfilment</th>
         
                    <th>Action</th>
                 </tr>
                </tfoot>
                <tbody>
                   @foreach($listpurchaseorders as $val)
                  <tr>
                    
                    <td>{{ $val->po_number }}</td>
                    <td>{{ $val->po_Date }}</td>
                    <td>{{ $val->order_Date }}</td>
                    <td>{{ $val->requestorname }}</td>
                    <td>{{ $val->vendorname }}</td>
                    <td>{{ $val->cost }}</td>
                    <td>{{ $val->status }}</td>
                    <td>{{ $val->status_fufilment }}</td>
                  
                    <td> 
                     <a href="{{URL::route('edit_purchase_order',$val->po_number)}}" class="btn btn-success btn-circle btn-sm" id="contoh">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-circle btn-sm">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                
                </tr>
                    @endforeach

              </tbody>
            </table>
          </div>
        </div>
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
