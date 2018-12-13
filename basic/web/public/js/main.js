
$('.add-to-cart').on('click', function (e)
{
	e.preventDefault();
	var ID = $(this).data('id');
	$.ajax({
		url: '/cart/add',
		data: {id: ID},
		type: 'GET',
		success: function(res){
			if(!res) alert('Ошибка');
			console.log(res);
			//showCart(res);
		},
		error: function() {
			alert('Error!');
		},
	});
});