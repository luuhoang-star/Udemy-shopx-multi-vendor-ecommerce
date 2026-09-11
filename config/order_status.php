<?php

return $orderStatuses = [
    'pending'          => 'Đơn hàng đang chờ xác nhận từ hệ thống',
    'processing'       => 'Đơn hàng đã được xác nhận, đang chuẩn bị hàng',
    'packed'           => 'Sản phẩm đã được đóng gói và dán nhãn vận chuyển',
    'shipped'          => 'Đơn hàng đã được bàn giao cho đơn vị vận chuyển',
    'in_transit'       => 'Đơn hàng đang được vận chuyển trong mạng lưới giao nhận',
    'out_for_delivery' => 'Shipper đang trên đường giao hàng đến địa chỉ của bạn',
    'delivered'        => 'Đơn hàng đã giao thành công cho khách hàng',
    'canceled'         => 'Đơn hàng đã bị hủy',
];
