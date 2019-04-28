   

<div class="pg-opt">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Step 2</h2>

            </div>
             <div class="col-md-2">
                 <a href="{{URL::route('home')}}" class="btn btn-primary ">HOME</a>
            </div>
             <div class="col-md-2">
                 <a href="{{URL::route('home')}}" class="btn btn-primary ">Staff Login</a>
            </div>
        </div>
    </div>
</div>

<section class="slice bg-white">
    <div class="wp-section">
        <div class="container">
            <form name="checkout" method="post" action="{{URL::route('checkout_process')}}" id="" onSubmit="return validateForm()">
                {{ csrf_field() }}

                <input type="hidden" name="idproduct" value="{{$sql->id}}">
            
                <input type="hidden" name="quantity" value="{{$quantity}}">
                <input type="hidden" name="totalprice" value="{{$total_price}}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default panel-sidebar-1">

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                           <img alt="" src="/uploads/products/{{ $sql->picture_one }}">
                                    </div>
                                    <div class="col-md-6">
                                            
                                        <p>
                                            Name : <b>{{$sql->name_on_website}}</b>
                                        </p>
                                        <p>
                                            Price : <b> RM{{$sql->price}}</b>
                                        </p>
                                     
                                        <p>
                                            Quantity : <b>{{$quantity}}</b>
                                        </p>
                                        <hr>
                                        <p>
                                            <b>Total Price : RM{{$total_price}}</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                Ship To Area
                            </div>
                            <div class="col-md-2">
                                :
                            </div>
                            <div class="col-md-6">
                                <textarea id="address" name="address">
                                   {{ $addressuser->address }} 
                                </textarea>
                          </div>
                      </div>
                      <br>

                      <div class="row">
                      <div class="form-group">
                        <div class="col-md-4">
                               <label class="control-label col-sm-4">Promotion Code</label>
                        </div>
                        <div class="col-md-2">
                            :
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="promotion_code" placeholder="Promotion Code">
                            <span class="label label-block label-danger" id="promotion_code"></span>
                        </div>
                        </div>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary pull-right">Confirm Checkout</button>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
<script type="text/javascript">
    function validateForm(){
        var x = document.forms["checkout"]["promotion_code"].value;
        if(x === ""){
         return true;   
        }
        if(!(x === "20FORME")){

            alert("Promotion Code Is Invalid")
            return false;
        }
        return true;

    }
</script>

