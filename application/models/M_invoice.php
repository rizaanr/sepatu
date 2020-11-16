<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_invoice extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $invoice = [
            'nama' => $nama,
            'alamat' => $alamat,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', mktime(
                date('H'),date('i'),date('s'),date('d')+1,date('m'),date('Y'))),

        ];
        $this->db->insert('invoice', $invoice);
        $invoice_id = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = [
                'invoice_id' => $invoice_id,
                'produk_id' => $item['id'],
                'nama_produk' => $item['name'],
                'jumlah' => $item['qty'],
                'harga' => $item['price'],
            ];
            $this->db->insert('pesanan', $data);
        }
        return true;
    }

    public function getDAta()
    {
        $result = $this->db->get('invoice');
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return false;
        }
    }

    public function ambil_invoice($invoice_id)
    {
        $result  = $this->db->where('invoice_id', $invoice_id)->limit(1)->get('invoice');
        if ($result->num_rows() > 0) {
            return $result->row();
        }else {
            return false;
        }
    }

    public function ambil_pesanan($invoice_id)
    {
        $result  = $this->db->where('invoice_id', $invoice_id)->get('pesanan');
        if ($result->num_rows() > 0) {
            return $result->result();
        }else {
            return false;
        }
    }
    // public function index()
    // {
    //     return $this->db->from('kurir')
    //       ->get()
    //       ->result();
    // }
}