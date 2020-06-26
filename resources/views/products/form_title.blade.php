<div class="l-title--form">
    <div class="c-title--wrap">
        <p>Title</p>
        <input class="c-title--input" type="text" name="title" class="" required value="{{ $product->title ?? old('title') }}">
    </div>
    <div class="c-comment--wrap">
        <p>Comment</p>
        <textarea class="c-comment--text" name="body" class="" rows="16" placeholder="Write your comment">{{ $product->body ?? old('body') }}</textarea>
    </div>
</div>