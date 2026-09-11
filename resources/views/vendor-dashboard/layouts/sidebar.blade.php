      <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
          <div class="container-fluid">
              <!-- BEGIN NAVBAR TOGGLER -->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                  aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <!-- END NAVBAR TOGGLER -->
              <!-- BEGIN NAVBAR LOGO -->
              <div class="navbar-brand navbar-brand-autodark">
                  <a href="{{ route('vendor.dashboard') }}" aria-label="ShopX"><img
                          style="width: 100px; background: #fafafa; padding: 10px; border-radius: 5px;"
                          src="{{ asset(config('settings.site_logo')) }}" alt=""></a>
              </div>
              <!-- END NAVBAR LOGO -->
              <div class="navbar-nav flex-row d-lg-none">
                  <div class="d-none d-lg-flex">
                      <div class="nav-item">
                          <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Bật chế độ tối"
                              data-bs-toggle="tooltip" data-bs-placement="bottom">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round" class="icon icon-1">
                                  <path
                                      d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                              </svg>
                          </a>
                          <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Bật chế độ sáng"
                              data-bs-toggle="tooltip" data-bs-placement="bottom">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round" class="icon icon-1">
                                  <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                  <path
                                      d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                              </svg>
                          </a>
                      </div>
                  </div>
                  <div class="nav-item dropdown">
                      <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                          aria-label="Open user menu">
                          <span class="avatar avatar-sm" style="background-image: url({{ asset(user()->avatar) }})">
                          </span>
                          <div class="d-none d-xl-block ps-2">
                              <div>{{ user()->name }}</div>
                              <div class="mt-1 small text-secondary">Người bán</div>
                          </div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                          <a href="{{ route('vendor.store-profile.index') }}" class="dropdown-item">Hồ sơ gian hàng</a>
                          <div class="dropdown-divider"></div>
                          <a href="{{ route('vendor.profile.index') }}" class="dropdown-item">Cài đặt tài khoản</a>
                          <a onclick="event.preventDefault(); $('.logout-form').submit();" href="#" class="dropdown-item">Đăng xuất</a>
                      </div>
                  </div>
              </div>
              <div class="collapse navbar-collapse" id="sidebar-menu">
                  <!-- BEGIN NAVBAR MENU -->
                  <ul class="navbar-nav pt-lg-3">
                      <li class="nav-item">
                          <a class="nav-link {{ setActive(['vendor.dashboard', 'vendor.digital-products.edit']) }}"
                              href="{{ route('vendor.dashboard') }}">
                              <span class="nav-link-icon d-md-none d-lg-inline-block">
                                  <i class="ti ti-home"></i>
                              </span>
                              <span class="nav-link-title"> Bảng điều khiển </span>
                          </a>
                      </li>
                      <li
                          class="nav-item dropdown {{ setActive(['vendor.products.*', 'vendor.digital-products.edit'], 'active') }}">
                          <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                              data-bs-auto-close="false" role="button" aria-expanded="false">
                              <span class="nav-link-icon d-md-none d-lg-inline-block">
                                  <i class="ti ti-shopping-cart"></i></span>
                              <span class="nav-link-title"> Thương mại </span>
                          </a>
                          <div
                              class="dropdown-menu {{ setActive(['vendor.products.*', 'vendor.digital-products.edit'], 'show') }}">
                              <div class="dropdown-menu-columns">
                                  <div class="dropdown-menu-column">
                                      <div class="dropend">
                                          <a class="dropdown-item {{ setActive(['vendor.products.*', 'vendor.digital-products.edit'], 'active') }}"
                                              href="{{ route('vendor.products.index') }}">Sản phẩm</a>
                                      </div>

                                  </div>

                              </div>
                          </div>
                      </li>
                      <li class="nav-item dropdown {{ setActive(['vendor.orders.*'], 'active') }}">
                          <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                              data-bs-auto-close="false" role="button" aria-expanded="false">
                              <span class="nav-link-icon d-md-none d-lg-inline-block">
                                  <i class="ti ti-shopping-bag"></i>
                              </span>
                              <span class="nav-link-title"> Đơn hàng </span>
                          </a>
                          <div class="dropdown-menu {{ setActive(['vendor.orders.*'], 'show') }}">
                              <div class="dropdown-menu-columns">
                                  <div class="dropdown-menu-column">
                                      <a class="dropdown-item" href="{{ route('vendor.orders.index') }}">
                                          Tất cả đơn hàng
                                      </a>
                                  </div>

                                  <div class="dropdown-menu-column">
                                      <a class="dropdown-item"
                                          href="{{ route('vendor.orders.index', ['status' => 'pending']) }}">
                                          Đơn chờ xử lý
                                      </a>
                                  </div>

                                  <div class="dropdown-menu-column">
                                      <a class="dropdown-item"
                                          href="{{ route('vendor.orders.index', ['status' => 'processed']) }}">
                                          Đơn đã xử lý
                                      </a>
                                  </div>

                                  <div class="dropdown-menu-column">
                                      <a class="dropdown-item"
                                          href="{{ route('vendor.orders.index', ['status' => 'packed']) }}">
                                          Đơn đã đóng gói
                                      </a>
                                  </div>

                                  <div class="dropdown-menu-column">
                                      <a class="dropdown-item"
                                          href="{{ route('vendor.orders.index', ['status' => 'shipped']) }}">
                                          Đơn đang giao
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </li>
                      <li
                          class="nav-item dropdown {{ setActive(['vendor.withdraw-methods.*', 'vendor.withdraw-requests.*'], 'active') }}">
                          <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                              data-bs-auto-close="false" role="button" aria-expanded="false">
                              <span class="nav-link-icon d-md-none d-lg-inline-block">
                                  <i class="ti ti-basket-dollar"></i>
                              </span>
                              <span class="nav-link-title"> Rút tiền </span>
                          </a>
                          <div
                              class="dropdown-menu {{ setActive(['vendor.withdraw-methods.*', 'vendor.withdraw-requests.*'], 'show') }}">
                              <div class="dropdown-menu-columns">
                                  <div class="dropdown-menu-column">
                                      <a class="dropdown-item {{ setActive(['vendor.withdraw-methods.*'], 'active') }}"
                                          href="{{ route('vendor.withdraw-methods.index') }}">
                                          Phương thức rút tiền
                                      </a>
                                  </div>
                                  <div class="dropdown-menu-column">
                                      <a class="dropdown-item {{ setActive(['vendor.withdraw-requests.*'], 'active') }}"
                                          href="{{ route('vendor.withdraw-requests.index') }}">
                                          Yêu cầu rút tiền
                                      </a>
                                  </div>


                              </div>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ setActive(['vendor.store-profile.index'], 'active') }}"
                              href="{{ route('vendor.store-profile.index') }}">
                              <span
                                  class="nav-link-icon d-md-none d-lg-inline-block">
                                  <i class="ti ti-user-scan"></i>
                              </span>
                              <span class="nav-link-title"> Hồ sơ gian hàng </span>
                          </a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link {{ setActive(['vendor.profile.index'], 'active') }}"
                              href="{{ route('vendor.profile.index') }}">
                              <span
                                  class="nav-link-icon d-md-none d-lg-inline-block">
                                  <i class="ti ti-user-circle"></i></span>
                              <span class="nav-link-title"> Cài đặt tài khoản </span>
                          </a>
                      </li>

                  </ul>
                  <!-- END NAVBAR MENU -->
              </div>
          </div>
      </aside>


      <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
          <div class="container-xl">
              <!-- BEGIN NAVBAR TOGGLER -->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                  aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <!-- END NAVBAR TOGGLER -->
              <div class="navbar-nav flex-row order-md-last">
                  <div class="d-none d-md-flex">
                      <div class="nav-item">
                          <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip"
                              data-bs-placement="bottom" aria-label="Bật chế độ tối"
                              data-bs-original-title="Bật chế độ tối">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                  <path
                                      d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">
                                  </path>
                              </svg>
                          </a>
                          <a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip"
                              data-bs-placement="bottom" aria-label="Bật chế độ sáng"
                              data-bs-original-title="Bật chế độ sáng">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                  <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                  <path
                                      d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7">
                                  </path>
                              </svg>
                          </a>
                      </div>
                  </div>
                  <div class="nav-item dropdown">
                      <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                          aria-label="Open user menu">
                          <span class="avatar avatar-sm" style="background-image: url({{ asset(user()->avatar) }})">
                          </span>
                          <div class="d-none d-xl-block ps-2">
                              <div>{{ user()->name }}</div>
                              <div class="mt-1 small text-secondary">Người bán</div>
                          </div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                          <a href="{{ route('vendor.store-profile.index') }}" class="dropdown-item">Hồ sơ gian hàng</a>
                          <div class="dropdown-divider"></div>
                          <a href="{{ route('vendor.profile.index') }}" class="dropdown-item">Cài đặt tài khoản</a>
                          <a onclick="event.preventDefault();
                                $('.logout-form').submit();"
                              href="" class="dropdown-item">Đăng xuất</a>
                          <form method="POST" action="{{ route('logout') }}" class="logout-form">
                              @csrf
                          </form>
                      </div>
                  </div>
              </div>
              <div class="collapse navbar-collapse" id="navbar-menu">
              </div>
          </div>
      </header>
