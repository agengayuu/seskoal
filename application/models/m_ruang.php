<?php
class M_ruang extends CI_Model
{

    public function construct()
    {
        parent::__construct();
    }

    public function tampil_data()
    {
        return $this->db->get('tbl_ruang');
    }

    public function input_data($data)
    {
        return $this->db->insert('tbl_ruang', $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function updateaksi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

    }
}
