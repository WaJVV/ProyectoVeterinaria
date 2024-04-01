
/*Carrito*/
const btnCart = document.querySelector('.container-icon')
const containerCartProducts = document.querySelector('.container-cart-products')

btnCart.addEventListener('click', () => {
    containerCartProducts.classList.toggle('hidden-cart')
})

/*Rating de los productos*/
const stars = document.querySelectorAll('.star');

stars.forEach((star, index) => {
    star.addEventListener('click', function() {
        const productId = this.parentElement.parentElement.getAttribute('data-id');
        
        // Remover la clase 'selected' de todas las estrellas del mismo producto
        document.querySelectorAll(`.item[data-id="${productId}"] .star`).forEach(s => {
            s.classList.remove('selected');
        });
        
        // Agregar la clase 'selected' a las estrellas seleccionadas
        for (let i = 0; i <= index; i++) {
            this.parentElement.querySelectorAll('.star')[i].classList.add('selected');
        }
    });
});