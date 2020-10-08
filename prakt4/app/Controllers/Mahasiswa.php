<?php 
namespace App\Controllers;
class Mahasiswa extends BaseController{
    public function index(){
        echo "PBW";
    }
    public function ucapan(){
        
        $data["n"]=$this->request->getPost("nama");
        echo view("hello",$data);
     #   echo "Selamat malam";
     
    }
}