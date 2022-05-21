<?php
class M_master_eval extends CI_Model
{
    public function deleteEval($id_eval)
    {
        $query = $this->db->delete("tbl_master_eval", array('id_eval' => $id_eval));
        return $query;
    }

    public function insert_masterEval()
    {
        $entri = array();
        $count = $this->input->post('id_master_soal');
        foreach ($count as $i => $value) {
            $entri[] = array(
                'id_master_soal' => $this->input->post('id_master_soal')[$i],
                'id_eval' => $this->input->post('id_eval'),
            );
        }

        $this->db->insert_batch('tbl_master_eval', $entri);
        return true;
    }
}
