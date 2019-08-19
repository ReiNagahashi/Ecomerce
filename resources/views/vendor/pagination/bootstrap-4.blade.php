@if ($paginator->hasPages())
                
<nav class="navigation align-center">
        @foreach($elements as $element)
        
            @if(is_array($element))
                @foreach($element as $page => $url)
                    @if($page == $paginator->currentPage())
                    {{-- 1つ目のhrefは現在のページを表示しているときに実行されるメソッド。currentの意味はブートの効果で、ボタンが青色になる。（当然そのボタンを押してもどこにも飛ばない） --}}
                        <a href="#" class="page-numbers bg-border-color current"><span>{{$page}}</span></a>
                    @else
                        <a href="{{$url}}" class="page-numbers bg-border-color "><span>{{$page}}</span></a>
                    @endif
                @endforeach
             @endif
          @endforeach
    </nav>
@endif
