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
			<ul class="filters-button-group tm-mb-40">
				<li><a href="#" data-filter=".city">한식</a></li>
				<li><a href="#" data-filter=".nature">중식</a></li>
				<li><a href="#" data-filter=".portraits">양식</a></li>
				<li><a href="#" class="active" data-filter="*">Show All</a></li>
			</ul>
			<div class="tm-gallery">

                @foreach($boards as $board)
                <div class="tm-gallery-item city portraits">
                    <a href="{{ route('board.show', ['board_id' => $board->board_id]) }}">
                        <img src="{{ asset('storage/images/' . $board->board_image) }}" alt="{{ $board->board_title }}" class="img-fluid" />
                    </a>
                    <h2>{{ $board->board_title }}</h2>
                </div>
                 @endforeach

				<div class="tm-gallery-item city portraits">
		            <a href="img/img-01.jpg">
		            	<img src="stroage/img/tn-img-01.jpg" alt="City Scape" class="img-fluid" />
		            </a>
                    <h2>연어 리스 샐러드</h2>
		        </div>
				<div class="tm-gallery-item portraits">
		            <a href="img/img-02.jpg">
		            	<img src="stroage/img/tn-img-02.jpg" alt="Beautiful Lady" class="img-fluid" />
		            </a>
		        </div>
				<div class="tm-gallery-item city">
		            <a href="img/img-03.jpg">
		            	<img src="stroage/img/tn-img-03.jpg" alt="City over cloud" class="img-fluid" />
		            </a>
		        </div>
		        <div class="tm-gallery-item nature">
		            <a href="img/img-04.jpg">
		            	<img src="stroage/img/tn-img-04.jpg" alt="Autumn Forest" class="img-fluid" />
		            </a>
		        </div>
				<div class="tm-gallery-item city">
		            <a href="img/img-05.jpg">
		            	<img src="stroage/img/tn-img-05.jpg" alt="Skyscrapers Reflected" class="img-fluid" />
		            </a>
		        </div>
				<div class="tm-gallery-item city">
		            <a href="img/img-06.jpg">
		            	<img src="stroage/img/tn-img-06.jpg" alt="City Night" class="img-fluid" />
		            </a>
		        </div>
		        <div class="tm-gallery-item nature portraits">
		            <a href="img/img-07.jpg">
		            	<img src="stroage/img/tn-img-07.jpg" alt="Gallery item" class="img-fluid" />
		            </a>
		        </div>
				<div class="tm-gallery-item nature">
		            <a href="img/img-08.jpg">
		            	<img src="stroage/img/tn-img-08.jpg" alt="Gallery item" class="img-fluid" />
		            </a>
		        </div>
				<div class="tm-gallery-item nature">
		            <a href="img/img-09.jpg">
		            	<img src="stroage/img/tn-img-09.jpg" alt="Gallery item" class="img-fluid" />
		            </a>
		        </div>
		        <div class="tm-gallery-item nature portraits">
		            <a href="img/img-10.jpg">
		            	<img src="stroage/img/tn-img-10.jpg" alt="Gallery item" class="img-fluid" />
		            </a>
		        </div>
				<div class="tm-gallery-item nature">
		            <a href="img/img-11.jpg">
		            	<img src="stroage/img/tn-img-11.jpg" alt="Gallery item" class="img-fluid" />
		            </a>
		        </div>
				<div class="tm-gallery-item portraits">
		            <a href="img/img-12.jpg">
		            	<img src="stroage/img/tn-img-12.jpg" alt="Gallery item" class="img-fluid" />
		            </a>
		        </div>
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
