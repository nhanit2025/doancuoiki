document.querySelectorAll('.product-item').forEach(item => {
    item.addEventListener('mouseenter', () => {
        const hoverImg = item.querySelector('.img-hover');
        if (hoverImg) hoverImg.style.display = 'block';
    });
    item.addEventListener('mouseleave', () => {
        const hoverImg = item.querySelector('.img-hover');
        if (hoverImg) hoverImg.style.display = 'none';
    });
});

document.querySelectorAll('.product-item .icon.add').forEach(icon => {
    icon.addEventListener('click', e => {
        const id = icon.dataset.id;
        alert("Thêm sản phẩm ID: " + id + " vào giỏ hàng");
        e.preventDefault();
    });
});
