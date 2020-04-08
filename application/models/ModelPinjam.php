<?php
    defined('BASEPATH') or exit('No direct script allowed');

    class ModelPinjam extends CI_Model {
        //Manip table pinjam
        public function simpanPinjam($data) {
            $this->db->insert('pinjam', $data);
        }

        public function selectData($table, $where) {
            return $this->db->get($table, $where);
        }

        public function updateData($data, $where) {
            $this->db->update('pinjam', $data, $where);
        }

        public function deleteData($table, $where) {
            $this->db->delete($table, $where);
        }
        
        public function joinData()
        {
            $this->db->select('*');
            $this->db->from('pinjam');
            $this->db->join('detail_pinjam', 'detail_pinjam.no_pinjam = pinjam.no_pinjam', 'Right');

            return $this->db->get()->result_array();
        }

        // Manip tabel detail pinjam
        public function simpanDetail($idBooking, $noPinjam)
        {
            $sql = "INSERT INTO detail_pinjam (no_pinjam, id_buku)
                    SELECT pinjam.no_pinjam, booking_detail.id_buku
                    FROM pinjam, booking_detail
                    WHERE booking_detail.id_booking = $idBooking
                        AND pinjam.no_pinjam = '$noPinjam'";
            $this->db->query($sql);
        }
    }