# 🛒 ShopX - Multi-Vendor E-Commerce Platform

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<p align="center">
  <strong>Nền tảng thương mại điện tử đa người bán (Multi-Vendor) chuyên nghiệp xây dựng trên nền tảng Laravel 11.</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11">
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Vite-Ready-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite">
</p>

---

## 📌 Giới thiệu dự án

**ShopX** là một hệ sinh thái thương mại điện tử đa người bán toàn diện, cho phép nhiều nhà cung cấp (Vendors) mở gian hàng trực tuyến, đăng bán sản phẩm và nhận thanh toán, đồng thời cung cấp cho Quản trị viên (Admin) toàn quyền kiểm soát hoa hồng, kiểm duyệt gian hàng và quản lý toàn bộ hệ thống.

---

## ✨ Tính năng chính

### 1. 🛍️ Dành cho Khách hàng (Customer Storefront)
- **Giao diện hiện đại & Responsive:** Tối ưu hiển thị mượt mà trên cả Mobile, Tablet và Desktop.
- **Duyệt & Tìm kiếm sản phẩm:** Tìm kiếm nhanh, lọc theo danh mục đa cấp (Main Category, Sub Category, Child Category), thương hiệu và khoảng giá.
- **Chi tiết sản phẩm:** Xem thư viện ảnh, thông số kỹ thuật, chọn thuộc tính (Attribute) và biến thể (Variant: màu sắc, kích thước...), xem đánh giá và bình luận.
- **Sự kiện & Khuyến mãi:** Flash Sale với đồng hồ đếm ngược, sản phẩm mới (New Arrivals), sản phẩm bán chạy.
- **Giỏ hàng & Wishlist:** Thêm/sửa/xóa sản phẩm nhanh với AJAX, lưu danh sách sản phẩm yêu thích.
- **Thanh toán & Đơn hàng:** Thanh toán linh hoạt qua cổng trực tuyến hoặc COD, theo dõi hành trình đơn hàng (Order Tracking).
- **Hồ sơ cá nhân:** Quản lý sổ địa chỉ nhận hàng, lịch sử đơn mua, đánh giá sản phẩm đã mua.

### 2. 🏪 Dành cho Nhà bán hàng (Vendor Dashboard)
- **Quản lý gian hàng:** Thiết lập banner, avatar, thông tin liên hệ và mô tả shop.
- **Quản lý sản phẩm:** Đăng và cập nhật sản phẩm vật lý (Physical) và sản phẩm số (Digital), quản lý kho hàng và biến thể.
- **Xử lý đơn hàng:** Theo dõi các đơn đặt hàng liên quan đến gian hàng của mình, cập nhật tiến độ giao hàng.
- **Quản lý tài chính:** Theo dõi doanh thu bán hàng, mức hoa hồng trích cho sàn, gửi yêu cầu rút tiền (Withdraw Request).

### 3. 🛡️ Dành cho Quản trị viên (Super Admin Portal)
- **Thống kê tổng quan (Dashboard):** Biểu đồ doanh thu tổng, số lượng đơn hàng, người dùng và gian hàng mới.
- **Quản lý Vendor & KYC:** Phê duyệt hoặc khóa tài khoản vendor, xác minh danh tính gian hàng.
- **Phân quyền nâng cao (Roles & Permissions):** Tích hợp Spatie Permission, tạo nhóm quyền và phân chia quyền hạn chi tiết cho nhân viên quản trị.
- **Quản lý hoa hồng:** Thiết lập tỷ lệ phần trăm hoa hồng trích từ doanh số của vendor.
- **Quản lý rút tiền:** Duyệt và thanh toán các yêu cầu rút tiền từ Vendor.
- **Cấu hình hệ thống:** Tùy biến logo, favicon, tiền tệ, phí vận chuyển (Shipping Rules), cổng thanh toán, nội dung email và banner quảng cáo.

### 4. 💳 Đa cổng thanh toán (Payment Gateways)
- **PayPal** (Sandbox & Live)
- **Stripe** (Hỗ trợ thẻ tín dụng/ghi nợ quốc tế)
- **Razorpay**
- **Thanh toán khi nhận hàng (COD - Cash On Delivery)**

---

## 🛠️ Công nghệ sử dụng (Tech Stack)

