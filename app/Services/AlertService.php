<?php
namespace App\Services;

class AlertService
{
    public static function updated($message = null)
    {
        notyf()->success($message ? $message : 'Cập nhật thành công.');
    }

    public static function created($message = null)
    {
        notyf()->success($message ? $message : 'Thêm mới thành công.');
    }

    public static function deleted() : void
    {
        notyf()->success('Đã xóa thành công.');
    }

    public static function error($message = null) : void
    {
        notyf()->error($message ? $message : 'Đã có lỗi xảy ra, vui lòng thử lại.');
    }

}
