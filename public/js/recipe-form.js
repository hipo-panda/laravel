document.addEventListener("DOMContentLoaded", function () {
    const registerButton = document.querySelector("#sendDataButton");

    registerButton.addEventListener("click", function (e) {
        const fileInput = document.querySelector("#recipe-img");
        const file = fileInput.files[0];
        const formData = new FormData();

        formData.append(
            "board_title",
            document.querySelector("#recipe-title").value
        );
        formData.append(
            "board_content",
            document.querySelector("#recipe-introduction").value
        );
        formData.append(
            "board_ingredients",
            document.querySelector("#recipe-ingredient").value
        );
        formData.append(
            "board_cooking_orders",
            document.querySelector("#recipe-order").value
        );
        formData.append(
            "board_category",
            document.querySelector("#recipe-category").value
        );
        formData.append(
            "board_tags",
            document.querySelector("#recipe-tags").value
        );

        // 파일 추가
        if (file) {
            formData.append("board_image", file, file.name); // 파일, 파일 이름 추가
        }

        console.log(formData);
        // ... (나머지 필드도 추가)

        // 서버에 데이터 전송
    });
});
