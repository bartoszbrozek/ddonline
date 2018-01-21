$(".askRemoveCharacter").on('click', function () {
    // Clear path first
    $("#removeCharacterConfirm").attr('href', '');

    // Set new path
    var path = $(this).attr('data-path');
    $("#removeCharacterConfirm").attr('href', path);
});