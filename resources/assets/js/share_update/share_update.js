
$('.filterByShare').select2({
    width:'100%',
    placeholder:'Select any option'
});

$('#filterByShare').on('change',function(){
    livewire.emit('shareFilter',$(this).val())
})
