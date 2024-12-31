import { EmojiButton } from "@joeattardi/emoji-button";
import { forEach } from "lodash";

const picker = new EmojiButton();
const trigger = document.querySelector(".trigger");

picker.on("emoji", (selection) => {});

trigger.addEventListener("click", () => picker.togglePicker(trigger));

$(document).ready(function () {
    const imageInput = $("#images");
    const previewContainer = $("#preview-container");

    // Lắng nghe sự kiện chọn file
    imageInput.on("change", function (event) {
        const files = event.target.files;

        // Kiểm tra nếu có file được chọn
        if (files && files.length > 0) {
            $.each(files, function (index, file) {
                const fileURL = URL.createObjectURL(file);

                // Xác định kiểu cột (col-md-12 nếu tổng số ảnh là 1, col-md-6 nếu >= 2 ảnh)
                const currentImages = previewContainer.children(".col-md-6, .col-md-12").length;
                const columnClass = currentImages + 1 === 1 ? "col-md-12" : "col-md-6";

                // Tạo phần tử chứa ảnh
                const imageWrapper = $("<div>", {
                    class: `${columnClass} mb-1`,
                    css: {
                        position: "relative",
                    },
                });

                // Tạo thẻ img
                const img = $("<img>", {
                    class: "w-100",
                    src: fileURL,
                    alt: file.name,
                });

                // Tạo nút X
                const deleteBtn = $("<button>", {
                    text: "X",
                    class: "btn btn-sm delete-btn",
                    css: {
                        position: "absolute",
                        top: "0px",
                        right: "12px",
                        zIndex: 10,
                    },
                });

                // Thêm sự kiện xóa ảnh
                deleteBtn.on("click", function () {
                    imageWrapper.remove();

                    // Cập nhật class cột (kiểm tra lại tổng số ảnh sau khi xóa)
                    const remainingImages = previewContainer.children(".col-md-6, .col-md-12");
                    remainingImages.removeClass("col-md-12 col-md-6");
                    remainingImages.each(function (i, elem) {
                        const newClass = remainingImages.length === 1 ? "col-md-12" : "col-md-6";
                        $(elem).addClass(newClass);
                    });
                });

                // Gắn img và nút X vào wrapper, sau đó thêm vào container
                imageWrapper.append(img).append(deleteBtn);
                previewContainer.append(imageWrapper);
            });
        }
    });

    $("#submit-idea").on("click", function () {
        const ideaContent = $("#idea").val();
        const files = $("#images")[0].files;
        let images = [];
        const url = $("#create-idea").data("url-idea");

        // Chuyển các file hình ảnh sang Base64
        $.each(files, function (index, file) {
            const reader = new FileReader();
            reader.onloadend = function () {
                images.push(reader.result);
                if (images.length === files.length) {
                    sendIdeaRequest(ideaContent, images, url);
                    $("#idea").val(""); // Reset content
                    $("#images").val("");
                }
            };
            reader.readAsDataURL(file);
        });

        if (files.length === 0) {
            sendIdeaRequest(ideaContent, images, url);
        }
    });

    function sendIdeaRequest(ideaContent, images, url) {
        $.ajax({
            url: url,
            type: "POST",
            data: {
                idea: ideaContent,
                images: images,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                    alert("Đăng bài thành công!");
                    window.location = '/' 
                
            },
            error: function (xhr, status, error) {
                console.error("Error: ", error);
                alert("Failed to create idea");
            },
        });
    }
    
});

