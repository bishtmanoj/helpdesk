<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="" class="img-circle" alt="{{ Auth::user()->user_name }}">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->user_name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        @foreach(config('navigation.sidebar.left.group') as $sidebarGroup )
        @if(in_array(Auth::user()->user_role,$sidebarGroup['group']))
        <li class="header">{{ $sidebarGroup['title'] }}</li>
        @foreach($sidebarGroup['content'] as $sidebarMenu) 
        @if($sidebarMenu['hasSub'])
        <li class="treeview {{ (in_array(request()->route()->getName(), array_column($sidebarMenu['subMenu'],'route')) || in_array(request()->route()->getName(),$sidebarMenu['hidden']))?'active':'' }}">
          <a href="#">
            <i class="fa {{ $sidebarMenu['icon'] }}"></i> <span>{{ trans($sidebarMenu['title']) }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @foreach($sidebarMenu['subMenu'] as $submenu)
            <li class="{{ request()->route()->getName() == $submenu['route']?'active':'' }}"><a href="{{ route($submenu['route']) }}"><i class="fa {{ $submenu['icon'] }}"></i> {{ trans($submenu['title']) }}</a></li>
            @endforeach
          </ul>
          @else
          <li>
          <a href="../calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
          @endif
        </li>
        @endforeach
        @endif
        @endforeach 
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>