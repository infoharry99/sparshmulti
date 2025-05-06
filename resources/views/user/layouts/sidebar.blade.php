<style>
  span {
      color: #000 !important;
  }
</style>
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('user')}}">
      <div class="sidebar-brand-text mx-3" style="color:black;">User</div>
    </a>
    <li class="nav-item active">
      <a class="nav-link" href="{{route('user-profile')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>My Profile</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Orders</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('wishlist')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>My Wishlist</span>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('user.order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Payment Details</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Shipment Tracking</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Gift Order</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Transaction History</span>
        </a>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('user.order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span> Notifications</span>
        </a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Settings</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Sign Out</span>
        </a>
    </li>
   

    <!-- Reviews -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('user.productreview.index')}}">
            <i class="fas fa-comments"></i>
            <span>Reviews</span></a>
    </li> -->
    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
      Posts
    </div> -->
    <!-- Comments -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="{{route('user.post-comment.index')}}">
          <i class="fas fa-comments fa-chart-area"></i>
          <span>Comments</span>
      </a>
    </li> -->
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>