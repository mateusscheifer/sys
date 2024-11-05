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
    }).catch((error) => console.error('Erro ao enviar dados:', error));
})();
