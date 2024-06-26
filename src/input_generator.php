<?php
function createInputFile($inputFile, $arrayToJson)
{
    $items = [];

    $nouns = [
        'Cadeira', 'Mesa', 'Livro', 'Caneta', 'Sapato', 'Computador', 'Carro', 'Bicicleta',
        'Telefone', 'Relogio', 'Violao', 'Camera', 'Fones de ouvido', 'Altofalante', 'Microfone',
        'Teclado', 'Monitor', 'Laptop', 'Bolsa', 'Chapeu', 'Jaqueta', 'Oculos',
        'Meias', 'Toalha', 'Bola', 'Globo', 'Ventilador', 'Lampada', 'Espelho', 'Pintura',
        'Carteira', 'Lenco', 'Guardachuva', 'Travesseiro', 'Cobertor', 'Tapete', 'Vela', 'Faca',
        'Garfo', 'Colher', 'Prato', 'Tigela', 'Copo', 'Caneca', 'Panela', 'Frigideira', 'Cesto'
    ];


    function generateRandomProductName($nouns)
    {
        $adjectives = [
            'Vermelho', 'Azul', 'Verde', 'Amarelo', 'Preto', 'Branco', 'Roxo', 'Laranja',
            'Marrom', 'Cinza', 'Rosa', 'Bege', 'Dourado', 'Prateado', 'Turquesa', 'Creme'
        ];

        $adjective = $adjectives[array_rand($adjectives)];
        $noun = $nouns[array_rand($nouns)];

        return $noun . ' ' . $adjective;
    }

    for ($i = 0; $i < 100000; $i++) {
        $product = generateRandomProductName($nouns);
        $price = mt_rand(1000000000, 9999999999);
        $items[] = [
            'product' => $product,
            'price' => $price
        ];
    }

    $arrayToJson($inputFile, $items);
}

function getOrderOption()
{
    return 'random';
}
