
$(document).ready(function(){
	var id = $('.post_item').attr('data-id');
 	function resetComment(){
 		$.post('/comments/comment/'+id, {}, function(data) {
			$('#comment_block').html(data);
		});
		setTimeout(resetComment, 1000);
 	}
 resetComment();
	$('.submit_com').click(function(){
		console.log(id);
		var text = $("#first").val();
		console.log(text);
			if(text!=''){
		       $.ajax({
                type: "POST",
                url: "/comments/setcomment/"+id,
                data: "text="+text,
        	});
		    $('#comment_block'+id).load('comments/comment/'+id);
		   }
		   $('.comment_block').scrollTop(999);
		   $("#first"+id).val(null);
		});
});

