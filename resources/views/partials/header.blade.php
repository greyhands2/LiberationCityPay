<nav class="navbar navbar-light bg-light" style="border: 1px solid #dedbda;">
    <a class="navbar-brand" href="https://www.liberationcity.org/">
        <img src="{{asset('/images/liberation.png')}}" style="width:50%; " class="d-inline-block align-top" alt="">
    </a>

    <ul class="navbar-nav">

        <div class="form-inline my-2 my-lg-0">
            <li class="nav-item">

                <a href="{{url('/')}}" class="btn btn-outline-primary mr-sm-2" >Give <i
                        class="icon-home"></i></a>

            </li>

            @if(auth()->guest())

                <li class="nav-item">

                    <a href="{{url('/login')}}" class="btn btn-outline-dark mr-sm-2" >Login <i
                                                                                         class="icon-user"></i></a>

                </li>
            @elseif(auth()->user())

                @role('admin')
                <li class="nav-item">
                    <a href="{{url('/members')}}" class="btn btn-outline-info mr-sm-2" style=" text-decoration: none;
            color: #808080; border: 1px solid #c0c0c0; background-color: #fff;">Members <i color="#808080"
                                                                                           class="icon-user"></i></a>
                </li>

               @endrole

                <li class="nav-item">
                    <a href="{{url('/logs')}}" class="btn btn-outline-secondary mr-sm-2">Transaction Log <i class="icon-user"></i></a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/logout')}}" class="btn btn-outline-danger mr-sm-2">Logout <i class="icon-lock-filled"></i></a>
                </li>
            @endif
        </div>

    </ul>
</nav>
