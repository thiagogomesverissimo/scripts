<?php

/*
 * Esse script deve ser rodado como: 
 * ./vendor/bin/drush php-script /home/sabrina/projetos/scripts/drupal/caph/conjuntos-documentais/SBP/script2.php
 * 
 * 
 * 
 * 
 * 
 */
use \Drupal\node\Entity\Node;
$arquivocsv = file_get_contents('/home/sabrina/projetos/scripts/drupal/caph/conjuntos-documentais/SBP/SBP.csv');
$arquivos = explode(PHP_EOL, $arquivocsv);
$arquivos_array = array();

foreach ($arquivos as $arquivo) {
    $arquivos_array[] = str_getcsv($arquivo);
}

array_pop($arquivos_array);

foreach($arquivos_array as $coluna) {
	$node = Node::create([
      	  'type'       		    	          => 'caph_sbp',
      	  'title'      			              => $coluna[0],
      	  'field_fundo'			              => $coluna[1],
          'field_notacao'			          => $coluna[2],
      	  'field_documento'	    	          => $coluna[3],
      	  'field_abordagem'		              => $coluna[4],
      	  'field_local_de_producao'           => $coluna[5],
          'field_data_de_producao'            => $coluna[6],
          'field_tecnica'                     => $coluna[7],
          'field_suporte'                     => $coluna[8],
          'field_formato'                     => $coluna[9],
          'field_cromia'                      => $coluna[10],
          'field_idioma'                      => $coluna[11],
          'field_n_itens'                     => $coluna[12],
          'field_n_exemplares'                => $coluna[13],
          'field_extensao'                    => $coluna[14],
          'field_responsavel_1'               => $coluna[15],
          'field_tipo_de_responsabilidade_1'  => $coluna[16],
          'field_responsavel_'                => $coluna[17],
          'field_tipo_de_responsabilidade_'   => $coluna[18],
          'field_responsaveis_'               => $coluna[19],
          'field_tipo_de_responsabilidade_3'  => $coluna[20],
          'field_atividade_evento_1'          => $coluna[21],
          'field_especificacao_1'             => $coluna[22],
          'field_local_1'                     => $coluna[23],
          'field_data_ou_periodo_1'           => $coluna[24],
          'field_atividade_evento_'           => $coluna[25],
          'field_especificacao_2'             => $coluna[26],
          'field_local_2'                     => $coluna[27],
          'field_data_ou_periodo_2'           => $coluna[28],
          'field_descritores_1_'              => $coluna[29],
          'field_descritores_2'               => $coluna[30],
          'field_descritores_3'               => $coluna[31],    
          'field_descritores_4'               => $coluna[32],
          'field_referencia'                  => $coluna[33],
          'field_observacoes'                 => $coluna[34],
    ]);
   echo $node->save();
}