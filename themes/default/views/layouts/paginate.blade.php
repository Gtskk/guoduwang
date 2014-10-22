@if($paginator->getLastPage() > 1)
<div class="pager fr">
   	<ul>
   		@if($paginator->getCurrentPage() != 1)
        <li>
        	<a href="{{ $paginator->getUrl($paginator->getCurrentPage()-1) }}">上一页</a>
        </li>
        @endif
        @for ($i = 1; $i <= $paginator->getLastPage(); $i++)
        <li>
        	<a href="{{ $paginator->getUrl($i) }}"{{ ($paginator->getCurrentPage() == $i) ? ' class="current"' : '' }}>
        		{{ $i }}
        	</a>
        </li>
        @endfor
        @if($paginator->getCurrentPage() != $paginator->getLastPage())
        <li>
        	<a href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}">下一页</a>
        </li>
        @endif
   	</ul>
</div>
@endif