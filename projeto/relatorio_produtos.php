<?php

require_once '../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();




$produtos=[
    [
    'nome'=>'Caderno Universitário',
    'categoria'=>'Papelaria',
    'preco'=>19.90,
    'descricao'=>'Caderno universitário com 200 folhas pautadas.'
],
    [
    'nome'=>'Caneta Azul',
    'categoria'=>'Papelaria',
    'preco'=>2.50,
    'descricao'=>'Caneta esferográfica azul de ponta fina.'
],
    [
    'nome'=>'Garrafa Térmica',
    'categoria'=>'Utilidades Domésticas',
    'preco'=>45.00,
    'descricao'=>'Garrafa térmica de aço inoxidável com capacidade de 1L.'
],
    [
    'nome'=>'Fone de Ouvido',
    'categoria'=>'Eletrônicos',
    'preco'=>79.90,
    'descricao'=>'Fone de ouvido estéreo com cancelamento de ruído.'
]
];
$stylesheet=file_get_contents("style.css");
$html.='<h1>Lista Escolar</h1>';
$html .= '<table border="1">';
 
$html.='<tr><th>Nome</tr></th>';
$html.='<th>Categoria</th>';
$html.='<th>Preço</th>';
$html.='<th>Descrição</th>';

foreach ($produtos as $produto) {
    $html .= '<tr>';
    $html .= '<td>' . $produto['nome'] . '</td>'; 
    $html.='<td>'.$produto['categoria'].'</td>';
    $html .= '<td>' . $produto['preco'] . '</td>';
    $html .= '<td>' . $produto['descricao'] . '</td>';
    $html .= '</tr>';
}

$html .= '</table>';
$mpdf->SetHeader('
<div style="text-align: right; font-weight:bold;">
    22:07 01/11/2024
    </div>
');

$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);

$mpdf->Output();
?>
