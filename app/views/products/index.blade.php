@extends('theme::layouts.main')

@section('content')
<!--con-->
<div class="container">
    <div class="row">
        @if(count($datas['products']))
        @foreach($datas['products'] as $post)
        <div class="col-xs-6 col-md-3">
            <a href="{{ route('products.show', $post->id) }}" class="thumbnail">
                <img src="{{ asset($post->thumbnail) }}" />
            </a>
        </div>
        @endforeach

        {{ $datas['products']->links() }}
        @else
        <h2>暂无项目</h2>
        @endif
    </div>
</div>
@overwrite