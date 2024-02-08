$(document).ready(function () {
    $('.add-material').on('click', function () {
        let materialBlock = $(this).parents('.product-material').find('.product-material-block').last()
        let clonedMaterialBlock = $(materialBlock).clone()

        $(clonedMaterialBlock).find('select').val(0)
        $(clonedMaterialBlock).find('input').val(1)

        $(clonedMaterialBlock).clone().insertAfter($(this).parents('.product-material').find('.product-material-block').last());
    })

    $('.add_product').on('click', function () {
        $.ajax({
            url: '/catalog/add_product.php',
            method: 'post',
            dataType: 'json',
            data: $(this).parent('.card').serializeArray(),
            success: function (data) {
                $('#orderModalText').text(data.response);
            }
        });

        console.log($(this).parent('.card').serializeArray())
    })

    $('#close').on('click', function () {
        location.reload();
    })
});