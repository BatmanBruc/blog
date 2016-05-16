$(document).ready(function(){


	function getLucas(){

		$.post('/lucas/resluc', {}, function(data) {
			var arr = JSON.parse(data);
			var count_obj = arr.length;
			for(var i=0; i < count_obj; i++){
				$('#count_luc'+arr[i].id).html(arr[i].lucs);
			}

			
		});	
		setTimeout(getLucas, 1000);
	}

	



getLucas();
	$('.img-luc').click(function(){
		var id = $(this).attr('data-id');
		$.post('/lucas/luc/'+id, {}, function(data) {
			$('#count_luc'+id).html(data);
		});
	});

});
