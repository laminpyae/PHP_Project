$(document).ready(function() {
	cartNoti();
	showTable();

	// Store Data to Local Storage
	$('.addtocart').on('click', function() {
		var id = $(this).data('id');
		var codeno = $(this).data('codeno');
		var name = $(this).data('name');
		var photo = $(this).data('photo');
		var price = $(this).data('price');
		var discount = $(this).data('discount');
		var item = {
			id : id,
			codeno : codeno,
			name : name,
			photo : photo,
			price : price,
			discount : discount,
			qty : 1
		};

		var shop_str = localStorage.getItem('shop_list');
		var shop_arr;
		if (shop_str) {
			shop_arr = JSON.parse(shop_str);
		}
		else {
			shop_arr = Array();
		}

		var status = false;
		$.each(shop_arr, function(i,v) {
			if (id == v.id) {
				status = true;
				v.qty++;
			}
		})

		if (!status) {
			shop_arr.push(item);
		}

		var shop_data = JSON.stringify(shop_arr);
		localStorage.setItem('shop_list', shop_data);
		cartNoti();
	})

	// Show Noti Count in Nav Bar
	function cartNoti() {
		var shop_str = localStorage.getItem('shop_list');
		if (shop_str) {
			var shop_arr = JSON.parse(shop_str);
			var count = 0;
			$.each(shop_arr, function(i,v) {
				var qty = v.qty;
				count += qty;
			})

			$('.cartnoti').html(count);
		}
		else {
			$('.cartnoti').html('');
		}
	}

	// Show Data from localstorage and display with table
	function showTable() {
		var shop_str = localStorage.getItem('shop_list');
		if (shop_str) {
			var shop_arr = JSON.parse(shop_str);
			var num = 1;
			var total = 0;
			var html = '';
			$.each(shop_arr, function(i,v) {
				var price = v.price;
				var qty = v.qty;
				var subtotal = price * qty;
				total += subtotal;

				html += `<tr>
						<td> ${num++} </td>
						<td> ${v.name} </td>
						<td> <img src="${v.photo}" width="150px" height="150px" alt=""> </td>
						<td> ${v.price} </td>
						<td><button class="minus btn" style="cursor: pointer;" data-id="${i}"> - </button> ${v.qty} <button class="plus btn" style="cursor: pointer;" data-id="${i}"> + </button> </td>`;
						if (v.discount > 0) {
							html += `<h5 class="text-danger"> ${v.discount} MMK </h5>
									<p class="font-weight-lighter"><del> ${price} </del></p>`;
						}
						else {
							html += `<h5 class="text-danger"> ${price} MMK </h5>`;
						}
				html += `<td> ${subtotal} </td>`;
			})
			html += `<tr>
					<td><h5> Total Amount </h5></td>
					<td  colspan="5"><h5> ${total} MMK </h5></td>
					</tr>
					<tr>
					<td> Notes </td>
					<td colspan="4">
					<textarea id="notes" class="form-control"></textarea>
					</td>
					<td><button class="btn btn-primary btn-block btnCheckout mt-2 py-2" data-total=${total} style="cursor: pointer;"> Check Out </button></td></td>
					</tr>`;
			$('#tbody').html(html);
		}
		else {
			$('#tbody').html(html);
		}
	}

	// Add Quantity
	$('#tbody').on('click', '.plus', function() {
		var id = $(this).data('id');
		var shop_str = localStorage.getItem('shop_list');
		if (shop_str) {
			var shop_arr = JSON.parse(shop_str);
			$.each(shop_arr, function(i,v) {
				if (i == id) {
					v.qty++;
				}
			})
			var shop_data = JSON.stringify(shop_arr);
			localStorage.setItem('shop_list', shop_data);
			cartNoti();
			showTable();
		}
	})

	// Sub Quantity
	$('#tbody').on('click', '.minus', function() {
		var id = $(this).data('id');
		var shop_str = localStorage.getItem('shop_list');
		if (shop_str) {
			var shop_arr = JSON.parse(shop_str);
			$.each(shop_arr, function(i,v) {
				if (i == id) {
					v.qty--;
					if (v.qty == 0) {
						shop_arr.splice(id, 1);
					}
				}
			})
			shop_data = JSON.stringify(shop_arr);
			localStorage.setItem('shop_list', shop_data);
			cartNoti();
			showTable();
		}
	})

	// Checkout and Clear Localstorage
		$('#tbody').on('click', '.btnCheckout', function() {
			var note = $('#notes').val();
			var total = $(this).data('total');

			var shop_str = localStorage.getItem('shop_list');
			var shop_arr = JSON.parse(shop_str);
			
			$.post('storeorder.php', {
				cart : shop_arr,
				note : note,
				total : total
			}, function(response)
			{
				// Clear Localstorage
				localStorage.clear();
				location.href = "ordersuccess.php";
			});
		})
})