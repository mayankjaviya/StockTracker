window.displaySuccessMessage = (message) => {
    $('.toast').addClass('bg-success')
    displayToastMessage(message)
}

window.displayErrorMessage = (message) => {
    $('.toast').addClass('bg-danger')
    displayToastMessage(message)

}

$('.toast').addEventListener('hidden.bs.toast', function () {
    console.log('sf')
    $(this).removeClass('bg-danger bg-success');
})

window.displayToastMessage = (message) => {
    $('.toast-body').text(message);
    $('.toast').toast('show');
}

$('.modal').on('hidden.bs.modal', function () {
    $(this).find('input').val('')
    $(this).find('form')[0].reset();
});
