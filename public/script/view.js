(function() {
    const pageUrl = encodeURIComponent(window.location.href);
    const pageTitle = encodeURIComponent(document.title);

    fetch('http://127.0.0.1:8000/api/capturar-info', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            url: pageUrl,
            title: pageTitle
        })
    }).then((data)=>{
            createAudioPlayer('http://127.0.0.1:8000/streamAudio')
    }).catch((error) => console.error('Erro ao enviar dados:', error));

    const createAudioPlayer = (audioUrl) => {

        const playerContainer = document.getElementById('player-audio-system');
        if (!playerContainer) {
            console.error('Elemento com id "player-audio-system" não encontrado');
            return;
        }

        // Cria o elemento de áudio
        const audioPlayer = document.getElementById('player-audio-system');
        audioPlayer.innerHTML = `
            <audio id="audio" src="${audioUrl}" preload="metadata"></audio>

             <div style="width: 100%; padding: 40px;margin-bottom: 40px; border: 1px solid #000000; border-radius: 14px">
                 <div style="display: flex; gap: 1rem;">
                    <img src="https://img.freepik.com/free-psd/square-flyer-template-maximalist-business_23-2148524497.jpg?w=1800&t=st=1699458420~exp=1699459020~hmac=5b00d72d6983d04966cc08ccd0fc1f80ad0d7ba75ec20316660e11efd18133cd"
                         alt=""
                         width="88"
                         height="88"
                         style="flex-shrink: 0; border-radius: 0.5rem; background-color: #f1f5f9;margin: 0; padding: 0"
                         loading="lazy" />

                    <div style="min-width: 0; flex-grow: 1; font-weight: 600;">
                        <p style="color: #0d9488; font-size: 14px; margin: 0;">
                           Track: 05
                        </p>
                        <h2 style="color: #64748b; font-size: 14px; line-height: 1.5; margin: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            Music: New Album The Lorem
                        </h2>
                        <p style="color: #111827; font-size: 18px; margin: 0;">
                            Spotisimo
                        </p>
                    </div>
                </div>

                <div>
                    <input
                        type="range"
                        id="progress-bar"
                        style="width: 100%; cursor:pointer; margin: 0; padding: 0 "
                        value="0"
                        min="0"
                        max="100"
                    />
                    <div style="display: flex; justify-content: space-between; font-size: 14px;">
                        <div id="current-time" style="color: rgb(6 182 212)">0:00</div>
                        <div id="duration" style="color: rgb(6 182 212 )">0:00</div>
                    </div>
                </div>


                <div class="rounded-b-xl flex items-center">
                <div style="background: rgb(248 250 252); color: rgb(100 116 139);border-bottom-right-radius: 12px;border-bottom-left-radius: 12px;
                            display: flex; align-items: center; ">
                    <div style="flex: 1 1 auto; display: flex;align-items: center;justify-content: space-evenly;">
                        <button id="rewind" type="button" aria-label="Rewind 10 seconds" style="color:black;margin: 0;padding: 0;background: none; border: none; :hover{background: none}">
                            <svg width="24" height="24" fill="none">
                                <path d="M6.492 16.95c2.861 2.733 7.5 2.733 10.362 0 2.861-2.734 2.861-7.166 0-9.9-2.862-2.733-7.501-2.733-10.362 0A7.096 7.096 0 0 0 5.5 8.226" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5 5v3.111c0 .491.398.889.889.889H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <button id="play-pause" type="button" style="border:1px solid #2d3748;background: white; display: flex; justify-content: center;align-items: center;align-content: center;
                        width: 89px; height: 80px; border-radius: 1000px" aria-label="Pause">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"> <polygon points="5,3 19,12 5,21" fill="black"/> </svg>
                    </button>
                    <div style="flex: 1 1 auto; display: flex;align-items: center;justify-content: space-evenly;">
                        <button id="forward" type="button" aria-label="Skip 10 seconds"  style="color:black;margin: 0;padding: 0;background: none; border: none; :hover{background: none}">
                            <svg width="24" height="24" fill="none">
                                <path d="M17.509 16.95c-2.862 2.733-7.501 2.733-10.363 0-2.861-2.734-2.861-7.166 0-9.9 2.862-2.733 7.501-2.733 10.363 0 .38.365.711.759.991 1.176" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M19 5v3.111c0 .491-.398.889-.889.889H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div class="flex items-center justify-between">
                            <select id="playback-rate" class="  rounded ">
                                <option value="0.5">0.5x</option>
                                <option value="1" selected>1x</option>
                                <option value="1.5">1.5x</option>
                                <option value="2">2x</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        `;





        const audio = document.getElementById('audio');
        const playPauseButton = document.getElementById('play-pause');
        const rewindButton = document.getElementById('rewind');
        const forwardButton = document.getElementById('forward');
        const progressBar = document.getElementById('progress-bar');
        const currentTimeLabel = document.getElementById('current-time');
        const durationLabel = document.getElementById('duration');
        const volumeBar = document.getElementById('volume-bar');
        const volumeDownButton = document.getElementById('volume-down');
        const volumeUpButton = document.getElementById('volume-up');
        const playbackRateSelector = document.getElementById('playback-rate');

        if (playPauseButton && audio) {
            playPauseButton.addEventListener('click', () => {
                if (audio.paused) {
                    audio.play();
                    playPauseButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"> <rect x="6" y="4" width="4" height="16" fill="black"/> <rect x="14" y="4" width="4" height="16" fill="black"/> </svg>'
                } else {
                    audio.pause();
                    playPauseButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"> <polygon points="5,3 19,12 5,21" fill="black"/> </svg>';

                }
            });
        }

        if (rewindButton && audio) {
            rewindButton.addEventListener('click', () => {
                audio.currentTime = Math.max(0, audio.currentTime - 10);
            });
        }

        if (forwardButton && audio) {
            forwardButton.addEventListener('click', () => {
                audio.currentTime = Math.min(audio.duration, audio.currentTime + 10);
            });
        }

        if (audio) {
            audio.addEventListener('loadedmetadata', () => {
                if (durationLabel) {
                    durationLabel.textContent = formatTime(audio.duration);
                }
            });

            audio.addEventListener('timeupdate', () => {
                if (progressBar) {
                    progressBar.value = (audio.currentTime / audio.duration) * 100;
                }
                if (currentTimeLabel) {
                    currentTimeLabel.textContent = formatTime(audio.currentTime);
                }
            });
        }

        if (progressBar && audio) {
            progressBar.addEventListener('input', () => {
                const newTime = (progressBar.value / 100) * audio.duration;
                audio.currentTime = newTime;
            });
        }

        if (volumeBar && audio) {
            volumeBar.addEventListener('input', () => {
                audio.volume = volumeBar.value / 100;
            });
        }

        if (volumeDownButton && volumeBar && audio) {
            volumeDownButton.addEventListener('click', () => {
                volumeBar.value = Math.max(0, volumeBar.value - 10);
                audio.volume = volumeBar.value / 100;
            });
        }

        if (volumeUpButton && volumeBar && audio) {
            volumeUpButton.addEventListener('click', () => {
                volumeBar.value = Math.min(100, volumeBar.value + 10);
                audio.volume = volumeBar.value / 100;
            });
        }

        if (playbackRateSelector && audio) {
            playbackRateSelector.addEventListener('change', () => {
                audio.playbackRate = playbackRateSelector.value;
            });
        }

        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return `${minutes}:${secs < 10 ? '0' + secs : secs}`;
        }
    };

})();
