<?php
    namespace Components;
    use GuzzleHttp\Client;
    
    class restClient{
        private $route;
        private $infos;
        private $client;

        /**
         * __construct
         *
         * @param  mixed $argRoute
         * @param  mixed $argInfo
         *
         * @return void
         */
        function __construct($argRoute,$argInfo){
            $this->route = $argRoute;
            $this->info = $argInfo;
            $this->client = new Client();
        }
        
        /**
         * get
         *
         * @return void
         */
        public function get(){
            $config = json_decode(file_get_contents('json/config.json'));
            $response = $this->client->request('GET', $config->link_api."/".$this->route."/".$this->info);
            return $response->getBody();
        }
        
    }