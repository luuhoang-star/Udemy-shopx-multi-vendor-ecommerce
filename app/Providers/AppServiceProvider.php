<?php

namespace App\Providers;

use App\Models\BannerAd;
use App\Models\CustomPage;
use App\Models\HeroBanner;
use App\Models\OurFeature;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Wishlist;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });

        // Translate database contents to Vietnamese
        try {
            if (Schema::hasTable('custom_pages')) {
                CustomPage::where('slug', 'terms-and-conditions')->update([
                    'title' => 'Điều khoản và Điều kiện',
                    'content' => '<p>Chào mừng bạn đến với <strong>ShopX</strong>! Các Điều khoản và Điều kiện này quy định các quy tắc và quy định cho việc sử dụng trang web và dịch vụ của chúng tôi. Bằng cách truy cập hoặc mua hàng từ chúng tôi, bạn đồng ý với các Điều khoản này.</p>
<hr>
<h5>1. Quy định chung</h5>
<ul>
<li><p>Bằng việc sử dụng trang web của chúng tôi, bạn xác nhận rằng bạn đủ 18 tuổi trở lên hoặc có sự đồng ý của cha mẹ/người giám hộ hợp pháp.</p></li>
<li><p>Chúng tôi có quyền cập nhật hoặc thay đổi các Điều khoản này bất kỳ lúc nào mà không cần thông báo trước.</p></li>
</ul>
<hr>
<h5>2. Sản phẩm &amp; Đơn hàng</h5>
<ul>
<li><p>Tất cả các sản phẩm được niêm yết phụ thuộc vào tình trạng còn hàng trong kho.</p></li>
<li><p>Chúng tôi luôn nỗ lực hiển thị màu sắc và chi tiết sản phẩm chính xác nhất, tuy nhiên có thể có sự khác biệt nhỏ do màn hình hiển thị.</p></li>
<li><p>Khi đặt hàng, bạn đồng ý mua hàng theo đúng các Điều khoản và mức giá được hiển thị.</p></li>
</ul>
<hr>
<h5>3. Giá cả &amp; Thanh toán</h5>
<ul>
<li><p>Tất cả giá sản phẩm đều được niêm yết bằng Việt Nam Đồng (hoặc đơn vị tiền tệ được cấu hình) và bao gồm các loại thuế phí theo quy định.</p></li>
<li><p>Chúng tôi chấp nhận thanh toán qua các phương thức bảo mật: Thẻ tín dụng, PayPal, Chuyển khoản ngân hàng, COD (Thanh toán khi nhận hàng).</p></li>
<li><p>Đơn hàng sẽ được xử lý và giao sau khi hoàn tất xác nhận thanh toán hoặc xác nhận đơn hàng COD.</p></li>
</ul>
<hr>
<h5>4. Vận chuyển &amp; Giao nhận</h5>
<ul>
<li><p>Thời gian giao hàng là ước tính và có thể thay đổi tùy thuộc vào điều kiện khách quan của đơn vị vận chuyển.</p></li>
<li><p>Bạn có trách nhiệm cung cấp thông tin địa chỉ và số điện thoại nhận hàng chính xác để đảm bảo quá trình giao nhận thuận tiện.</p></li>
</ul>
<hr>
<h5>5. Đổi trả &amp; Hoàn tiền</h5>
<ul>
<li><p>Chúng tôi chấp nhận đổi trả trong vòng <strong>7 ngày</strong> kể từ khi nhận hàng nếu sản phẩm chưa qua sử dụng và còn nguyên tem mác, bao bì ban đầu.</p></li>
<li><p>Một số sản phẩm đặc thù (hàng tươi sống, sản phẩm số đã kích hoạt) có thể không áp dụng chính sách đổi trả thông thường.</p></li>
<li><p>Tiền hoàn sẽ được chuyển về phương thức thanh toán ban đầu sau khi chúng tôi kiểm tra sản phẩm hoàn trả.</p></li>
</ul>
<hr>
<h5>6. Quyền sở hữu trí tuệ</h5>
<ul>
<li><p>Tất cả nội dung trên website, bao gồm logo, văn bản, hình ảnh, đồ họa đều thuộc quyền sở hữu của <strong>ShopX</strong> và được bảo hộ bởi pháp luật sở hữu trí tuệ.</p></li>
</ul>
<hr>
<h5>7. Giới hạn trách nhiệm</h5>
<ul>
<li><p>Chúng tôi không chịu trách nhiệm đối với các thiệt hại gián tiếp phát sinh từ việc sử dụng trang web ngoài tầm kiểm soát hợp lý của chúng tôi.</p></li>
</ul>
<hr>
<h5>8. Luật điều chỉnh</h5>
<ul>
<li><p>Các Điều khoản này được điều chỉnh và giải thích theo quy định của pháp luật nước Cộng hòa Xã hội Chủ nghĩa Việt Nam.</p></li>
</ul>'
                ]);

                CustomPage::where('slug', 'privacy-policy')->update([
                    'title' => 'Chính sách Bảo mật',
                    'content' => '<h5>1. Thông tin chúng tôi thu thập</h5>
<ul>
<li><p>Thông tin cá nhân (họ tên, email, số điện thoại, địa chỉ nhận hàng) khi bạn đặt hàng hoặc đăng ký tài khoản.</p></li>
<li><p>Thông tin thanh toán (được mã hóa bảo mật thông qua các cổng thanh toán uy tín của bên thứ ba).</p></li>
<li><p>Dữ liệu sử dụng như địa chỉ IP, loại trình duyệt và hành vi duyệt web nhằm nâng cao chất lượng trải nghiệm.</p></li>
</ul>
<hr>
<h5>2. Cách chúng tôi sử dụng thông tin</h5>
<ul>
<li><p>Để xử lý, đóng gói và vận chuyển đơn hàng đến tay bạn nhanh chóng và chính xác.</p></li>
<li><p>Để cải thiện giao diện, tính năng website và chất lượng phục vụ khách hàng.</p></li>
<li><p>Để gửi thông báo cập nhật tình trạng đơn hàng và chương trình khuyến mãi đặc biệt (bạn có thể hủy nhận tin bất cứ lúc nào).</p></li>
<li><p>Để tuân thủ các nghĩa vụ pháp lý hiện hành.</p></li>
</ul>
<hr>
<h5>3. Chia sẻ thông tin cá nhân</h5>
<ul>
<li><p>Chúng tôi cam kết tuyệt đối không bán hoặc cho thuê thông tin cá nhân của bạn cho bất kỳ bên thứ ba nào.</p></li>
<li><p>Chúng tôi chỉ chia sẻ dữ liệu cần thiết với các đối tác tin cậy (đơn vị giao vận, cổng thanh toán) để phục vụ giao hàng.</p></li>
<li><p>Chúng tôi có thể cung cấp thông tin khi có yêu cầu bằng văn bản từ cơ quan pháp luật có thẩm quyền.</p></li>
</ul>
<hr>
<h5>4. Cookie &amp; Công nghệ theo dõi</h5>
<ul>
<li><p>Chúng tôi sử dụng cookie để ghi nhớ phiên đăng nhập, giỏ hàng và cá nhân hóa trải nghiệm của bạn.</p></li>
<li><p>Bạn có thể tắt cookie trong cài đặt trình duyệt, tuy nhiên một số tính năng của trang web có thể bị hạn chế.</p></li>
</ul>
<hr>
<h5>5. An toàn bảo mật dữ liệu</h5>
<ul>
<li><p>Chúng tôi áp dụng các tiêu chuẩn bảo mật mã hóa SSL/TLS hàng đầu để bảo vệ dữ liệu cá nhân của bạn.</p></li>
<li><p>Tuy nhiên, không có phương thức truyền tải nào trên Internet là an toàn 100%, chúng tôi luôn nỗ lực tối đa để bảo vệ bạn.</p></li>
</ul>
<hr>
<h5>6. Quyền lợi của bạn</h5>
<ul>
<li><p>Bạn có toàn quyền yêu cầu xem, chỉnh sửa hoặc xóa thông tin cá nhân của mình bất kỳ lúc nào trong trang Tài khoản.</p></li>
<li><p>Bạn có thể từ chối nhận email quảng cáo bất kỳ lúc nào qua nút Hủy đăng ký ở cuối mỗi email.</p></li>
</ul>
<hr>
<h5>7. Liên hệ chúng tôi</h5>
<p>Nếu bạn có bất kỳ thắc mắc nào về Chính sách Bảo mật, vui lòng liên hệ với chúng tôi qua:<br>
📧 Email: contact@shopx.vn<br>
📍 Địa chỉ: Hà Nội, Việt Nam</p>'
                ]);
            }

            if (Schema::hasTable('our_features')) {
                OurFeature::where('title', 'Best Prices & Offers')->update([
                    'title' => 'Giá tốt & Ưu đãi',
                    'subtitle' => 'Áp dụng cho mọi đơn hàng'
                ]);
                OurFeature::where('title', 'Free Delivery')->update([
                    'title' => 'Giao hàng miễn phí',
                    'subtitle' => 'Dịch vụ tận tâm 24/7'
                ]);
                OurFeature::where('title', 'Great daily deal')->update([
                    'title' => 'Ưu đãi sốc mỗi ngày',
                    'subtitle' => 'Khi đăng ký tài khoản'
                ]);
                OurFeature::where('title', 'Wide assortment')->update([
                    'title' => 'Sản phẩm phong phú',
                    'subtitle' => 'Hàng ngàn sản phẩm chính hãng'
                ]);
                OurFeature::where('title', 'Easy returns')->update([
                    'title' => 'Đổi trả dễ dàng',
                    'subtitle' => 'Trong vòng 30 ngày'
                ]);
            }

            if (Schema::hasTable('sliders')) {
                Slider::where('title', 'like', '%Don’t miss%')->orWhere('title', 'like', '%Fresh Vegetables%')->update([
                    'title' => 'Đừng bỏ lỡ ưu đãi cực sốc hôm nay',
                    'sub_title' => 'Tiết kiệm lên đến 50% cho đơn hàng đầu tiên của bạn'
                ]);
            }

            if (Schema::hasTable('hero_banners')) {
                HeroBanner::where('title_one', 'like', '%Everyday Fresh%')->update([
                    'title_one' => 'Nông sản sạch mỗi ngày & Không chất bảo quản',
                    'title_two' => 'Bữa sáng lành mạnh cho cả gia đình bạn'
                ]);
            }

            if (Schema::hasTable('settings')) {
                Setting::where('key', 'site_short_description')->where('value', 'like', '%Awesome eCommerce%')->update([
                    'value' => 'Sàn thương mại điện tử đa nhà bán hàng hàng đầu Việt Nam'
                ]);
                Setting::where('key', 'site_copyright')->where('value', 'like', '%HTML Ecommerce%')->update([
                    'value' => '2026, ShopX - Sàn Thương mại Điện tử'
                ]);
                Setting::where('key', 'site_hours')->where('value', 'like', '%Mon - Sat%')->update([
                    'value' => '08:00 - 21:00, Thứ 2 - Chủ Nhật'
                ]);
                Setting::where('key', 'site_address')->where('value', 'like', '%Chicago%')->update([
                    'value' => 'Hà Nội, Việt Nam'
                ]);
            }
        } catch (\Throwable $e) {
            // Ignore if tables not yet migrated
        }

        view()->composer('*', function ($view) {
            $wishlist = Wishlist::where('user_id', auth('web')?->user()?->id);
            $ads = BannerAd::all()->groupBy('banner_id');
            $view->with([
                'wishlistCount' => $wishlist->count() ?? 0,
                'wishlistsProductIds' => $wishlist->pluck('product_id')->toArray() ?? []
            ]);
            $view->with('ads', $ads);
        });
    }
}
