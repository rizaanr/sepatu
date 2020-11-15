<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model
{
    public function allProduk()
    {
        return $this->db->from('produk')
        ->join('kategori', 'kategori.kategori_id=produk.kategori_id')
        ->get()
        ->result();
    }

    public function userProduk()
    {
        return $this->db->from('produk')
            ->get()
            ->result();
    }

    public function kategori()
    {
        return $this->db->from('kategori')
            ->get()
            ->result();
    }

    public function tambahProduk($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function editProduk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function prosesUpdate($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function detailProduk($id)
    {
        $result = $this->db->from('produk')->where('produk_id', $id)
        ->join('kategori', 'kategori.kategori_id=produk.kategori_id')
        ->join('user', 'user.user_id=produk.user_id')
        ->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        }else {
            return FALSE;
        }
    }

    public function find($id)
    {
        $result = $this->db->where('produk_id', $id)
        ->limit(1)
        ->get('produk');

        if ($result->num_rows() > 0) {
        return $result->row();
        }else{
            return array();
        }
    }
}