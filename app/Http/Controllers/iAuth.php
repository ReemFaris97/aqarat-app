<?php


namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

interface iAuth
{
    public function gurad();
    public function Model() ;
    public function registrationRules() : array;
    public function loginRules():array;
    public function resource();
}
