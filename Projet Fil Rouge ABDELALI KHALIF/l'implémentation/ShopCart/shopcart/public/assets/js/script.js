const slide = document.querySelector('.slide')
const option = document.querySelectorAll('.option img')

option.forEach((image) => {
    image.addEventListener('click', () => {
        slide.querySelector('img').src = image.src
        // console.log(image.src);
    })
})


