
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('dashboard.css')}}">

</head>
<body>
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="top">
   <div class="logo">
    <p>Blogy</p>
   </div>
   <div class="image">
    <a href="/profile" class="img">
<img src="images/profile.jpg" alt="" srcset="" id="img">

    </a>


   </div></div>


   <section>
   @if ($blogs->isNotEmpty())
   @foreach ($blogs as $blog)
<div class="blog">
<div class="blogs">
<div class="blog-head">
<p style="color:black; height:2%;">{{ $blog->user->name }}</p>
                        <li >{{ $blog->head }}</li>
</div>
<div class="blog-post">
                        <li >{{ $blog->blog }}</li>
                    </div>
                    <h2 style="color:black;">Comments</h2>
                    @if($blog->comments->isNotEmpty())
                    
                    <div class="comment">
                    @foreach($blog->comments as $comment)
                                <li style=" color:black; ">{{ $comment->comment }} - by {{ $comment->user->name }}</li>

                            @endforeach

                    </div>
                    @else
                    <p style="color:black; width:100%; display:flex; justify-content:center;">No comments</p>
                    @endif
                    <div class="comments" id="comments">
                <div class="comment2">
                        <form action="{{ route('comment.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <input type="text" name="comment" placeholder="Add a comment...">
                            <input type="submit" value="Send" style="background-color:black; color:white;  cursor: pointer;">
                        </form>
                    </div>
                </div>
</div>

@endforeach
@endif

</div>
   </section>
</body>
</html>