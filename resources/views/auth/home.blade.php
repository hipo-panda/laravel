<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/searchbox.css') }}">



</head>
<body>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>


    <x-app-layout>
	<div class="tm-container-fluid">

            <div class="tm-title">
                <h1>RECIPES FOR YOU</h1>
                <h2>오늘은 무슨 요리를 할까요?</h2>
            </div>

            <div class="recomended-container">
                <div class="left-block">
                    <a href="{{ route('board.show', ['board_id' => $boards->first()->board_id]) }}">
                    <img src="{{ asset('storage/images/' . $boards->first()->board_image) }}" alt="Large Image">
                    </a>
                </div>
                <div class="right-block">
                    @foreach($boards->slice(1, 4) as $board)
                        <img src="{{ asset('storage/images/' . $board->board_image) }}" alt="{{ $board->board_title }}">

                    @endforeach
                </div>
              </div>

              <div class="tm-title">
                <h1>OUR RECIPES</h1>
                <h2>오늘의 미반을 골라보세요!</h2>
            </div>

		<div class="tm-gallery-section tm-mb-80">

			<div class="tm-gallery">

                @foreach($boards as $board)
                <div class="tm-gallery-item city portraits">
                    <a href="{{ route('board.show', ['board_id' => $board->board_id]) }}">
                        <img src="{{ asset('storage/images/' . $board->board_image) }}" alt="{{ $board->board_title }}" class="img-fluid" />
                    </a>
                    <h2>{{ $board->board_title }}</h2>
                </div>
                 @endforeach




			</div>
		</div>


	</div>
</x-app-layout>

	<script src="js/jquery.min.js"></script>
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script>
		$(function(){
		  	// Init the image gallery
		  	var $gallery = $(".tm-gallery").isotope({
		    	itemSelector: ".tm-gallery-item",
		    	layoutMode: "fitRows"
		  	});

		  	// Layout Isotope after each image loads
		  	$gallery.imagesLoaded().progress(function() {
		    	$gallery.isotope("layout");
		  	});

		  	$(".filters-button-group").on("click", "a", function(e) {
		  		e.preventDefault();
			    var filterValue = $(this).attr("data-filter");
			    $gallery.isotope({ filter: filterValue });
			    $('.filters-button-group a').removeClass('active');
			    $(this).addClass('active');
			});

		  	// Magnific Pop up
		  	$('.tm-gallery').magnificPopup({
		  		delegate: 'a',
			  	type: 'image',
				  gallery: { enabled: true }
			});
		});
	</script>
</body>
</html>
