<div class="l-photo--form">
    <div class="c-photo--input">
        <div class="c-photo--block">
            <img-view
            select-pic-first="pic1"
            img-data-first="{{ $product->pic1 ?? '' }}"
            >
            </img-view>
            <span class="c-photo--imgNum">Image_1</span>
            
        </div>
        <div class="c-photo--block">
            <img-view
            select-pic-second="pic2"
            img-data-second="{{ $product->pic2 ?? '' }}"
            >
            </img-view>
            <span class="c-photo--imgNum">Image_2</span>
        </div>
        <div class="c-photo--block">
            <img-view
            select-pic-third="pic3"
            img-data-third="{{ $product->pic3 ?? '' }}"
            >
            </img-view>
            <span class="c-photo--imgNum">Image_3</span>
        </div>
        
    </div>
</div>