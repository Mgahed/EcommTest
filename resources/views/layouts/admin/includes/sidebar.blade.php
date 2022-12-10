<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{route('admin.index')}}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="../images/logo-dark.png" alt="">
                        <h3><b>{{env('APP_NAME')}}</b></h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{\Request::route()->getName() == 'admin.brands.index' ? 'active' : ''}}">
                <a href="{{route('admin.brands.index')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Brands</span>
                </a>
            </li>

            <li class="{{\Request::route()->getName() == 'admin.products.index' ? 'active' : ''}}">
                <a href="{{route('admin.products.index')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="{{\Request::route()->getName() == 'admin.orders.index' ? 'active' : ''}}">
                <a href="{{route('admin.orders.index')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Orders</span>
                </a>
            </li>

            {{--<li class="treeview">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Application</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="chat.html"><i class="ti-more"></i>Chat</a></li>
                    <li><a href="calendar.html"><i class="ti-more"></i>Calendar</a></li>
                </ul>
            </li>--}}

        </ul>
    </section>
</aside>
