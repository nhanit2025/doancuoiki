document.addEventListener("DOMContentLoaded", () => {

    console.log("ADD.JS ĐÃ LOAD");

    document.querySelectorAll(".icon.add").forEach(btn => {

        btn.addEventListener("click", e => {
            e.preventDefault();
            e.stopImmediatePropagation();

            const id = btn.dataset.id;

            fetch("/AW_Web/pages/main/ajax_add_to_cart.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "id_product=" + encodeURIComponent(id)
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert(" Thêm sản phẩm thành công!");
                } else {
                    alert(" Thêm thất bại!");
                }
            })
            .catch(() => {
                alert(" Lỗi kết nối!");
            });

        });

    });

});
