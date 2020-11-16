<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_admin extends CI_Model
{
    private $table = [
        'user','produk'
    ];
 
    // public function getUser()
    // {
    //     return $this->db->from('user')->where_not_in('role',1)
    //       ->join('role', 'role.role_id=user.role')
    //       ->get()
    //       ->result();
    // }
    public function getSeller()
    {
        return $this->db->from('user')->where('role',2)
          ->join('role', 'role_id=role')
          ->get()
          ->result();
    }

    public function getAdmin()
    {
        // return $this->db->get($this->table)->result();
        return $this->db->from('user')->where('role', 1)
          ->join('role', 'role_id=role')
          ->get()
          ->result();
        //   SELECT * FROM nama_tabel WHERE nama_kolom = "isi_kolom"
    }

    public function getBuyer()
    {
        return $this->db->from('user')->where('role',3)  
            ->join('role', 'role_id=role')
            ->get()
            ->result();
    }

    public function getProduk()
    {
        return $this->db->from('produk')//->where('kategori_id' , 1)
            ->join('kategori', 'kategori.kategori_id=produk.kategori_id')
            ->join('user', 'user.user_id=produk.user_id',)
            ->order_by('produk_id')
            ->get()
            ->result();
    }


    public function getCountAdmin()
    {
        // return $this->db->get($this->table)->result();
        $sql = "SELECT count(user_id) as role FROM user  WHERE role=1";
        $result = $this->db->query($sql);
        return $result->row()->role;
    }

    public function getCountBuyer()
    {
        // return $this->db->get($this->table)->result();
        $sql = "SELECT count(user_id) as role FROM user  WHERE role=3";
        $result = $this->db->query($sql);
        return $result->row()->role;
    }

    public function getCountSeller()
    {
        // return $this->db->get($this->table)->result();
        $sql = "SELECT count(user_id) as role FROM user  WHERE role=2";
        $result = $this->db->query($sql);
        return $result->row()->role;
    }

    public function getJumProduk()
    {
        $sql = "SELECT count(produk_id) as produk FROM produk";
        $result = $this->db->query($sql);
        return $result->row()->produk;
    }

//     select jurusan,count(*) as jumlah
// from mahasiswa
// group by jurusan
}