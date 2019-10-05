$('table[data-form="deleteForm"]').on('click', '.form-delete', function (e) {
    e.preventDefault();
    var $form = $(this);
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function () {
            $form.submit();
        });
});

$('.navbar-nav li a').click(function () {
    $('.navbar-nav li a').removeClass('active');
    $(this).addClass('active');
})