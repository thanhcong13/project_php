
$(document).ready(function () {
    $('.btn-comment').on('click', function () {
        let url = 'http://127.0.0.1:8000/api/comment/create-api';
        let user_id = $('#user_id').data('user-id');
        let idea_id = $(this).data('comment-id');
        let comment = $('textarea[data-comment-id="' + idea_id + '"]').val();
       
        $.ajax({
            url: url,
            type: "POST",
            data: {
                user_id: user_id,
                idea_id: idea_id,
                comment: comment,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                location.reload();
            },
            error: function (xhr) {
                location.reload();
            }
        });
    });



})
