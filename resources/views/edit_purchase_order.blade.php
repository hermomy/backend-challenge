
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
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Inventory</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="{{URL::route('list_purchase_order')}}">Purchase Order</a>

            </div>
          </div>
        </li>

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
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
              <h1 class="h3 mb-0 text-gray-800">Edit Purchase Order</h1>
 
            </div>

              

           <form method="post" action="{{URL::route('update_purchase_order')}}" id="form">
                 @csrf
              <div class="form-group">
               <div class="row">
                <div class="form-group col-md-4">
                  <label for="Club">PO No</label>
                  <input type="text" class="form-control" name="po_number" id="po_number" readonly="readonly" value="{{ $PODetails->po_number }}" >
                </div>

                <div class="form-group col-md-4">

                  <label for="Name">Requestor</label>
                  <input type="text" class="form-control" name="requestor" id="requestor" readonly="readonly" value = "{{ $PODetails->requestorname }}"> 

                </div>
                  <input type="hidden" name="poidupdatepo" value="{{ $PODetails->id }}">

                <div class="form-group col-md-4">
                  <label for="Name">Vendor</label>
                  <input type="text" class="form-control" name="vendor" id="vendor" readonly="readonly" value = "{{ $PODetails->vendorname }}"> 

                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="Club">PO Date</label>
                  <input type="text" class="form-control" id="po_date" name="po_date" readonly="readonly" value="{{ date('d-m-Y', strtotime($PODetails->po_Date)) }}">
                </div>

                <div class="form-group col-md-3">
                  <label for="Club">Order Date</label>
                  <input type="text" class="form-control" id="order_date" name="order_date" value ="{{ date('d-m-Y', strtotime($PODetails->order_Date)) }}" readonly="readonly">
                </div>
                <?php
                  $receivedate = date('Y-m-d', strtotime($PODetails->receive_Date));
              
                ?>

                


               <div class="form-group col-md-3">
                <label for="Country">Cost(RM)</label>
                <input type="text" class="form-control" name="cost" id="cost" value="{{ $PODetails->cost}}" readonly="readonly">
              </div>


              <div class="form-group col-md-3">
                <label for="Country">Credict Terms</label>
                <input type="text" class="form-control" name="cost" id="cost" value=" {{ $PODetails->credict_terms === 1 ? 'Cash' : 'Online' }}" readonly="readonly">

              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="Goal Score">PO Description</label>
                <textarea rows="6" cols="50" class="form-control" name="po_description" readonly="readonly">{{ $PODetails->po_description }}</textarea>
              </div>

              <div class="form-group col-md-6">
                <label for="Goal Score">Comments</label>
                <textarea rows="6" cols="50" class="form-control" name="comments" readonly="readonly">{{ $PODetails->comments }}</textarea>
              </div>

            </div>

              <div class="row">
              <div class="form-group col-md-3">
                <label for="Goal Score">Status Fufilment</label>
                 <select class="form-control" name="status_fufilment" id="status_fufilment">
                    <option value="paid">PAID</option>   
                    <option value="unpaid" {{ $PODetails->status_fufilment == 'unpaid' ? 'selected="selected"' : '' }}>UNPAID</option>     
                  </select>
              </div>

            <div class="form-group col-md-4">
                  <label for="Club">Receive Date</label>
                  <input type="date" class="form-control" id="receive_date" name="receive_date" value ="<?php echo $receivedate;?>" >
                </div>

            
            </div>

            <button type="submit" class="btn btn-success">Submit</button>

             <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#myModal" id="open">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Line Items</span>
            </a>
          </div>
        </form>

     

           @include('flash-message')
            <form method="post" action="{{URL::route('add_lineItems')}}" id="form">
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
                       
                        <div class="form-group col-md-6">
                            <input type="hidden" name="poid" value="{{ $PODetails->id }}">
                          <label for="Name">Items</label>
                          <!-- <input type="text" class="form-control" name="name" id="name"> -->
                          <select class="form-control" name="items_id" id="items_id">
                            @foreach($stockitems as $val)
                             <option value="{{$val->id}}">{{$val->name}}</option>
                            @endforeach
                          </select>
                        </div>

                          <div class="form-group col-md-2">
                          <label for="Club">Quantity</label>
                          <input type="text" value="" class="form-control" id="quantity" name="quantity" >
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

            
            <form method="post" action="{{URL::route('update_quantity_items')}}" id="form">
              @csrf
              <!-- Modal -->
              <div class="modal" tabindex="-1" role="dialog" id="myModalEdit">
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="modal-header">
                   
                      <h5 class="modal-title">Add Quantity Receive</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                       <input type="hidden" name="iditem" id="iditem" value="">
                       <input type="hidden" name="idpo" id="idpo" value="">
                       
                      <div class="row">
                   
                        <div class="form-group col-md-4">
                             <label for="Club">Item</label>
                              <input type="text" value="" class="form-control" id="itemname" name="itemname" readonly="readonly">
                          <!-- <input type="text" class="form-control" name="name" id="name"> -->
                   
                        </div>

                          <div class="form-group col-md-4">
                          <label for="Club">Quantity Receive</label>
                          <input type="text" value="" class="form-control" id="quantity_received" name="quantity_received" >
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
                    <th>NAME</th>
                
                    <tH>SKUS</tH>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>QUANTITY RECEIVED</th>
                 
                    <th>ACTION</th>
                   
            
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>NAME</th>
                
                    <tH>SKUS</tH>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>QUANTITY RECEIVED</th>
                  
                    <th>ACTION</th>
                   
                 </tr>
                </tfoot>
                <tbody>
                   @foreach($listItemsLine as $val)
                  <tr>
                      
                    <td>{{ $val->id}}{{ $val->name }}</td>
                 
                    <td>{{ $val->skus }}</td>
                    <td>{{ $val->price }}</td>
                    <td>{{ $val->quantity }}</td>
                    <td>{{ $val->quantity_received }}</td>
                    <td>
                      
                         <a href="#" class="btn btn-success btn-circle btn-sm open-AddBookDialog" data-toggle="modal"  data-id="{{ $val->id }}" data-itemname="{{ $val->name }}" data-idpo="{{ $PODetails->id }}" >
                      <i class="fas fa-edit"></i>
                    </a>
                    </td>

              
                </tr>
                    @endforeach

              </tbody>
            </table>
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

