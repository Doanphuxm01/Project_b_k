$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $('.edit').click(function () {
        $('.error').hide();
        let id = $(this).data('id');
        //Edit
        $.ajax({
            url: 'admin/list/' + id + '/edit',
            dataType: 'json',
            type: 'GET',
            success: function ($result) {
                console.log($result);
                $('.name').val($result.name);
                $('#title').text($result.name);
                $('.quantity').val($result.quantity);
                $('.price').val($result.price);
                $('.promotional').val($result.promotional);
                if ($result.status == 1) {
                    $('.ht').attr('selected', 'selected');
                } else {
                    $('.kht').attr('selected', 'selected');
                }
            }
        });
        $('.update').click(function () {
            let name = $('.name').val();
            let avatar = $('.avatar').val();
            let description = $('.description').val();
            let quantity = $('.quantity').val();
            let price = $('.price').val();
            let promotional = $('.promotional').val();
            $.ajax({
                type: 'PUT',
                dataType: 'json',
                data: {
                    name: name,
                    avatar: avatar,
                    quantity: quantity,
                    price: price,
                    promotional: promotional,
                },
                url: 'admin/list/' + id,
                success: function ($result) {
                    console.log($result);
                    if ($result.error == 'true') {
                        $('.error').show();
                        $('.error').text($result.message.name);
                        // if ($result.error == 'true') {
                        // 	$('.error1').text($result.message.avatar);
                        // }
                        // if ($result.error == 'true') {
                        // 	$('.error2').text($result.message.quantity);
                        // }
                        // if ($result.error == 'true') {
                        // 		$('.error3').text($result.message.price);
                        // }
                        // if ($result.error == 'true') {
                        // 		$('.error4').text($result.message.promotional);
                        // }

                    } else {
                        toastr.success($result.success, 'Thông báo', {timeOut: 10000});
                        $('#edit').modal('hide');
                        // location.reload(false);
                        // window.location.reload();
                        history.go(0);
                    }

                }
            });
        });
    });
    // delete bang ajax
    $('.delete').click(function () {
        let id = $(this).data('id');
        $('.del').click(function () {
            let data = $('.from').serialize();
            $.ajax({
                url: 'admin/list/' + id,
                dataType: 'json',
                type: 'delete',
                success: function ($result) {
                    toastr.success($result.success, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    // location.reload();
                }
            });
        });
    });
});
