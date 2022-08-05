<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Noticias</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/blog/">





<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('blog.css')}}" rel="stylesheet">
  </head>
  <body>

<div class="container">
  <header class="blog-header lh-1 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="/">ScaleNews</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="link-secondary" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
        <a class="btn btn-sm btn-outline-secondary" href="#">Entrar</a>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 link-secondary" href="#">World</a>
      <a class="p-2 link-secondary" href="#">U.S.</a>
      <a class="p-2 link-secondary" href="#">Technology</a>
      <a class="p-2 link-secondary" href="#">Design</a>
      <a class="p-2 link-secondary" href="#">Culture</a>
      <a class="p-2 link-secondary" href="#">Business</a>
      <a class="p-2 link-secondary" href="#">Politics</a>
      <a class="p-2 link-secondary" href="#">Opinion</a>
      <a class="p-2 link-secondary" href="#">Science</a>
      <a class="p-2 link-secondary" href="#">Health</a>
      <a class="p-2 link-secondary" href="#">Style</a>
      <a class="p-2 link-secondary" href="#">Travel</a>
    </nav>
  </div>
</div>

<main class="container">
  <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Título de uma outra notícia interessante</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue lendo...</a></p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">

      <article class="blog-post">
        <h2 class="blog-post-title mb-1">{{$notice->title}}</h2>
        <p class="blog-post-meta">{{$notice->cerated_at}} by <a href="#">Fulano</a></p>

        <p>{{$notice->content}}<p>


        <h2 id="comentarios">Comentários</h2>
        <hr>
        <form action="/comment" method="post">
        @csrf
        <input type="hidden" name="notice_id" value={{$notice->id}}>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nome@exemplo.com.br" name="email">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Comentário</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <hr>
        @if(session('message'))
            <div class="alert alert-success">
                <p>{{session('message')}}</p>
            </div>
        @endif

        @foreach ($comments as $comment)
        <div class="card p-3 mt-2">
            <div class="d-flex justify-content-between align-items-center">
            <div class="user d-flex flex-row align-items-center">
            <img src="https://www.gravatar.com/avatar/{{md5($comment->email)}}" width="30" class="user-img rounded-circle mr-2">
            <span><small class="font-weight-bold text-primary p-2">{{ $comment->email }}</small> <small class="font-weight-bold">{{ $comment->comment }}</small></span>
            </div>
            <small>Em: {{date_format($comment->created_at, 'd/m/Y H:i:s')}}</small>
            </div>
            <div class="action d-flex justify-content-between mt-2 align-items-center">
            <div class="icons align-items-center">
                <i class="fa fa-check-circle-o check-icon text-primary"></i>
            </div>
            </div>
        </div>
        @endforeach

      </article>

      <nav class="blog-pagination mt-5 mb-5" aria-label="Pagination">
        <a class="btn btn-outline-primary rounded-pill" href={{$comments->toArray()['prev_page_url']."#comentarios"}}>Anterior</a>
        <a class="btn btn-outline-primary rounded-pill" href={{$comments->toArray()['next_page_url']."#comentarios"}}>Próxima</a>
      </nav>
    </div>
    </div>

</main>

<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>

  </body>
</html>
