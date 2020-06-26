<div class="l-card">
        
        
        <a class="c-card--img" href="{{ route('products.show', ['product' => $product]) }}">
           <figure class="c-img--wrapper">
            <img src="{{ $product->pic1}}" alt="">
                <div class="c-mask">
                    <p class="c-mask--text">
                        <i class="far fa-arrow-alt-circle-right"></i>
                        View Page
                    </p>
                </div>
            </figure>
        </a>

        <div class="c-card--wrapper l-row l-row--between">
            <a 
            class="c-card--title"
            href="{{ route('products.show', ['product' => $product]) }}">
                {{ $product->title }}
            </a>
            <p class="c-card--date">
                {{ $product->created_at->format('Y/n/j') }}
            </p>
        </div>
    
        <div class="c-card--wrapper l-row l-row--between">
            <div class="l-row l-row--middle">
                <a href="{{ route('users.show', ['name' => $product->user->name]) }}">
                    
                @if(!$product->user->prof_photo) 
                    <i class="fas fa-user-circle fa-2x c-card--userCircle"></i>
                @endif 

                @if($product->user->prof_photo)
                    <img 
                    class="c-card--userPic"
                    src="{{ $product->user->prof_photo}}" alt="">
                @endif
                   
                </a> 
             
                <a class="c-card--userName"
                    href="{{ route('users.show', ['name' => $product->user->name]) }}">
                    {{ $product->user->name }}
                </a>  
            </div>
        </div>

        <div class="c-card--wrapper">
            <div class="tag-container">
                @foreach ($product->tags as $tag)
                    @if($loop->first)
                    <div>
                        <div>
                    @endif
                        <a 
                        class="c-card--tag"
                        href="{{ route('tags.show', ['name' => $tag->name]) }}">
                                {{ $tag->hashtag}}
                            </a>
                    @if($loop->last)
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="l-row l-row--middle c-card--like">
                <product-like
                :initial-is-liked-by='@json($product->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($product->count_likes)'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('products.like', ['product' => $product]) }}"
                >
                </product-like>
        </div>

        <!-- 自分の投稿した記事のみ表示される -->
        @if(Auth::id() === $product->user_id)
        <div class="l-row l-row--end">
            <div  class="">
                <ul class="l-row">
                    <li class="c-edit--item">
                        <a 
                        class="c-edit--product"
                        href="{{ route('products.edit', ['product'=> $product]) }}">
                            Edit
                        </a>
                    </li>
                        
                    <li class="c-edit--item">
                        <form method="POST" action="{{ route('products.destroy', ['product' => $product]) }}">
                            @csrf
                            @method('DELETE')
                            <modal
                            delete-data-name="{{ $product->title ?? '' }}"
                            >
                            </modal>
                        </form>
                    </li>
                </ul>
                </div>
            </div>
        @endif
    </div>