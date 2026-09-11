@props(['name', 'image'])

<div id="{{ $imagePreviewId }}" style="background-image: url({{ $image }}); background-size: cover; background-position: center;" {{ $attributes->merge(['class' => 'ms-2 mb-3 image-preview']) }}>
    <label for="{{ $imageUploadId }}" id="{{ $imageLabelId }}">Chọn tệp</label>
    <input type="file" name="{{ $name }}" id="{{ $imageUploadId }}" />
</div>
