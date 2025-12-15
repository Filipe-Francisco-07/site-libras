<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

$input = json_decode(file_get_contents('php://input'), true);
$texto = trim($input['texto'] ?? '');

if ($texto === '') {
    echo json_encode(['processado' => []]);
    exit;
}

$apiKey = getenv('OPENAI_API_KEY'); 

$prompt = <<<PROMPT
Reescreva o texto abaixo em português simples.
Use frases curtas.
Separe ideias em linhas diferentes.
Não explique.
Não traduza para LIBRAS.

Texto:
"$texto"
PROMPT;

$data = [
    'model' => 'gpt-4o-mini',
    'messages' => [
        ['role' => 'user', 'content' => $prompt]
    ],
    'temperature' => 0.3
];

$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ],
    CURLOPT_POSTFIELDS => json_encode($data)
]);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$text = $result['choices'][0]['message']['content'] ?? '';

$linhas = array_values(
    array_filter(
        array_map('trim', preg_split("/\r\n|\n|\r/", $text))
    )
);

echo json_encode([
    'processado' => $linhas
]);
