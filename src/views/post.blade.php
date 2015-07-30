@extends('app')

@section('content')
<div id="blog" class="container">


    <div class="col-md-10 col-md-offset-1">
        <h1 class="no-underline">{{$post['title']}}</h1>
        <p>by <strong>{{$post['author']}}</strong> &#8212; Posted on <strong>{{$post['created_at']}}</strong></p>        <div class="underline"></div>
     </div>



    <div class="col-md-10 col-md-offset-1">





    <header class="blog-header box">
        <div class="bg-img"><img src="{{url('uploads/'.$post['image'])}}" alt="Background Image"/></div>
        <div class="title">
        </div>
    </header>

    <article class="box col-xs-12">
        <div class="post-content">{!! $post['content'] !!}</div>
          <p class="post-button">

                @if($post->nextPost())
                <a class="pull-right" href="{{$post->nextPost()->getUrl()}}">Next : {{$post->nextPost()['title']}}

                    <span class="fa fa-angle-right" aria-hidden="true"></span></a>
                @endif

                @if($post->previousPost())
                <a class="pull-left" href="{{$post->previousPost()->getUrl()}}"><span class="fa fa-angle-left" aria-hidden="true"></span>
Previous : {{$post->previousPost()['title']}}
                </a>
                @endif
            </p>
    </article>

    <div class="col-xs-12 box">
     <div id="disqus_thread" class=""></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = '{{\Config::get('blog.disqus')}}'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
     </div>

    </div>

</div><!-- /blog -->

@stop

@section('javascript')

    <script type="text/javascript">

        $(document).ready(function(){

            //Correct img src in post content
            $('.post-content img').each(function(){

                var src = $(this).attr('src');

                var srcSplitArray = src.split('/');

                $(this).attr('src','{{url('/uploads')}}/' + srcSplitArray[srcSplitArray.length - 1]);

            })

        });

    </script>

@endsection