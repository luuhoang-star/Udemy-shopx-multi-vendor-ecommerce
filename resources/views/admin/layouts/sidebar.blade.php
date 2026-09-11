      <aside class="navbar navbar-vertical navbar-expand-lg d-print-none" data-bs-theme="dark">
          <div class="container-fluid">
              <!-- BEGIN NAVBAR TOGGLER -->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                  aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <!-- END NAVBAR TOGGLER -->
              <!-- BEGIN NAVBAR LOGO -->
              <div class="navbar-brand navbar-brand-autodark">
                  <a href="{{ route('admin.dashboard') }}" aria-label="ShopX"><img style="width: 100px; background: #fafafa; padding: 10px; border-radius: 5px;" src="{{ asset(config('settings.site_logo')) }}" alt=""></a>
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
                          aria-label="Menu người dùng">
                          <span class="avatar avatar-sm" style="background-image: url({{ asset(auth('admin')->user()?->avatar) }})">
                          </span>
                          <div class="d-none d-xl-block ps-2">
                              <div>{{ auth('admin')->user()?->name }}</div>
                              <div class="mt-1 small text-secondary">{{ auth('admin')->user()?->getRoleNames()?->first() }}</div>
                          </div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                          <a href="{{ route('admin.profile.index') }}" class="dropdown-item">Hồ sơ cá nhân</a>
                          <div class="dropdown-divider"></div>
                          <a href="{{ route('admin.settings.index') }}" class="dropdown-item">Cài đặt hệ thống</a>
                          <a onclick="event.preventDefault(); $('.logout-form').submit();" href="" class="dropdown-item">Đăng xuất</a>
                      </div>
                  </div>
              </div>
              <div class="collapse navbar-collapse" id="sidebar-menu">
                  <!-- BEGIN NAVBAR MENU -->
                  <ul class="navbar-nav pt-lg-3">
                      <li class="nav-item {{ setActive(['admin.dashboard']) }}">
                          <a class="nav-link {{ setActive(['admin.dashboard']) }}"
                              href="{{ route('admin.dashboard') }}">
                              <span class="nav-link-icon d-md-none d-lg-inline-block"><i
                                      class="ti ti-flame"></i></span>
                              <span class="nav-link-title"> Bảng điều khiển </span>
                          </a>
                      </li>

                      @if (hasPermission(['KYC Management']))
                          <li class="nav-item dropdown {{ setActive(['admin.kyc.*']) }}">
                              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                  data-bs-auto-close="false" role="button" aria-expanded="false">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                                      <i class="ti ti-user-check"></i>
                                  </span>
                                  <span class="nav-link-title"> Xác minh KYC </span>
                              </a>
                              <div class="dropdown-menu {{ setActive(['admin.kyc.*'], 'show') }}">
                                  <div class="dropdown-menu-columns">
                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.kyc.index']) }}"
                                              href="{{ route('admin.kyc.index') }}">
                                              Tất cả yêu cầu
                                          </a>
                                          <a class="dropdown-item {{ setActive(['admin.kyc.pending']) }}"
                                              href="{{ route('admin.kyc.pending') }}">
                                              Chờ xét duyệt
                                          </a>
                                          <a class="dropdown-item {{ setActive(['admin.kyc.rejected']) }}"
                                              href="{{ route('admin.kyc.rejected') }}">
                                              Đã từ chối
                                          </a>

                                      </div>

                                  </div>
                              </div>
                          </li>
                      @endif
                      @if (hasPermission(['Category Management', 'Tags Management', 'Brand Management']))
                          <li
                              class="nav-item dropdown {{ setActive(['admin.products.*', 'admin.categories.*', 'admin.brands.*', 'admin.tags.*', 'admin.reviews.*']) }}">
                              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                  data-bs-auto-close="false" role="button" aria-expanded="false">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                                      <i class="ti ti-box"></i>
                                  </span>
                                  <span class="nav-link-title"> Quản lý sản phẩm </span>
                              </a>
                              <div
                                  class="dropdown-menu {{ setActive(['admin.products.*', 'admin.categories.*', 'admin.brands.*', 'admin.tags.*', 'admin.reviews.*'], 'show') }}">
                                  <div class="dropdown-menu-columns">
                                      @if (hasPermission(['Category Management']))
                                          <div class="dropdown-menu-column">
                                              <a class="dropdown-item {{ setActive(['admin.products.*']) }}"
                                                  href="{{ route('admin.products.index') }}">
                                                  Sản phẩm
                                              </a>
                                          </div>
                                      @endif


                                      @if (hasPermission(['Category Management']))
                                          <div class="dropdown-menu-column">
                                              <a class="dropdown-item {{ setActive(['admin.categories.*']) }}"
                                                  href="{{ route('admin.categories.index') }}">
                                                  Danh mục
                                              </a>
                                          </div>
                                      @endif

                                      @if (hasPermission(['Tags Management']))
                                          <div class="dropdown-menu-column">
                                              <a class="dropdown-item {{ setActive(['admin.tags.*']) }}"
                                                  href="{{ route('admin.tags.index') }}">
                                                  Thẻ sản phẩm (Tags)
                                              </a>
                                          </div>
                                      @endif

                                      @if (hasPermission(['Brand Management']))
                                          <div class="dropdown-menu-column">
                                              <a class="dropdown-item {{ setActive(['admin.brands.*']) }}"
                                                  href="{{ route('admin.brands.index') }}">
                                                  Thương hiệu
                                              </a>
                                          </div>
                                      @endif

                                      @if (hasPermission(['Brand Management']))
                                          <div class="dropdown-menu-column">
                                              <a class="dropdown-item {{ setActive(['admin.reviews.*']) }}"
                                                  href="{{ route('admin.reviews.index') }}">
                                                  Đánh giá sản phẩm
                                              </a>
                                          </div>
                                      @endif

                                  </div>
                              </div>
                          </li>
                      @endif

                      @if (hasPermission(['Order Management']))
                          <li class="nav-item dropdown {{ setActive(['admin.orders.*']) }}">
                              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                  data-bs-auto-close="false" role="button" aria-expanded="false">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                                      <i class="ti ti-shopping-bag-plus"></i>
                                  </span>
                                  <span class="nav-link-title"> Quản lý đơn hàng </span>
                              </a>
                              <div class="dropdown-menu {{ setActive(['admin.orders.*'], 'show') }}">
                                  <div class="dropdown-menu-columns">
                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item" href="{{ route('admin.orders.index') }}">
                                              Tất cả đơn hàng
                                          </a>
                                      </div>
                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item"
                                              href="{{ route('admin.orders.index', ['status' => 'pending']) }}">
                                              Đơn chờ xử lý
                                          </a>
                                      </div>

                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item"
                                              href="{{ route('admin.orders.index', ['status' => 'processed']) }}">
                                              Đã xác nhận
                                          </a>
                                      </div>

                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item"
                                              href="{{ route('admin.orders.index', ['status' => 'packed']) }}">
                                              Đã đóng gói
                                          </a>
                                      </div>

                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item"
                                              href="{{ route('admin.orders.index', ['status' => 'shipped']) }}">
                                              Đã gửi hàng
                                          </a>
                                      </div>

                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item"
                                              href="{{ route('admin.orders.index', ['status' => 'in_transit']) }}">
                                              Đang vận chuyển
                                          </a>
                                      </div>
                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item"
                                              href="{{ route('admin.orders.index', ['status' => 'out_for_delivery']) }}">
                                              Đang giao hàng
                                          </a>
                                      </div>
                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item"
                                              href="{{ route('admin.orders.index', ['status' => 'delivered']) }}">
                                              Đã giao thành công
                                          </a>
                                      </div>
                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item"
                                              href="{{ route('admin.orders.index', ['status' => 'canceled']) }}">
                                              Đã hủy
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </li>
                      @endif

                      @if (hasPermission(['Ecommerce Management']))
                          <li
                              class="nav-item dropdown {{ setActive(['admin.flash-sales.*', 'admin.coupons.*', 'admin.shipping-rules.*']) }}">
                              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                  data-bs-auto-close="false" role="button" aria-expanded="false">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                                      <i class="ti ti-dashboard"></i>
                                  </span>
                                  <span class="nav-link-title"> Khuyến mãi & Vận chuyển </span>
                              </a>
                              <div
                                  class="dropdown-menu {{ setActive(['admin.flash-sales.*', 'admin.coupons.*', 'admin.shipping-rules.*'], 'show') }}">
                                  <div class="dropdown-menu-columns">
                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.flash-sales.*']) }}"
                                              href="{{ route('admin.flash-sales.index') }}">
                                              Flash Sale
                                          </a>
                                      </div>
                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.coupons.*']) }}"
                                              href="{{ route('admin.coupons.index') }}">
                                              Mã giảm giá (Coupons)
                                          </a>
                                      </div>
                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.shipping-rules.*']) }}"
                                              href="{{ route('admin.shipping-rules.index') }}">
                                              Quy tắc vận chuyển
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </li>
                      @endif

                      @if (hasPermission(['Section Management']))
                          <li
                              class="nav-item dropdown {{ setActive(['admin.offer-sliders.*', 'admin.sliders.*', 'admin.hero-banners.*', 'admin.popular-categories.*', 'admin.product-sections.*', 'admin.our-features.*', 'admin.social-links.*']) }}">
                              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                  data-bs-auto-close="false" role="button" aria-expanded="false">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                                      <i class="ti ti-layout-dashboard"></i>
                                  </span>
                                  <span class="nav-link-title"> Quản lý giao diện </span>
                              </a>
                              <div
                                  class="dropdown-menu {{ setActive(['admin.offer-sliders.*', 'admin.sliders.*', 'admin.hero-banners.*', 'admin.popular-categories.*', 'admin.product-sections.*', 'admin.our-features.*', 'admin.social-links.*'], 'show') }}">
                                  <div class="dropdown-menu-columns">

                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.offer-sliders.*']) }}"
                                              href="{{ route('admin.offer-sliders.index') }}">
                                              Slider ưu đãi
                                          </a>
                                      </div>

                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.sliders.*']) }}"
                                              href="{{ route('admin.sliders.index') }}">
                                              Slider chính (Hero)
                                          </a>
                                      </div>
                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.hero-banners.*']) }}"
                                              href="{{ route('admin.hero-banners.index') }}">
                                              Banner Hero
                                          </a>
                                      </div>

                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.popular-categories.*']) }}"
                                              href="{{ route('admin.popular-categories.index') }}">
                                              Danh mục nổi bật
                                          </a>
                                      </div>
                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.product-sections.*']) }}"
                                              href="{{ route('admin.product-sections.index') }}">
                                              Khối sản phẩm trang chủ
                                          </a>
                                      </div>

                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.our-features.*']) }}"
                                              href="{{ route('admin.our-features.index') }}">
                                              Tính năng nổi bật
                                          </a>
                                      </div>

                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.social-links.*']) }}"
                                              href="{{ route('admin.social-links.index') }}">
                                              Liên kết mạng xã hội
                                          </a>
                                      </div>

                                  </div>
                              </div>
                          </li>
                      @endif
                      @if (hasPermission(['Subscriber Management']))
                          <li class="nav-item">
                              <a class="nav-link {{ setActive(['admin.subscribers.*']) }}"
                                  href="{{ route('admin.subscribers.index') }}">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block"><i
                                          class="ti ti-news"></i></span>
                                  <span class="nav-link-title"> Người đăng ký nhận tin </span>
                              </a>
                          </li>
                      @endif


                      @if (hasPermission(['Withdraw Management']))
                          <li
                              class="nav-item dropdown {{ setActive(['admin.withdraw-methods.*', 'admin.withdraw-requests.*']) }}">
                              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                  data-bs-auto-close="false" role="button" aria-expanded="false">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                                      <i class="ti ti-currency-dollar"></i>
                                  </span>
                                  <span class="nav-link-title"> Quản lý rút tiền </span>
                              </a>
                              <div
                                  class="dropdown-menu {{ setActive(['admin.withdraw-methods.*', 'admin.withdraw-requests.*'], 'show') }}">
                                  <div class="dropdown-menu-columns">
                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.withdraw-methods.*']) }}"
                                              href="{{ route('admin.withdraw-methods.index') }}">
                                              Phương thức rút tiền
                                          </a>
                                      </div>

                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.withdraw-requests.*']) }}"
                                              href="{{ route('admin.withdraw-requests.index') }}">
                                              Yêu cầu rút tiền
                                          </a>
                                      </div>

                                  </div>
                              </div>
                          </li>
                      @endif


                      @if (hasPermission(['Page Management']))
                          <li class="nav-item">
                              <a class="nav-link {{ setActive(['admin.custom-pages.*']) }}"
                                  href="{{ route('admin.custom-pages.index') }}">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block"><i
                                          class="ti ti-ruler"></i></span>
                                  <span class="nav-link-title"> Quản lý trang tĩnh </span>
                              </a>
                          </li>
                      @endif
                      @if (hasPermission(['Advertisement Management']))
                          <li class="nav-item {{ setActive(['admin.banners.*']) }}">
                              <a class="nav-link" href="{{ route('admin.banners.index') }}">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block"><i
                                          class="ti ti-ad"></i></span>
                                  <span class="nav-link-title"> Banner quảng cáo </span>
                              </a>
                          </li>
                      @endif
                      @if (hasPermission(['Contact Management']))
                          <li
                              class="nav-item dropdown {{ setActive(['admin.contact-settings.*', 'admin.contact-messages.*']) }}">
                              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                  data-bs-auto-close="false" role="button" aria-expanded="false">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                                      <i class="ti ti-address-book"></i>
                                  </span>
                                  <span class="nav-link-title"> Liên hệ & Tin nhắn </span>
                              </a>
                              <div
                                  class="dropdown-menu {{ setActive(['admin.contact-settings.*', 'admin.contact-messages.*'], 'show') }}">
                                  <div class="dropdown-menu-columns">
                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.contact-settings.*']) }}"
                                              href="{{ route('admin.contact-settings.index') }}">
                                              Cấu hình trang liên hệ
                                          </a>
                                      </div>

                                      <div class="dropdown-menu-column">
                                          <a class="dropdown-item {{ setActive(['admin.contact-messages.*']) }}"
                                              href="{{ route('admin.contact-messages.index') }}">
                                              Tin nhắn liên hệ
                                          </a>
                                      </div>

                                  </div>
                              </div>
                          </li>
                      @endif



                      @if (hasPermission(['Payment Setting']))
                          <li class="nav-item">
                              <a class="nav-link {{ setActive(['admin.payment-settings.*']) }}"
                                  href="{{ route('admin.payment-settings.index') }}">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block"><i
                                          class="ti ti-receipt-dollar"></i></span>
                                  <span class="nav-link-title"> Cấu hình thanh toán </span>
                              </a>
                          </li>
                      @endif

                      @if (hasPermission(['Role Management', 'Role User Management']))
                          <li class="nav-item dropdown {{ setActive(['admin.role.*', 'admin.role-users.*']) }}">
                              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                  data-bs-auto-close="false" role="button" aria-expanded="false">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                                      <i class="ti ti-shield"></i>
                                  </span>
                                  <span class="nav-link-title"> Phân quyền & Quản trị </span>
                              </a>
                              <div
                                  class="dropdown-menu {{ setActive(['admin.role.*', 'admin.role-users.*'], 'show') }}">
                                  <div class="dropdown-menu-columns">
                                      @if (hasPermission(['Role Management']))
                                          <div class="dropdown-menu-column">
                                              <a class="dropdown-item {{ setActive(['admin.role.*']) }}"
                                                  href="{{ route('admin.role.index') }}">
                                                  Vai trò & Quyền hạn
                                              </a>
                                          </div>
                                      @endif

                                      @if (hasPermission(['Role User Management']))
                                          <div class="dropdown-menu-column">
                                              <a class="dropdown-item {{ setActive(['admin.role-users.*']) }}"
                                                  href="{{ route('admin.role-users.index') }}">
                                                  Tài khoản Quản trị
                                              </a>
                                          </div>
                                      @endif

                                  </div>
                              </div>
                          </li>
                      @endif

                      @if (hasPermission(['Settings Management']))
                          <li class="nav-item">
                              <a class="nav-link {{ setActive(['admin.database-clear.*']) }}"
                                  href="{{ route('admin.database-clear.index') }}">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-skull"></i></span>
                                  <span class="nav-link-title"> Xóa dữ liệu CSDL </span>
                              </a>
                          </li>
                      @endif


                      @if (hasPermission(['Settings Management']))
                          <li class="nav-item">
                              <a class="nav-link {{ setActive(['admin.settings.*']) }}"
                                  href="{{ route('admin.settings.index') }}">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block"><i
                                          class="ti ti-settings"></i></span>
                                  <span class="nav-link-title"> Cài đặt hệ thống </span>
                              </a>
                          </li>
                      @endif




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
                          aria-label="Menu người dùng">
                          <span class="avatar avatar-sm"
                              style="background-image: url({{ asset(auth('admin')->user()?->avatar) }})">
                          </span>
                          <div class="d-none d-xl-block ps-2">
                              <div>{{ auth('admin')->user()?->name }}</div>
                              <div class="mt-1 small text-secondary">
                                  {{ auth('admin')->user()?->getRoleNames()?->first() }}</div>
                          </div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                          <a href="{{ route('admin.profile.index') }}" class="dropdown-item">Hồ sơ cá nhân</a>
                          <div class="dropdown-divider"></div>
                          <a href="{{ route('admin.settings.index') }}" class="dropdown-item">Cài đặt hệ thống</a>
                          <a onclick="event.preventDefault();
                                $('.logout-form').submit();"
                              href="" class="dropdown-item">Đăng xuất</a>
                          <form method="POST" action="{{ route('admin.logout') }}" class="logout-form">
                              @csrf
                          </form>
                      </div>
                  </div>
              </div>
              <div class="collapse navbar-collapse" id="navbar-menu">
                  <!-- BEGIN NAVBAR MENU -->

                  <!-- END NAVBAR MENU -->
              </div>
          </div>
      </header>
