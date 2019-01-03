<?php
    namespace Components\edit;
    use Components\restClient;

    class controller{
        private $id;
        private $title;
        private $description;

        function __construct($id){
            $this->id = $id;
            $this->getTask();
        }
        public function render(){
            include_once("page.php");
        }
        private function getTask(){
            $restAPI = new restClient("task", $this->id);
            $result = json_decode( $restAPI->get() );
            $this->title = $result->output->title;
            $this->description = $result->output->description;
        }
    }
    