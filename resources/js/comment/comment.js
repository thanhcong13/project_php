import Echo from "laravel-echo";
import Pusher from "pusher-js";


window.Pusher = Pusher;
// Pusher.logToConsole = true;


window.Echo = new Echo({
    broadcaster: "pusher",
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true,
});

$(document).ready(function () {
    $(".btn-comment").on("click", function () {
        let url = $("#create-comment").data("url");
        let user_id = $("#user_id").data("user-id");
        let idea_id = $(this).data("comment-id");
        let comment = $('textarea[data-comment-id="' + idea_id + '"]').val();

        $.ajax({
            url: url,
            type: "POST",
            data: {
                user_id: user_id,
                idea_id: idea_id,
                comment: comment,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                alert("Bình luận đã được gửi thành công!");
                $('textarea[data-comment-id="' + idea_id + '"]').val("");
            },
            error: function (xhr) {
                alert("Có lỗi xảy ra: " + xhr.responseJSON.message);
            },
        });
    });

    window.Echo.channel("comments").listen(".new-comment", (e) => {
        const newCommentHtml = `
            <div class="d-flex align-items-start">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                    src="${e.user.img}"
                    alt="${e.user.name} Avatar">
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <h6 class="">${e.user.name}</h6>
                        <small class="fs-6 fw-light text-muted">${e.created_at}</small>
                    </div>
                    <p class="fs-6 mt-3 fw-light">
                        ${e.comment}
                    </p>
                </div>
            </div>
        `;
    
        const $commentsContainer = $(`#comments-${e.idea_id}`);
        if ($commentsContainer.length) {
            $commentsContainer.append(newCommentHtml);
        } else {
        }
    });
    
});
