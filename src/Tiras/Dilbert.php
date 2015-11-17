<?php
namespace Tiras;
class Dilbert extends Tiras{
    
    public function setName(){
        $this->name = 'dilbert';
    }
    
    public function generateData(){
        $this->data = date('Y-m-d');
    }
    
    public function generateUrl(){
        $this->url = 'http://dilbert.com/strip/'.$this->data;
    }
    
    public function process($html){
        preg_match_all('/.* img-comic".*/', $html, $arr);
        $tmp = $arr[0][0];
        preg_match("/src=\".*\"/", $tmp, $output_array);
        $img = str_replace('src=','', $output_array[0]);
        $img = str_replace('"','', $img);
        $img = str_replace("'",'', $img);
        
        return $img;
    }
}