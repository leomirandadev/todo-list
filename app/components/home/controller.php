<?php
    namespace Components\home;
    use Components\restClient;

    class controller{
        private $active_tasks;
        private $finished_tasks;

        function __construct(){
            $this->active();
            $this->finished();
        }
        public function render(){
            include_once("page.php");
        }
        private function active(){
            $restAPI = new restClient("task", "user/". $_SESSION['user'] ."/status/1");
            $result = json_decode( $restAPI->get() );
            $this->active_tasks = $result->ok ? $result->output : false;
        }
        
        private function finished(){
            $restAPI = new restClient("task", "user/". $_SESSION['user'] ."/status/2");
            $result = json_decode( $restAPI->get() );
            $this->finished_tasks = $result->ok ? $result->output : false;
        }
    }
    