@extends('admin.layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <style>
        .dropzone {
            border: 2px dashed #ccc;
            border-radius: 4px;
            padding: 20px;
            text-align: center;
            background: #f8f9fa;
            margin-bottom: 20px;
        }

        .dropzone.dz-drag-hover {
            border-color: #2196F3;
            background: #e3f2fd;
        }

        .image-preview-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .image-preview-item {
            position: relative;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: move;
        }

        .image-preview-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 4px;
        }

        .image-preview-item .remove-image {
            position: absolute;
            top: -10px;
            right: -10px;
            background: red;
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            text-align: center;
            line-height: 24px;
            cursor: pointer;
        }

        .image-preview-loader {
            position: relative;
            width: 100%;
            height: 150px;
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 1.5s infinite;
        }

        .image-preview-loader::after {
            content: "Đang tải ảnh...";
            color: #666;
        }

        @keyframes pulse {
            0% {
                opacity: 0.6;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0.6;
            }
        }
    </style>
@endpush

@section('contents')
    <div class="container-xl">
        <form action="" class="product-form">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label required">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm" value="">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label required">Đường dẫn thân thiện (Slug)</label>
                                    <input type="text" class="form-control" name="slug" id="slug" placeholder="duong-dan-san-pham" value="">
                                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label required">Mô tả ngắn</label>
                                    <textarea name="short_description" id="short-editor"></textarea>
                                    <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label required">Nội dung chi tiết</label>
                                    <textarea name="content" id="editor"></textarea>
                                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header fw-bold">
                            Tổng quan & Giá bán
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Mã SKU</label>
                                        <input type="text" class="form-control" name="sku" placeholder="VD: SKU-1001" value="">
                                        <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label required">Giá gốc</label>
                                        <input type="text" class="form-control" name="price" placeholder="0.00" value="">
                                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Giá khuyến mãi</label>
                                        <input type="text" class="form-control" name="special_price" placeholder="0.00" value="">
                                        <x-input-error :messages="$errors->get('special_price')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Khuyến mãi từ ngày</label>
                                        <input type="text" class="form-control datepicker" name="from_date"
                                            value="">
                                        <x-input-error :messages="$errors->get('from_date')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Đến ngày</label>
                                        <input type="text" class="form-control datepicker" name="to_date" value=""
                                            id="datepicker-tow">
                                        <x-input-error :messages="$errors->get('to_date')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-check">
                                                <input class="form-check-input manage-stock-check" name="manage_stock"
                                                    type="checkbox">
                                                <span class="form-check-label">Quản lý tồn kho</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 manage-stock d-none">
                                        <div class="mb-3">
                                            <label class="form-label">Số lượng tồn kho</label>
                                            <input type="text" class="form-control" name="quantity" placeholder="0" value="">
                                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h3 class="card-title">Tình trạng kho hàng</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="stock_status" checked="" value="in_stock">
                                                        <span class="form-check-label">Còn hàng</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="stock_status" value="out_of_stock">
                                                        <span class="form-check-label">Hết hàng</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Trạng thái hiển thị</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <select name="status" class="form-control" id="">
                                        <option value="active">Hoạt động (Active)</option>
                                        <option value="inactive">Tạm dừng (Inactive)</option>
                                        <option value="draft">Bản nháp (Draft)</option>
                                        <option value="pending">Chờ duyệt (Pending)</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Cửa hàng / Người bán</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <select name="store" class="form-control select2" id="">
                                        <option value="">-- Chọn cửa hàng --</option>
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('store')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Sản phẩm nổi bật</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-check form-switch form-switch-3">
                                        <input class="form-check-input" type="checkbox" name="is_featured">
                                        <span class="form-check-label">Bật nổi bật</span>
                                    </label>
                                    <x-input-error :messages="$errors->get('is_featured')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Danh mục sản phẩm</h3>
                        </div>
                        <div class="card-body" style="height: 400px; overflow-y: scroll;">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="category-search"
                                            placeholder="Tìm kiếm danh mục...">

                                    </div>

                                    <ul class="list-unstyled " id="category-tree">
                                        @foreach ($categories as $category)
                                            <li>
                                                <label for="" class="form-check category-wrapper">
                                                    <input type="checkbox" class="form-check-input category-check"
                                                        name="categories[]" value="{{ $category->id }}">
                                                    <span
                                                        class="form-check-label category-label">{{ $category->name }}</span>
                                                </label>
                                                @if ($category->children_nested && $category->children_nested->count() > 0)
                                                    <ul class="list-unstyled ms-4 mt-2">
                                                        @foreach ($category->children_nested as $child)
                                                            <li>
                                                                <label for="" class="form-check category-wrapper">
                                                                    <input type="checkbox"
                                                                        class="form-check-input category-check"
                                                                        name="categories[]" value="{{ $child->id }}">
                                                                    <span
                                                                        class="form-check-label category-label">{{ $child->name }}</span>
                                                                </label>
                                                                @if ($child->children_nested && $child->children_nested->count() > 0)
                                                                    <ul class="list-unstyled ms-4 mt-2">
                                                                        @foreach ($child->children_nested as $subChild)
                                                                            <li>
                                                                                <label for=""
                                                                                    class="form-check category-wrapper">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input category-check"
                                                                                        name="categories[]"
                                                                                        value="{{ $subChild->id }}">
                                                                                    <span
                                                                                        class="form-check-label category-label">{{ $subChild->name }}</span>
                                                                                </label>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Thương hiệu</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <select name="brand" class="form-control select2" id="">
                                        <option value="">-- Chọn thương hiệu --</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Nhãn sản phẩm</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="is_hot">
                                        <span class="form-check-label">Bán chạy (Hot)</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="is_new">
                                        <span class="form-check-label">Mới (New)</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Thẻ sản phẩm (Tags)</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <select name="tags[]" class="form-control select2" id=""
                                        multiple="multiple">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="mb-3 row">
                                    <button class="btn btn-primary mt-3" type="submit">Lưu sản phẩm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>


    <script>
        $(document).on('change', '.category-check', function() {
            const isChecked = $(this).is(':checked');

            $(this).closest('li').find('input.category-check').each(function() {
                this.checked = isChecked;
                this.indeterminate = false;
            })

            function updateParents($input) {
                const $li = $input.closest('li').parent().closest('li');

                if ($li.length) {
                    const $siblings = $li.find('> ul > li input.category-check');
                    const checkedCount = $siblings.filter(':checked').length;
                    const $parent = $li.find('> label > input.category-check');

                    if (checkedCount === 0) {
                        $parent.prop('checked', false).prop('indeterminate', false);
                    } else if (checkedCount === $siblings.length) {
                        $parent.prop('checked', true).prop('indeterminate', false);
                    } else {
                        $parent.prop('checked', false).prop('indeterminate', true);
                    }

                    updateParents($parent);
                }
            }

            updateParents($(this));
        })

        // search logic
        $('#category-search').on('input', function() {
            const query = $(this).val().toLowerCase();

            $('#category-tree li').each(function() {
                const label = $(this).find('> label > .category-label').text().toLowerCase();
                if (label.includes(query)) {
                    $(this).removeClass('d-none');
                    $(this).parents('li').removeClass('d-none');
                } else {
                    $(this).addClass('d-none');
                }
            });

            if (query === '') {
                $('#category-tree li').removeClass('d-none');
            }
        });

        $('.manage-stock-check').on('change', function() {
            if ($(this).is(':checked')) {
                $('.manage-stock').removeClass('d-none');
            } else {
                $('.manage-stock').addClass('d-none');
            }
        })


        // submit form
        $(function() {
            $('.product-form').on('submit', function(e) {
                e.preventDefault();
                let form = $(this);
                let data = new FormData(form[0]);

                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.products.store', ['type' => ':type']) }}".replace(
                        ':type', '{{ request()->type }}'),
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.href = response.redirect_url;
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            notyf.error(errors[key][0]);
                        });
                    }
                })
            });
        })

        // slug auto-generate
        $('#name').on('input', function() {
            if (!$('#category-id').val()) {
                $('#slug').val(slugify($(this).val()));
            }
        })


        function slugify(text) {
            return text.toString().toLowerCase().replace(/\s+/g, '-')
                .replace(/[^a-z0-9\-]/g, '')
                .replace(/\-+/g, '-')
                .replace(/^\-+|\-+$/g, '');
        }
    </script>
@endpush
