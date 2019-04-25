   

<div class="pg-opt">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Step 3</h2>
            </div>
        </div>
    </div>
</div>

<section class="slice bg-white">
    <div class="wp-section">
        <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        ORDER NUMBER : {{$sql->order_number}}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default ">

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="../{{$sqlproduct->image}}">
                                    </div>

                                    <div class="col-md-6">
                                        <p>
                                            Brand : <b>{{$sqlbrand->name_brand}}</b>
                                        </p>
                                        <p>
                                            Name : <b>{{$sql->name}}</b>
                                        </p>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                Unit Price
                            </div>
                            <div class="col-md-2">
                                :
                            </div>
                            <div class="col-md-6">
                                RM{{$sql->unit_price}}
                          </div>
                      </div>
                      <br>

                      <div class="row">
                      
                        <div class="col-md-4">
                               Quantity
                        </div>
                        <div class="col-md-2">
                            :
                        </div>
                        <div class="col-md-6">
                          {{$sql->quantity}}
                        </div>
                        
                    </div>

                    <hr>

                    <div class="row">
                      
                        <div class="col-md-4">
                               Total Price
                        </div>
                        <div class="col-md-2">
                            :
                        </div>
                        <div class="col-md-6">
                          RM {{$sql->total_price}}
                        </div>
                        
                    </div>

                    <div class="row">
                      
                        <div class="col-md-4">
                               Promotion Code
                        </div>
                        <div class="col-md-2">
                            :
                        </div>
                        <div class="col-md-6">
                          {{$sql->promotion_code}}
                        </div>


                        
                    </div>

                     <div class="row">
                      
                        <div class="col-md-4">
                               Discount
                        </div>
                        <div class="col-md-2">
                            :
                        </div>
                        <div class="col-md-6">
                         RM {{$sql->discaunt}}
                        </div>

                        
                        
                    </div>

                    <div class="row">
                      
                        <div class="col-md-4">
                               Delivery To
                        </div>
                        <div class="col-md-2">
                            :
                        </div>
                        <div class="col-md-6">
                          {{$sql->delivery_to}}
                        </div>

                        
                        
                    </div>

                    <div class="row">
                      
                        <div class="col-md-4">
                               Shipping Fee
                        </div>
                        <div class="col-md-2">
                            :
                        </div>
                        <div class="col-md-6">
                          RM {{$sql->shiping_fee}}
                        </div>

                        
                        
                    </div>
                    <hr>
                    <div class="row">
                      
                        <div class="col-md-4">
                               Payment Required
                        </div>
                        <div class="col-md-2">
                            :
                        </div>
                        <div class="col-md-6">
                          RM{{$sql->grand_total}}
                        </div>

                        
                        
                    </div>

          
                </div>
            </div>
      
    </div>
</div>
</section>

