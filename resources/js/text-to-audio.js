
    // Função para atualizar a contagem de caracteres
    function updateCharacterCount() {
    const textarea = document.getElementById("gennyTextarea");
    const charCount = document.getElementById("charCount");
    charCount.textContent = `${textarea.value.length} / 180`;
}

    let selectedVoice = ''; // Variável para armazenar a voz selecionada

    // Captura todos os cards de voz e adiciona um evento de clique
    const voiceCards = document.querySelectorAll('[data-voice]');
    voiceCards.forEach(card => {
    card.addEventListener('click', () => {
        // Remove a classe 'bg-primary-700' e 'text-white' de todos os cards
        voiceCards.forEach(c => {
            c.classList.remove('bg-primary-700', 'text-white');
            c.classList.add('bg-gray-100'); // Define a cor padrão
        });

        // Adiciona a classe 'bg-primary-700' e 'text-white' ao card clicado
        card.classList.add('bg-primary-700', 'text-white');
        card.classList.remove('bg-gray-100'); // Remove a cor padrão

        // Atualiza a voz selecionada
        selectedVoice = card.getAttribute('data-voice');
    });
});

    // Evento para o envio do formulário
    document.getElementById("messageFormElement").addEventListener("submit", function (event) {
    event.preventDefault();  // Previne o comportamento padrão do formulário

    const textarea = document.getElementById("gennyTextarea");
    const loadingSpinner = document.getElementById("loadingSpinner");

    // Verifica se uma voz foi selecionada
    if (!selectedVoice) {
    alert('Por favor, selecione uma voz.');
    return;
}

    // Verifica se o textarea está vazio
    if (textarea.value.trim() === "") {
    alert('Por favor, insira um texto.');
    return;
}

    loadingSpinner.classList.remove("hidden"); // Exibe o spinner de carregamento

    // Simula o envio de dados para a API
    fetch('https://exemplo.com/api/converter-audio', { // Substitua pela sua API real
    method: 'POST',
    headers: {
    'Content-Type': 'application/json'
},
    body: JSON.stringify({
    texto: textarea.value,  // Texto digitado pelo usuário
    voz: selectedVoice      // Voz escolhida pelo usuário
})
})
    .then(response => response.json())
    .then(data => {
    loadingSpinner.classList.add("hidden"); // Esconde o spinner

    // Configura o player de áudio com a URL retornada pela API
    const audioPlayer = document.getElementById("audioPlayer");
    const audio = new Audio(data.audioUrl); // Supondo que a URL do áudio seja retornada

    audioPlayer.classList.remove('hidden'); // Exibe o player de áudio

    // Configura o botão Play/Pause
    let isPlaying = false;
    document.getElementById('playButton').addEventListener('click', () => {
    if (isPlaying) {
    audio.pause();
    isPlaying = false;
} else {
    audio.play();
    isPlaying = true;
}
});

    // Atualiza o tempo de reprodução
    audio.addEventListener('timeupdate', () => {
    const minutes = Math.floor(audio.currentTime / 60);
    const seconds = Math.floor(audio.currentTime % 60);
    document.getElementById('audioDuration').textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
});
})
    .catch(error => {
    loadingSpinner.classList.add("hidden"); // Esconde o spinner em caso de erro
    console.error('Erro ao converter o texto para áudio:', error);
    alert('Ocorreu um erro ao processar seu pedido. Tente novamente.');
});
});
