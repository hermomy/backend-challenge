<!-- BEGIN TOP BAR -->

@if ($alert = Session::get('message'))
   <!--  <div class="alert alert-danger">
        {{ $alert }}
    </div> -->
<script>
     swal({
      title: "",
      text: "{{$alert}}",
      type: "error",
      confirmButtonText: "OK"
  });
</script>
@endif
@if(count($errors))
  
   <script>
     swal({
      title: "",
      text: "@foreach($errors->all() as $error){{$error.'\n'}}@endforeach",
      type: "error",
      confirmButtonText: "OK"
  });
</script>
   

@endif

<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>+603 9078 2171</span></li>
                    <li><i class="fa fa-envelope-o"></i><span>admin@eforeignworkers.com.my</span></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    @if (config('locale.status') && count(config('locale.languages')) > 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ trans('menus.language-picker.language') }}
                            <span class="caret"></span>
                        </a>

                        @include('lang')
                    </li>
                    @endif
                    <li><a href="#" data-toggle="modal" data-target="#login"><i class="fa fa-sign-in"></i>{{ trans('navs.frontend.login') }}</a></li>
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>        
</div>
<!-- END TOP BAR -->
<!-- BEGIN HEADER -->
<div class="header">
  <div class="container">
    <a class="site-logo" href="{{URL::route('home')}}"><img src="{{ URL::asset('public/assets/frontend/layout/img/efwlogo.jpg') }}" alt="efw" style="width:200px"></a>

    <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

    <!-- BEGIN NAVIGATION -->
    <div class="header-navigation pull-right font-transform-inherit">
      <ul>
        <li class="">
          <a class="" href="{{URL::route('home')}}">
            {{ trans('navs.general.home') }} 
        </a>
    </li>
    <li class="">
  <a class="" href="{{URL::route('home_about_us')}}">
        {{ trans('navs.frontend.about_us') }}
    </a>
</li>
<li class="">
  <a class="" href="{{URL::route('home_our_roles')}}">
    {{ trans('navs.frontend.our_roles') }}
</a>
</li>
<li class="">
  <a class="" href="{{URL::route('home_gallery')}}">
    {{ trans('navs.frontend.our_gallery') }}
</a>
</li>
<li class="">
  <a class="" href="{{URL::route('contact_us')}}">
    {{ trans('navs.frontend.contact_us') }}
</a>
</li>
</ul>
</div>
<!-- END NAVIGATION -->
</div>
</div>
<!-- Header END -->


<div class="modal fade" id="login" tabindex="-1" role="document" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="margin-top: 98px">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>{{ trans('navs.frontend.login') }}</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-sm-10">
                      <form action="{{URL::route('login_process')}}" method="POST" class="form-horizontal form-without-legend">
                        {{ csrf_field() }}
                        <div class="form-group" id="kad_pengenalan">
                            <label for="email" class="col-lg-5 control-label">{{ trans('labels.frontend.auth.email') }} <span class="require">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="email">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="kata_laluan">
                            <label for="password" class="col-lg-5 control-label">{{ trans('labels.frontend.auth.password') }} <span class="require">*</span></label>
                            <div class="col-lg-7">
                                <input type="password" class="form-control" name="password">
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <div class="forget-password">
                            <div class="col-lg-8 col-md-offset-4 padding-left-0">
                                <a data-toggle="modal" href="{{URL::to('password/reset')}}"> {{ trans('labels.frontend.auth.forgot_password') }} </a>
                                <a href="{{URL::route('self_reg_index')}}" style="float:right;">{{ trans('navs.frontend.register') }}</a>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                                <button type="submit" class="btn btn-primary">{{ trans('labels.frontend.auth.enter') }}</button>
                                <button type="button" class="btn default" data-dismiss="modal">{{ trans('labels.frontend.auth.close') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>