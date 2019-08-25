<?php
/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 18/08/2019
 * Time: 18:28
 */

namespace Was\Services;


trait TraitService
{
    /**
     * @param array $models
     * @return array
     */
    public function load(array $models) : array
    {
        #Declarando variáveis de uso
        $result = [];

        #Criando e executando as consultas
        foreach ($models as $model) {
            #qualificando o namespace
            $nameModel = "Was\\Entities\\$model";

            #Recuperando o registro e armazenando no array
            $result[strtolower($model)] = $nameModel::pluck('nome', 'id');
        }

        #retorno
        return $result;
    }
}