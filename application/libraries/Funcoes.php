<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Funcoes
{

    public function getUserIP()
    {
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }

    // VALIDA SE AS VARIÁVEIS ESTÃO VAZIAS.
    public function validar_input($variavel)
    {
        if ($variavel) {
            return $variavel;
        } else {
            return null;
        }
    }

    public function calculo_delay($data_evento)
    {
        $inicio = date("d-m-Y H:i:s", strtotime($data_evento));
        $fim = date('d-m-Y H:i:s');
        $inicio = DateTime::createFromFormat('d-m-Y H:i:s', $inicio);
        $fim = DateTime::createFromFormat('d-m-Y H:i:s', $fim);
        $diff = $inicio->diff($fim);

        if ($diff->format('%y') > 0):
            $ano = "{$diff->format('%y Anos<br>')} ";
        else:
            $ano = '';
        endif;

        if ($diff->format('%m') > 0 && $diff->format('%y') <= 0):
            $mes = "{$diff->format('%m Meses<br>')} ";
        else:
            $mes = '';
        endif;

        if ($diff->format('%d') > 0 && $diff->format('%m') <= 0):
            $dia = "{$diff->format('%d Dias <br>')} ";
        else:
            $dia = '';
        endif;

        if ($diff->format('%h') > 0 && $diff->format('%d') <= 0):
            $hora = "{$diff->format('%h Hora <br>')} ";
        else:
            $hora = '';
        endif;

        if ($diff->format('%i') > 0 && $diff->format('%h') <= 0):
            $minu = str_pad($diff->format('%i'), 2, '0', STR_PAD_LEFT);
            $minuto = $minu . ' Min <br>';
        else:
            $minuto = '';
        endif;

        if ($diff->format('%s') > 0 && $diff->format('%i') <= 0):
            $secu = str_pad($diff->format('%s'), 2, '0', STR_PAD_LEFT);
            $segundo = $secu . ' Sec';
        else:
            $segundo = '';
        endif;

        return ($ano . $mes . $dia . $hora . $minuto . $segundo);
    }

    public function tirar_caracteres_especiais($string)
    {
        return preg_replace(array("/ç/", "/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "c a A e E i I o O u U n N"), $string);
    }
    
    public function formatar_valor($valor,$tipo="saida"){

        if($tipo == "BD"){
            $valor_format = explode(',', $valor);
            $valor_format[0] = preg_replace("/[^0-9]/", "", $valor_format[0]);
            if(!isset($valor_format[1])){
                $valor_format[1] = "00";
            }else{
                if(strlen($valor_format[1]) == 1){
                    $valor_format[1] .= "0";
                }
            }
            $valor_formatado = $valor_format[0] . '.' . $valor_format[1];
            return $valor_formatado;
        }else{
            $valor_format = explode('.', $valor);
            $valor_format[0] = preg_replace("/[^0-9]/", "", $valor_format[0]);
            if(!isset($valor_format[1])){
                $valor_format[1] = "00";
            }else{
                if(strlen($valor_format[1]) == 1){
                    $valor_format[1] .= "0";
                }
            }
            $valor_formatado = $valor_format[0] . ',' . $valor_format[1];
            return $valor_formatado;
        }   

    }

}
