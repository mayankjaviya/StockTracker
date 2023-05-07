$('#addShareForm').on('submit', function (e) {
    e.preventDefault()

    $.ajax({
        url: route('shares.store'),
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                $('.modal').modal('hide')
                displaySuccessMessage(result.message)
            }
            livewire.emit('refresh')
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        }
    })
})

