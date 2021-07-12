
<form   class="form_comment" >           
        <input name="id" type="text" hidden value="{{$a->id}}">
        <textarea name="comment" id="" placeholder="Viết bình luận...." required></textarea>
       
  
        <a href="#" 
           title="Thêm vào giỏ hàng" 
            class="add_comment"
            data-url="{{route('comment',$a->id)}}"
        >
                              Bình Luận
        </a>
                        
</form>
<span class="text-danger ers"></span>               
@foreach($a-> Comment as $haha)
    <div class="content">
         <h4>{{$haha->User ->name}}</h4>
         <span>{{$haha->Content}}</span>
         <small>{{$haha->created_at}}</small>
    </div>
@endforeach