<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('profile.css') }}">
</head>
<body>
<div class="logout">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">
            <i class="fa-solid fa-power-off"></i>
        </button>
    </form>
</div>
<div class="logout">
<a href="/dashboard" style="color:white;">Go back</a>
</div>

<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<section>
    <div class="profile">
        <div class="pro-image">
            <img src="images/profile.jpg" alt="Profile Image">
        </div>
        <div class="pro-name">
            <p style="color:white;">{{ $user->name }}</p>
        </div>
        <div class="add-post">
            <a href="{{ route('blog') }}" id="post">Add post</a>
        </div>
    </div>
</section>
<div class="posts">
    <h2>Posts</h2>
</div>
@if ($blogs->isNotEmpty())
    @foreach ($blogs as $blog)
        <div class="post-body">
            <div class="post">
                <div class="post-head"><li>{{ $blog->head }}</li></div>
                <div class="blog"><li>{{ $blog->blog }}</li></div>
                <h3 style="color:black;">Comments</h3>
                <div class="comment">
                    @if($blog->comments->isNotEmpty())
                        @foreach($blog->comments as $comment)
                            <p>{{ $comment->comment }} - by {{ $comment->user->name }}</p>
                        @endforeach
                    @else
                        <p>No comments</p>
                    @endif
                </div>
                <div class="add-comment">
                    <form action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        <input type="text" name="comment" placeholder="Add a comment..." class="comment-input">
                        <input type="submit" value="Comment" class="submit">
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p style="color:white; height:90px">No posts</p>
@endif
</body>
</html>
