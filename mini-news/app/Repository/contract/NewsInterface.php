<?php
namespace App\Repository\contract;

interface NewsInterface {
    public function create($data);
    public function index();
    public function find($id);
    public function delete($id);
    public function update($id, $data);

}
