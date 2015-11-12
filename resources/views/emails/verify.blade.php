<h1>Obrigado por te registares, {{ $user }}!</h1>

<p>Para concluíres a ativação da tua conta basta acederes a este link: {{ url('verify/' . $token) }}.</p>