<?php
return [
    // Specifica i percorsi per i quali le regole CORS si applicano.
    // In questo caso, si applicano a tutte le rotte che iniziano con "api/" e alla rotta "sanctum/csrf-cookie".
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // Definisce i metodi HTTP consentiti per le richieste CORS.
    // L'asterisco indica che tutti i metodi sono consentiti (GET, POST, PUT, DELETE, ecc.).
    'allowed_methods' => ['*'],

    // Specifica gli URL di origine consentiti per le richieste CORS.
    // Qui viene utilizzata una variabile di ambiente `APP_FRONTEND_URL` per definire dinamicamente l'origine consentita.
    'allowed_origins' => [env('APP_FRONTEND_URL')],

    // Permette di definire pattern per le origini consentite tramite espressioni regolari.
    // In questo caso, è vuoto, quindi non ci sono pattern specifici.
    'allowed_origins_patterns' => [],

    // Specifica gli header consentiti nelle richieste CORS.
    // L'asterisco indica che tutti gli header sono consentiti.
    'allowed_headers' => ['*'],

    // Definisce gli header che possono essere esposti al client.
    // In questo caso, è vuoto, quindi nessun header specifico viene esposto.
    'exposed_headers' => [],

    // Imposta il tempo massimo (in secondi) per cui una risposta preflight può essere memorizzata nella cache.
    // Il valore 0 indica che non viene memorizzata nella cache.
    'max_age' => 0,

    // Indica se le richieste CORS possono includere credenziali (cookie, autenticazione HTTP, ecc.).
    // In questo caso, è impostato su `false`, quindi le credenziali non sono supportate.
    'supports_credentials' => false,
];
