$('.counter .plus').on('click', function () {
    const $input = $(this).parent().find('input');
    const val = parseInt($input.val());
    $input.val(val + 1);
    const $link = $(this).parent().parent().find('.cart-link');
    const url = $link.data('url');
    $link.attr('href', url + '&amount=' + (val + 1));
});
$('.counter .minus').on('click', function () {
    const $input = $(this).parent().find('input');
    const val = parseInt($input.val());
    if (val > 1) {
        $input.val($input.val() - 1);
        const $link = $(this).parent().parent().find('.cart-link');
        const url = $link.data('url');
        $link.attr('href', url + '&amount=' + (val - 1));
    }
});
