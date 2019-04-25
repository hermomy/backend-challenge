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
                        <form method="post" action="{{URL::route('checkout')}}" method="post">
                         {{ csrf_field() }}
                         @foreach($sql as $k)
                         <div class="col-md-3">
                          <div class="wp-block product">
                            <figure>
                             <img alt="" src="/uploads/products/{{ $k->picture_one }}" class="img-responsive img-center">
                           </figure>
                           <h2 class="product-title"><center><a href="">{{$k->name_on_website}}</a></center></h2>
                    
                           <p>
                            <center>RM{{$k->price}}</center>
                          </p>
               
                          <input type="hidden" name="id_product" value="{{$k->id}}">
                          <input type="hidden" name="price" value="{{$k->price}}">
                          
                          <div class="wp-block-footer">
                            <span class="price pull-left">
                             <select class="form-control " name="quantity">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                            </select>
                          </span>

                          <button type="submit" class="btn btn-md pull-right">Buy Now</button>


                        </div>
                      </div>
                    </div>
                    @endforeach
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>