@extends('app')

@section('content')
<div class="container index blog-page">
     @if(count($last)==0)
          <div class="alert alert-warning" role="alert">Noting to see, go to panel and post something first !</div>
     @else
            <div class="col-xs-12">
                 <div class="col-xs-12">
                     <h1 class="no-underline">Blog</h1>
                     <div class="underline"></div>
                 </div>
     	    </div>

     	    <div class="col-xs-12">
                <div class="box">
                     <p class="no-underline heading-text">Stay up to date with everything that's happening on sparegreenroom.com through our blog!</p>
                </div>
     	    </div>

          <div class="col-md-8 col-xs-12">
                <div class="col-xs-12">
                  <h3 class="no-underline">Latest Post</h3>
                  <h4 class="no-underline">Our most current blog post...</h4>
                  <div class="underline"></div>
                </div>

                <div class="col-xs-12">
                    <div class="results-panels-big">
                        <a href="{{$mostRecommended->getUrl()}}">
                          <div class="other-large-image-container">
                              <img src="{{url('uploads/')}}/{{$mostRecommended['image']}}" alt="{{$mostRecommended['title']}}" />
                          </div>
                          <h3>{{$mostRecommended['title']}}</h3>
                          <p>  {{ str_limit(strip_tags($mostRecommended['content']),150) }}...</p>
                          <p class="posted-on">by <strong>{{$mostRecommended['author']}}</strong> &#8212; Posted on <strong>{{$mostRecommended['created_at']}}</strong></p>
                        </a>
                     </div>
                </div>
          </div>

          <div class="col-md-4 col-xs-12">

              <div class="col-xs-12">
                <h3 class="no-underline">Featured Events Posts</h3>
                <h4 class="no-underline">Posts about our favourite events...</h4>
                <div class="underline"></div>
              </div>

              @foreach($featuredEvents as $featuredEvent)
                    <div class="col-xs-12 col-md-12">
                        <a href="{{$featuredEvent->getUrl()}}">
                            <div class="results-panels-small">
                              <div class="large-image-container">
                                  <img src="{{url('uploads/')}}/{{$featuredEvent['image']}}" alt="{{$featuredEvent['title']}}" />
                              </div>
                              <h3>{{$featuredEvent['title']}}</h3>
                              <p>  {{ str_limit(strip_tags($featuredEvent['content']),100) }}...</p>
                            </div>
                        </a>
                    </div>
              @endforeach"
        </div>


    <div class="lastPost col-xs-12">
        <div class="col-xs-12">
            <h3 class="no-underline">All Posts</h3>
            <div class="underline"></div>
        </div>
        @foreach($last as $post)
            <div class="col-sm-6 col-xs-12">
                <a href="{{$post->getUrl()}}">
                    <div class="results-panels wow fadeIn">
                          <div class="third-large-image-container">
                              <img src="{{url('uploads')}}/{{$post['image']}}" alt="{{$post['title']}} " />
                          </div>
                          <h3>{{$post['title']}}</h3>
                          <p>{{substr(strip_tags($post['content']), 0, 150)}}...</p>
                          <p class="posted-on">by <strong>{{$post['author']}}</strong> &#8212; Posted on <strong>{{$post['created_at']}}</strong></p>
                     </div>
                </a>
             </div>
        @endforeach

        @if(method_exists($last,'render'))
        <div class="pagination-links">
            {!! $last->render() !!}
        </div>
        @endif
    </div>
    @endif
</div>

@stop

@section('javascript')
<script type="text/javascript">
   new WOW().init();

    $(window).resize(function() {
        console.log('resize');
         resizeImage("third-large-image-container");
         resizeImage("large-image-container");
         resizeImage("other-large-image-container");
    });

   $(document).ready(function(){
    console.log('ready');
      resizeImage("third-large-image-container");
      resizeImage("large-image-container");
      resizeImage("other-large-image-container");
    });

</script>


@endsection
