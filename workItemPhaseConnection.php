<?php
    class workItemPhaseConnection{
        private $ID;
        private $state;
        private $district;
        private $cluster;
        private $gp;
        private $component;
        private $sub_component;
        private $phase;
        private $latitude;
        private $longitude;
        private $comment;
        private $image;
        
        //private $conn;
        private $tableName = "nrum_master";

        function setID($ID) { $this->ID = $ID; }
        function getID() { return $this->ID; }
        
        function setState($state) { $this->state = $state; }
        function getState() { return $this->state; }
        
        function setDistrict($district) { $this->district = $district; }
        function getDistrict() { return $this->district; }
        
        function setCluster($cluster) { $this->cluster= $cluster; }
        function getCluster() { return $this->cluster; }
        
        function setGp($gp) { $this->gp = $gp; }
        function getGp() { return $this->gp; }
        
        function setComponent($Component) { $this->Component= $Component; }
        function getComponent() { return $this->Component; }
        
        function setSub_Component($sub_component) { $this->sub_component= $sub_Component; }
        function getSub_Component() { return $this->sub_component; }
        
        function setPhase($phase) { $this->phase = $phase; }
        function getPhase() { return $this->phase; }            
        
        function setLatitude($latitude) { $this->latitude = $latitude; }
        function getLatitude() { return $this->latitude; }
        
        function setLongitude($longitude) { $this->longitude = $longitude; }
        function getLongitude() { return $this->longitude; }
        
        function setComment($comment) { $this->comment = $comment; }
        function getComment() { return $this->comment; }
        
        function setImage($image) { $this->image = $image; }
        function getImage() { return $this->image; }
        
        public function _construct(){
        }
        
        public function getWorkItemDetails(){  
            $db = mysqli_connect('127.0.0.1', 'root', '', 'mrurban');
            $sql = 'SELECT * FROM workitem';
            $result=mysqli_query($db,$sql);
            $r =  mysqli_fetch_all($result);
            
            return $r;
        }
        public function getPhaseDetails(){

            $con = pg_connect("host=localhost dbname=mrurban user=postgres password=Riyanshi") or die("could not connect to NRuM Postgres database");
            $sql = 'SELECT * FROM workitem';
            $result = pg_query($con,$sql);
            $res = pg_fetch_all($result); 
            return $res;
            pg_close($con);
        }
    }

?>
