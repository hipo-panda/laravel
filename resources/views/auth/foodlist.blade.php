<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>
<body>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>


    <x-app-layout>
        <div class="tm-container-fluid">




            <div class="tm-gallery-section tm-mb-80">




                <div class="tm-gallery">

                    @foreach($results as $result)
                    <div class="tm-gallery-item city portraits">
                        <a href="{{ route('board.show', ['board_id' => $result->board_id]) }}">
                            <img src="{{ asset('storage/images/' . $result->board_image) }}" alt="{{ $result->board_title }}" class="img-fluid" />
                        </a>
                        <h2>{{ $result->board_title }}</h2>
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

		  	var $gallery = $(".tm-gallery").isotope({
		    	itemSelector: ".tm-gallery-item",
		    	layoutMode: "fitRows"
		  	});


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


		  	$('.tm-gallery').magnificPopup({
		  		delegate: 'a',
			  	type: 'image',
				  gallery: { enabled: true }
			});
		});
	</script>
</body>
</html>
