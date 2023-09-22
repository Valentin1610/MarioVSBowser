const playButton = document.getElementById("playButton");
const music = document.getElementById("music");

playButton.addEventListener("click", () => {
    if(music.paused){
        music.play();
        playButton.textContent = 'Pause';
    } else{
        music.pause();
        playButton.textContent = 'Lance';
    }
})