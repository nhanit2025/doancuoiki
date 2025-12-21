document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll('.icon.add').forEach(function(btn) {

        btn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const id = this.dataset.id;

            fetch("pages/main/ajax_add_to_cart.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "id=" + id
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert("Đã thêm sản phẩm vào giỏ hàng 🛒");
                } else {
                    alert("Lỗi thêm giỏ");
                }
            });
        });

    });

});
