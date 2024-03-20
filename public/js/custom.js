
// Page Transaction
$(document).ready(function () {

    updateMinusStatus();

    $('.plus').click(function (e) {
        e.preventDefault();
        var card = $(this).closest('.card-body');
        var harga = card.find('.price').val();
        var qtyInput = card.find('.qty');
        var qty = parseInt(qtyInput.val()) + 1;

        qtyInput.val(qty);
        card.find('.total').val(harga * qty);

        updateMinusStatus();
    });


    $('.minus').click(function (e) {
        e.preventDefault();
        var card = $(this).closest('.card-body');
        var harga = card.find('.price').val();
        var qtyInput = card.find('.qty');
        var qty = parseInt(qtyInput.val()) - 1;

        if (qty < 1) {
            qty = 1;
        }

        qtyInput.val(qty);
        card.find('.total').val(harga * qty);

        updateMinusStatus();
    });

    $('.card-body').each(function () {
        var card = $(this);
        var harga = card.find('.price').val();
        var qty = card.find('.qty').val();
        var total = parseInt(harga) * parseInt(qty);

        card.find('.total').val(total);
    });

    function updateMinusStatus() {
        $('.minus').each(function () {
            var qty = $(this).closest('.card-body').find('.qty').val();
            if (qty <= 1) {
                $(this).attr('disabled', 'disabled');
            } else {
                $(this).removeAttr('disabled');
            }
        });
    }
});



// Page Checkout
$(document).ready(function () {

    recalculateTotal();
    $('.shipping').val(0);

    $('#expedition').change(function () {
        var selectedExpedition = $(this).val();
        var shippingCost = 0;

        switch (selectedExpedition) {
            case 'jnt':
                shippingCost = 10000;
                break;
            case 'jne':
                shippingCost = 12000;
                break;
            case 'sicepat':
                shippingCost = 9000;
                break;
            case 'ninja':
                shippingCost = 15000;
                break;
            default:
                shippingCost = 0;
        }


        $('.shipping').val(shippingCost);


        recalculateTotal();
    });

    function recalculateTotal() {
        $('.payment').each(function () {
            var card = $(this);
            var subtotal = parseInt(card.find('.subtotal').val()) || 0;
            var total_tax = subtotal * 0.11;
            card.find('.tax').val(total_tax);
            var discount = parseFloat(card.find('.discount').val()) || 0;
            var total_discount = subtotal * discount;
            var shipping = parseInt(card.find('.shipping').val()) || 0;

            var total_spending = subtotal + total_tax - total_discount + shipping;
            card.find('.total').val(total_spending);
        });
    }
});

