$(document).ready(function(){
	HoverEditUserBar();
	$(document).ready(function (e){
		$(".img-form").on('submit',(function(e){
			e.preventDefault();
			$.ajax({
				url: "../../controllers/Upload.php",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
					console.log('vava');
				},
				error: function(){
					console.log('nel');
				} 	        
			});
		}));
	});
});
function HoverEditUserBar(){
	$(".Insport-frame").hover(function(){
		if($(".play-footer:first").is(":hidden")){
			$(".play-footer").fadeIn(100);
		}
	},function(){
		if($(".play-footer:first").is(":visible")){
			$(".play-footer").fadeOut(100);
		}
	});
}