- **Backend:** [Laravel 11.x](https://laravel.com), PHP 8.2+
- **Database:** MySQL / MariaDB
- **Frontend:** Blade Templates, Tailwind CSS, JavaScript (ES6+), jQuery
- **Build Tool:** Vite
- **Thư viện nổi bật:**
  - `spatie/laravel-permission`: Phân quyền người dùng chi tiết
  - `srmklive/paypal`: Tích hợp cổng PayPal REST API
  - `stripe/stripe-php`: Tích hợp cổng Stripe Checkout
  - `razorpay/razorpay`: Tích hợp cổng Razorpay
  - `php-flasher/flasher-notyf-laravel`: Thông báo trạng thái tương tác đẹp mắt (Toast notifications)

---

## 📋 Yêu cầu môi trường

- **PHP:** >= 8.2 (Bật các extension: `bcmath`, `ctype`, `fileinfo`, `json`, `mbstring`, `openssl`, `pdo_mysql`, `tokenizer`, `xml`, `curl`)
- **Composer:** >= 2.x
- **Node.js:** >= 18.x & NPM
- **MySQL / MariaDB:** >= 8.0
- **Web Server:** Nginx / Apache hoặc công cụ môi trường cục bộ như **Laravel Herd**, **Valet**, **XAMPP**, **Laragon**.

---

## 🚀 Hướng dẫn cài đặt chi tiết

Thực hiện các bước sau để chạy dự án trên máy cục bộ (Local Development):

### Bước 1: Clone mã nguồn về máy
```bash
git clone https://github.com/luuhoang-star/Udemy-shopx-multi-vendor-ecommerce.git
cd Udemy-shopx-multi-vendor-ecommerce
```

### Bước 2: Cài đặt các thư viện PHP (Composer)
```bash
composer install
```

### Bước 3: Cài đặt các gói giao diện (NPM)
```bash
npm install
```

### Bước 4: Thiết lập file môi trường `.env`
Sao chép file `.env.example` thành file `.env`:
```bash
# Trên Windows (PowerShell):
Copy-Item .env.example .env

# Trên macOS/Linux:
cp .env.example .env
```

Mở file `.env` và cấu hình thông tin kết nối Database của bạn:
```env
APP_NAME="ShopX"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shopx_db
DB_USERNAME=root
DB_PASSWORD=
```

### Bước 5: Khởi tạo Application Key
```bash
php artisan key:generate
```

### Bước 6: Khởi tạo Database & Dữ liệu mẫu (Seed Data)
Tạo trước cơ sở dữ liệu rỗng (ví dụ tên `shopx_db` trong phpMyAdmin / MySQL CLI), sau đó chạy:
```bash
php artisan migrate --seed
```

> [!NOTE]
> Ngoài ra, trong thư mục `database/` có sẵn file `database.sql` nếu bạn muốn import nhanh trực tiếp qua công cụ GUI như phpMyAdmin, DBeaver hoặc HeidiSQL.

### Bước 7: Tạo liên kết Storage (để xem ảnh upload)
```bash
php artisan storage:link
```

### Bước 8: Khởi chạy ứng dụng
Mở 2 cửa sổ terminal riêng biệt:

**Terminal 1:** Biên dịch tài nguyên giao diện (Assets):
```bash
npm run dev
```

**Terminal 2:** Khởi chạy máy chủ PHP:
```bash
php artisan serve
```

Truy cập website tại địa chỉ: [http://localhost:8000](http://localhost:8000) (hoặc tên miền ảo của bạn trên Laravel Herd/Laragon).

---

## 🔑 Tài khoản đăng nhập mẫu (Demo Accounts)

Sau khi chạy lệnh `php artisan migrate --seed`, hệ thống có sẵn các tài khoản sau:

| Vai trò | Đường dẫn đăng nhập | Email | Mật khẩu |
| :--- | :--- | :--- | :--- |
| **Super Admin** | `/admin/login` | `admin@gmail.com` | `1234` |
| **Vendor** | `/login` hoặc `/vendor/login` | `vendor@gmail.com` | `1234` |
| **Khách hàng (User)** | `/login` | `user@gmail.com` | `1234` |

---

## ⚙️ Hướng dẫn cấu hình cổng thanh toán

Để kích hoạt và thử nghiệm thanh toán trực tuyến:
1. Đăng nhập vào trang Quản trị Admin: `http://localhost:8000/admin/login`
2. Vào menu **Settings** -> **Payment Settings**.
3. Chọn cổng thanh toán bạn muốn kích hoạt:
   - **Stripe:** Nhập `Publishable Key` (`pk_test_...`) và `Secret Key` (`sk_test_...`) từ tài khoản [Stripe Dashboard](https://dashboard.stripe.com/test/apikeys). Chuyển trạng thái sang **Active** và chế độ sang **Sandbox**.
   - **PayPal:** Nhập `Client ID` và `Secret Key` từ [PayPal Developer Portal](https://developer.paypal.com).
   - **Razorpay:** Nhập `Key ID` và `Key Secret` từ [Razorpay Dashboard](https://dashboard.razorpay.com).
4. Nhấn **Save** để lưu thay đổi.

---

## 📂 Cấu trúc thư mục chính

```text
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/             # Controller quản trị viên
│   │   ├── Frontend/          # Controller phía khách hàng
│   │   └── Vendor/            # Controller phía nhà bán hàng
│   ├── Models/                # Eloquent Models (Product, Order, User...)
│   └── Services/              # Các dịch vụ xử lý logic (Payment, Cart...)
├── database/
│   ├── migrations/            # Cấu trúc bảng Database
│   └── seeders/               # Dữ liệu mẫu (Tài khoản, cài đặt, sản phẩm)
├── public/                    # Tài nguyên tĩnh công khai (CSS, JS, Uploads)
├── resources/
│   └── views/
│       ├── admin/             # Giao diện Admin
│       ├── frontend/          # Giao diện Storefront khách hàng
│       └── vendor-dashboard/  # Giao diện Vendor
└── routes/
    ├── admin.php              # Định tuyến cho Admin
    ├── auth.php               # Định tuyến xác thực (Login, Register...)
    └── web.php                # Định tuyến Web chính & Vendor
```

---

## 📄 Bản quyền (License)

Dự án được xây dựng phục vụ mục đích học tập và phát triển mã nguồn mở theo giấy phép [MIT License](LICENSE).
