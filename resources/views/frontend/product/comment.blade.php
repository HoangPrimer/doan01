<form class="form_comment">
    <input name="id" type="text" hidden value="{{ $product->id }}">
    <textarea name="comment" id="" placeholder="Viết bình luận...." required></textarea>
    <a href="#" class="add_comment" data-url="{{ route('product.comment', $product->id) }}">
        Bình Luận
    </a>
</form>
<span class="text-danger ers"></span>
@foreach ($product->Comment as $haha)
    <div class="content mt-2">
        <h5 >{{ $haha->User->name }}</h5>
        <span>{{ $haha->cm_content }}</span>
        <small>{{ $haha->created_at }}</small>
    </div>
@endforeach
