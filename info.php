<?php

class abc {
    private $menudata;

    function __construct(array $menudata){
        if(sizeof($menudata) > 0){
            $this->menudata = $menudata;
        }
        else{
            throw new Exception ("No data found");
        }
    }
    public function menuitems(){
        $dishnames =[];

        foreach($this->menudata as $value)
		{
			$dishnames[]=array(
				"name"=>$value["name"]
			);
		}
        return json_encode($dishnames);
    }
    public function getdishinfoByname($name) {
        $response = ["Invalid Name"];
        if($name) {
            foreach($this->menudata as $value) {
                if ($name == $value['name']) {
                    $response = $value;
                    break;
                }
            }
        }
        return json_encode($response);
    }
    
    
}
?>