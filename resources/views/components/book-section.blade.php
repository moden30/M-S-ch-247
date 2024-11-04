<div class="book-section" style="position: relative">
    <!-- preview button -->

    <img class="slideToRight"
         id="preSachMienPhi"
         src="{{asset('/assets/client/angle-small-right.png')}}"
         alt=">"
         data-section="section-{{$sectionId}}"
    >
    <h1 class="mt-2 ms-4 heading-lg" style="font-weight: bold; font-size: 32px">{{$heading}}</h1>
    <hr style="margin:0 3px 0 3px">
    <div class="book-container-wrapper">
        <div class="book-container" data-section="section-{{$sectionId}}">
            @foreach ($books as $book)
                <x-book :book="$book" />
            @endforeach
        </div>
    </div>
    <!-- next button -->


{{--    <button class="next">&#10095;</button>--}}
    <img class="text-center mt-3 slideToLeft"
         src="{{asset('/assets/client/angle-small-left.png')}}"
         alt="<"
         data-section="section-{{$sectionId}}"
         id="preSachMienPhi"
    >
</div>
