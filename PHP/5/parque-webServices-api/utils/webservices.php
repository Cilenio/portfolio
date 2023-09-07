<?php

class utilitarios{
    private $error;
    private $proxy_url = 'proxy.itc.ac.mz';
    private $user = 'itc.teste';
    private $pass = '123';

    function __construct(){}
    
    function obterDados($url){
        $ch = curl_init();
        
        // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
        // curl_setopt($ch, CURLOPT_PROXY, 'proxy.itc.ac.mz'); 
        // curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->user.':'.$this->pass);
        // curl_setopt($ch, CURLOPT_PROXYPORT, "3128");
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $info = curl_getinfo($ch);
        $res = curl_exec($ch);
        if(curl_error($ch)){
            $this->error = curl_error($ch);
            throw new Exception($this->error);
        }else{
            curl_close($ch);
            return $res;
        }
    }
}