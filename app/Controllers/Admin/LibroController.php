<?php

namespace App\Controllers\Admin;

use App\Models\LibroModel;
use App\Controllers\BaseController;

class LibroController extends BaseController
{

    private LibroModel $libroModel;
    private $session;

    public function __construct()
    {
        $this->libroModel = new LibroModel();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->session = session();
    }
    
    public function index(): string
    {
        $libros = $this->libroModel->listByTemas();
        $msg = ['libros' => $libros];
        return view('Layout/Admin/header').view('Layout/Admin/aside').view('Admin/Libro/libro_table', $msg).view('Layout/Admin/footer');
    }

    public function show(): string
    {
        $codeSearch = $this->request->getPost('code');
        $libroData = $this->libroModel->findBook($codeSearch);
        $msg = ['libro' => $libroData];
        return view('Admin/Libro/libro_view',$msg);
    }

    public function listByTemas(): string
    {
        $temas = $this->libroModel->findTemas();
        $msg = ['temas' => $temas];
        return view('Layout/Admin/header').view('Layout/Admin/aside').view('Admin/Libro/libro', $msg).view('Layout/Admin/footer');
    }

    public function findByTemas($idTem): string
    {
        $libros = $this->libroModel->findTema($idTem);
        $msg = ['libros' => $libros];
        return view('Admin/Libro/libro_tema', $msg);
    }

    public function update($id): string
    {
        $data = $this->request->getPost('libro');
        $libroId = $id;
        $libros = $this->libroModel->updateLibro($libroId, $data);
        $msg = ['libros' => $libros];
        return view('Admin/Libro/libro_tema', $msg);
    }
}