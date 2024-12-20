/******/ (() => { // webpackBootstrap
/*!*****************************************!*\
  !*** ./resources/js/comment/comment.js ***!
  \*****************************************/
$(document).ready(function () {
  $('.btn-comment').on('click', function () {
    var url = 'http://127.0.0.1:8000/api/comment/create-api';
    var user_id = $('#user_id').data('user-id');
    var idea_id = $(this).data('comment-id');
    var comment = $('textarea[data-comment-id="' + idea_id + '"]').val();
    $.ajax({
      url: url,
      type: "POST",
      data: {
        user_id: user_id,
        idea_id: idea_id,
        comment: comment,
        _token: $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(response) {
        location.reload();
      },
      error: function error(xhr) {
        location.reload();
      }
    });
  });
});
/******/ })()
;