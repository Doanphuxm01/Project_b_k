<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/adminview">
        <div class="sidebar-brand-icon rotate-n-15">
            {{--  <i class="fas fa-laugh-wink"></i> --}}
            <i class="fas fa-book-open"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Nguyễn Doãn Phú</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="adminview/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang chu</sspan></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Giao Diện
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>tùy chọn</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('booktype.create') }}">loại sách</a>
                <a class="collapse-item" href="{{ route('cruds.create') }}">Danh sách</a>
            </div>
        </div>
    </li>
</ul>
