function playVideo(obj) {
    let parent = obj.parentNode;
    let youtubeVideo = parent.querySelector('.youtube-video');
    let image = parent.querySelector('.embed-cover');

    if (image.classList.contains('d-none')) {
        obj.classList.remove('invisible');
        image.classList.remove('d-none');
        youtubeVideo.classList.add('d-none');
    } else {
        obj.classList.add('invisible');
        image.classList.add('d-none');
        youtubeVideo.classList.remove('d-none');
    }
}
