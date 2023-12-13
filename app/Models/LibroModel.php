<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class LibroModel extends Model
{
    protected $table = 'tbl_libro';
    protected $allowedFields = ['lib_titulo', 'lib_codigo', 'lib_precio', 'lib_resumen', 'lib_estado'];
    protected $primaryKey = 'lib_id';

    public function __construct()
    {
        parent::__construct();
        $this->db = Database::connect();
    }

    public function findBook(string $code): ?array
    {
        $builder =  $this->db->table('tbl_libros a');
        $builder->select('a.lib_titulo, a.lib_resumen');
        $builder->where('a.lib_codigo', $code);
        return $builder->get()->getRowArray();
    }

    public function listByTemas(): array
    {
        $builder =  $this->db->table('tbl_librotema a');
        $builder->select('c.lib_id,c.lib_titulo, c.lib_codigo, c.lib_precio, c.lib_resumen, b.tem_tema');
        $builder->join('tbl_temas b', 'a.tem_id = b.tem_id');
        $builder->join('tbl_libros c', 'a.lib_id = c.lib_id');
        return $builder->get()->getResultArray();
    }

    public function findTemas(): array
    {
        $builder = $this->db->table('tbl_temas');
        $builder->select('tem_tema, tem_id');
        return $builder->get()->getResultArray();
    }


    public function findTema(int $id): array
    {
        $builder = $this->db->table('tbl_librotema a');
        $builder->select('c.lib_id,c.lib_titulo, c.lib_codigo, c.lib_precio, c.lib_resumen, b.tem_tema');
        $builder->join('tbl_temas b', 'a.tem_id = b.tem_id');
        $builder->join('tbl_libros c', 'a.lib_id = c.lib_id');
        $builder->where('b.tem_id', $id);
        return $builder->get()->getResultArray();
    }

    public function findLibro(int $id): array
    {
        $builder = $this->db->table('tbl_libros');
        $builder->select('lib_id, lib_titulo, lib_codigo, lib_precio, lib_resumen');
        $builder->where('lib_id', $id);
        return $builder->get()->getResultArray();
    }

    public function updateLibro(int $id, array $data): bool
    {
        $builder = $this->db->table('tbl_libros');
        $builder->where('lib_id', $id);
        return $builder->update($data);
    }

}