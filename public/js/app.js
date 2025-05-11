const nextButton = document.querySelector('.next-btn');
const video = document.querySelector('.gadget-video');

const movieList = ['videos/blackpink.mp4', 'videos/bts.mp4', 'videos/dell.mp4', 'videos/newjeans.mp4',];

let index = 0;
nextButton.addEventListener('click', function(){

    index += 1
    video.src = movieList[index];

    if (index === 3){
        index = -1;
    }
})
