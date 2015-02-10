<div class="panel-footer operate">

  <div class="pull-left" style="font-size:15px;">
    <a class="" href="http://service.weibo.com/share/share.php?url={{ urlencode(Request::url()) }}&type=3&pic=&title={{{ $topic->title }}}" target="_blank" title="{{ lang('Share on Weibo') }}">
      <span class="fa fa-weibo"></span>
    </a>
    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}&text={{{ $topic->title }}}&via=phphub.org" class=""  target="_blank" title="{{ lang('Share on Twitter') }}">
      <i class="fa fa-twitter"></i>
    </a>
    <a href="http://www.facebook.com/sharer.php?u={{ urlencode(Request::url()) }}" class=""  target="_blank" title="{{ lang('Share on Facebook') }}">
      <i class="fa fa-facebook"></i>
    </a>
    <a href="https://plus.google.com/share?url={{ urlencode(Request::url()) }}" class=""  target="_blank" title="{{ lang('Share on Google Plus') }}">
      <i class="fa fa-google-plus"></i>
    </a>
  </div>

  <div class="pull-right">

    @if ($currentUser)
      <a title="{{ lang('Attent') }}" data-method="post" id="topic-attent-button" href="javascript:void(0);" data-url="{{ route('attentions.createOrDelete', $topic->id) }}">
        <i class="glyphicon glyphicon-eye-open"></i> 
        <span>
          @if(Attention::isUserAttentedTopic($currentUser, $topic))
          {{ lang('Cancel') }}
          @else 
          {{ lang('Attent') }}
          @endif
        </span>
      </a>

      <a title="{{ lang('Favorite') }}" data-method="post" id="topic-favorite-button" href="javascript:void(0);" data-url="{{ route('favorites.createOrDelete', $topic->id) }}">
        <i class="glyphicon glyphicon-bookmark"></i> 
        <span>
          @if (Favorite::isUserFavoritedTopic($currentUser, $topic)) 
          {{ lang('Cancel') }}
          @else 
          {{ lang('Favorite') }}
          @endif
        </span>
      </a>

      @if ($currentUser->can("manage_topics") )
      <a data-method="post" id="topic-recomend-button" href="javascript:void(0);" data-url="{{ route('topics.recomend', [$topic->id]) }}" class="pinSink {{ $topic->is_excellent ? 'active' :'';}}" title="{{ lang('Mark as Excellent') }}">
        <i class="fa fa-trophy"></i>
      </a>

        @if ($topic->order >= 0)
        <a data-method="post" id="topic-pin-button" href="javascript:void(0);" data-url="{{ route('topics.pin', [$topic->id]) }}" class="pinSink {{ $topic->order > 0 ? 'active' : '' }}" title="{{ lang('Pin it on Top') }}">
          <i class="fa fa-thumb-tack"></i>
        </a>
        @endif

        @if ($topic->order <= 0)
        <a data-method="post" id="topic-sink-button" href="javascript:void(0);" data-url="{{ route('topics.sink', [$topic->id]) }}" class="pinSink {{ $topic->order < 0 ? 'active' : '' }}" title="{{ lang('Sink This Topic') }}">
            <i class="fa fa-anchor"></i>
        </a>
        @endif

        <a data-method="delete" id="topic-delete-button" href="javascript:void(0);" data-url="{{ route('topics.destroy', [$topic->id]) }}" title="{{ lang('Delete') }}" class="admin">
            <i class="fa fa-trash-o"></i>
        </a>

      @endif

      @if ($currentUser->can("manage_topics") || $currentUser->id == $topic->member_id )
      <a id="topic-edit-button" href="{{ route('topics.edit', [$topic->id]) }}" title="{{ lang('Edit') }}" class="admin">
        <i class="fa fa-pencil-square-o"></i>
      </a>
      @endif
    @endif

  </div>
  <div class="clearfix"></div>
</div>
